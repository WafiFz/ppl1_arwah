<?php

namespace Modules\Invitation\Http\Controllers\Frontend;

use Illuminate\Contracts\Support\Renderable;
use Illuminate\Http\Request;
use Illuminate\Routing\Controller;
use Illuminate\Support\Facades\DB;
use Mail;
use App\Mail\InvitationMail;
use App\Traits\WablasTrait;
use App\Providers\RouteServiceProvider;
Use Carbon\Carbon;

// Entities
use Modules\Invitation\Entities\Invitation;
use Modules\Invitation\Entities\Guest;

class GuestController extends Controller
{

    /**
     * Display a listing of the resource.
     *
     * DUMMY
     * @return Response
     */
    public function index(Request $request, $id)
    {
        $invitation = Invitation::getById(decode_id($id));
    
        if($request->query('key')) {
            $key = $request->query('key');

            $guests = Guest::where('invitation_id', decode_id($id))
                        ->where('name', 'LIKE','%'. $key .'%')
                        ->orWhere('email', 'LIKE','%'. $key .'%')
                        ->orWhere('no_whats_app', 'LIKE','%'. $key .'%')
                        ->paginate(8);
        } else {
            $guests = Guest::where('invitation_id', decode_id($id))->paginate(8);
        };

        $data = [
            "invitation" => $invitation,
            "guests" => $guests,
        ];

        return view('client/guests', compact('data'));
    }

    /**
     * Display a response
     *
     * DUMMY
     * @return Response
     */
    public function sendInvitation(Request $request, $id)
    {

        $status = 400;
        $ids = $request->selectedIDs;
        if (!$ids) $ids = [];
        $method = $request->selectedMethod;

        $invitation = Invitation::getById(decode_id($id));

        if ($method == 'email') {
            foreach ($ids as $id) {
                $guest = Guest::find($id);

                $data = [
                    "invitation" => $invitation,
                    "wedding" => $invitation->wedding,
                    "guest" => $guest,
                ];

                Mail::to($guest->email)->send(new InvitationMail($data));

                $guest->is_invited = true;
                $guest->save();
            }
            $status = 200;
        } elseif ($method == 'wa') {
            foreach ($ids as $id) {
                $guest = Guest::find($id);

                $kumpulan_data = [];
                $data['phone'] = $guest->no_whats_app;
                $data['message'] = WablasTrait::invitationMessage($invitation, $guest);
                $data['secret'] = false;
                $data['retry'] = false;
                $data['isGroup'] = false;
                array_push($kumpulan_data, $data);

                WablasTrait::sendText($kumpulan_data);

                $guest->is_invited = true;
                $guest->save();
            }
            $status = 200;
        }

        if (count($ids) == 0) $status = 400;

        return response()->json(['ids' => $request->selectedIDs, 'method' => $request->selectedMethod], $status);
    }

    public function showInvitation($slug)
    {

        $invitation = Invitation::getBySlug($slug);

        if(!$invitation){ return redirect()->intended(RouteServiceProvider::HOME); };

        $g_calendar =  $this->get_url_add_g_calendar($invitation->wedding);

        $data = [
            "invitation" => $invitation,
            "wedding" => $invitation->wedding,
            "package" => $invitation->order->package,
            "g_calendar" => $g_calendar,
        ];

        return view('guest/invitation', compact('data'));
    }

    public function addGuest(Request $request, $id)
    {
        if ($request->method() == 'POST') {

            $input = collect($request->except('_token'));

            $input = $input->replace([
                'invitation_id' => decode_id($request->invitation_id),
            ])->all();


            DB::beginTransaction();

            // Create RSVP
            Guest::create($input);

            DB::commit();
        };


        $invitation = Invitation::getById(decode_id($id));
        $guests = Guest::where('invitation_id', decode_id($id))->orderBy('id', 'desc')->get();

        $data = [
            'invitation' => $invitation,
            'guests' => $guests,
        ];

        return view('client/addGuest', compact('data'));
    }

    public function deleteGuest($id)
    {
        $data = Guest::findOrFail($id);
        $id_invitation = $data->invitation->id;
        $data->delete();

        return redirect()->route('client.guest.index', encode_id($id_invitation));
    }

    public function editGuest(Request $request, $id)
    {
        if ($request->method() == 'POST') {
            $guest = Guest::find($id);
            $guest->name = $request->name;
            $guest->description = $request->description;
            $guest->address = $request->address;
            $guest->no_whats_app = $request->no_whats_app;
            $guest->email = $request->email;

            $guest->save();

            return redirect()->route('client.guest.index', encode_id($guest->invitation_id));
        };


        $guest = Guest::where('id', decode_id($id))->first();
        return view('client/editGuest', compact('guest'));
    }

    public function get_url_add_g_calendar($wedding)
    {
        
        $date = Carbon::createFromDate($wedding->event[0]->date)->format('Ymd');
        $start_time = Carbon::createFromTimeString($wedding->event[0]->start_time)->format('His');
        $end_time = Carbon::createFromTimeString($wedding->event[0]->end_time)->format('His');
        
        $start_date = $date . "T" . $start_time;
        $end_date = $date . "T" . $end_time;

        return "https://www.google.com/calendar/render?action=TEMPLATE&text=" . 
                $wedding->title . 
                "&ctz=Asia/Jakarta" . 
                "&dates=" . $start_date . "/" . $end_date .
                "%7D&details=" . "Acara Pernikahan ". $wedding->groom->name . " dan ". $wedding->bride->name . 
                "&location=" . $wedding->location . "&sprop=&sprop=name:"; 
    
    }
}
