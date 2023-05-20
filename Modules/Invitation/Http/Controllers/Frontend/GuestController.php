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
