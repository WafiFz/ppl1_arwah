<?php

namespace Modules\Invitation\Http\Controllers\Frontend;

use Illuminate\Contracts\Support\Renderable;
use Illuminate\Http\Request;
use Illuminate\Routing\Controller;
use Illuminate\Support\Facades\DB;

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
    public function index($id)
    {
        $invitation = Invitation::getById(decode_id($id));

        $data = [
            "invitation" => $invitation,
            "guests" => $invitation->guest
        ];

        return view('client/guests', compact('data'));
    }

    /**
     * Display a response
     *
     * DUMMY
     * @return Response
     */
    public function sendInvitation(Request $request)
    {
        dd("OK");
        $status = 200;
        $ids = $request->selectedIDs;
        if(!$ids) $ids = [];
        $method = $request->selectedMethod;
        if($method == 'sms') $status = 404;
        if(count($ids) == 0) $status = 400;

        return response()->json(['ids' => $request->selectedIDs, 'method' => $request->selectedMethod], $status);
    }

    public function showInvitation($slug)
    {

        $invitation = Invitation::getBySlug($slug);

        $data = [
            "invitation" => $invitation,
            "wedding" => $invitation->wedding
        ];

        return view('guest/invitation', compact('data'));
    }

    public function addGuest(Request $request, $id)
    {
        if($request->method() == 'POST'){
            
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

        $data = [
            'invitation' => $invitation,
        ];        

        return view('client/addGuest', compact('data'));
    }
}
