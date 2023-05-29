<?php

namespace Modules\Invitation\Http\Controllers\Frontend;


use Illuminate\Contracts\Support\Renderable;
use Illuminate\Http\Request;
use Illuminate\Routing\Controller;
use Illuminate\Support\Facades\DB;

// Entities
use Modules\Invitation\Entities\Invitation;
use Modules\Invitation\Entities\Guest;
use Modules\Invitation\Entities\Rsvp;

class RsvpController extends Controller
{
    public function index($id)
    {
        $invitation = Invitation::getById(decode_id($id));
        $rsvps = Rsvp::where('invitation_id', decode_id($id))->paginate(8);

        $data = [
            "invitation" => $invitation,
            "rsvps" => $rsvps,
            "package" => $invitation->order->package,
        ];

        return view('client/rsvp', compact('data'));
    }

    public function rsvp(Request $request)
    {
        try { 
            $input = collect($request->except('_token'));
            $input = $input->replace([
                'invitation_id' => decode_id($request->invitation_id),
                'is_attend' => (bool)$request->is_attend,
            ])->all();

            DB::beginTransaction();
            
            // Create RSVP
            Rsvp::create($input);
            
            DB::commit();

            return back()->with("success", "Rsvp berhasil");

        } catch (Exception $e) {
            DB::rollback();
            dd($e);
            return redirect()->back()->with("error", "Rsvp failed");
        }
            
    }
}
