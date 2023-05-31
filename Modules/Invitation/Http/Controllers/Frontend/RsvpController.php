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
    public function index(Request $request, $id)
    {
        $invitation = Invitation::getById(decode_id($id));
       

        if($request->query('key')) {
            $key = $request->query('key');

            $rsvps = Rsvp::where('invitation_id', decode_id($id))
                        ->where('name', 'LIKE','%'. $key .'%')
                        ->paginate(8);
        } else {
            $rsvps = Rsvp::where('invitation_id', decode_id($id))->paginate(8);
        };


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
            
            if($request->is_attend == "true"){
                $is_attend = true;
            }else{
                $is_attend = false;
            }
            
            if(!$request->amount_guest){
                $amount_guest = 0;
                if($is_attend) $amount_guest = 1;
            }else{
                $amount_guest = $request->amount_guest;
            }

            $rsvp = [
                "invitation_id" => decode_id($request->invitation_id),
                "name" => $request->name,
                "amount_guest" => $amount_guest,
                "is_attend" => $is_attend
            ];    
                
            DB::beginTransaction();
            
            // Create RSVP
            Rsvp::create($rsvp);
            
            DB::commit();

            return back()->with("success", "Rsvp berhasil");

        } catch (Exception $e) {
            DB::rollback();
            dd($e);
            return redirect()->back()->with("error", "Rsvp failed");
        }
            
    }
}
