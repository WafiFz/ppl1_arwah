<?php

namespace Modules\Invitation\Http\Controllers\Frontend;

use Illuminate\Contracts\Support\Renderable;
use Illuminate\Http\Request;
use Illuminate\Routing\Controller;

// Entities
use Modules\Invitation\Entities\Invitation;

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
}
