<?php

namespace Modules\Wedding\Http\Controllers\Frontend;

use Illuminate\Contracts\Support\Renderable;
use Illuminate\Http\Request;
use Illuminate\Routing\Controller;
use Illuminate\Support\Facades\DB;

// Entities
use Modules\Invitation\Entities\Invitation;
use Modules\Wedding\Entities\Wish;

class WishController extends Controller
{
    public function sendWish(Request $request)
    {

        try {
            
            $name = $request->name;
            $from = $request->from;
            $wish = $request->wish;
            $wedding_id = decode_id($request->wedding_id);


            if($request->anonymous){
                $name = 'Anonim';
            };

            DB::beginTransaction();
            
            // Create RSVP
            Wish::create([
                'name' => $name,
                'from' => $from,
                'wish' => $wish,
                'wedding_id' => $wedding_id,
            ]);
            
            DB::commit();

            return back()->with("success", "Wish berhasil");

        } catch (Exception $e) {
            DB::rollback();
            dd($e);
            return redirect()->back()->with("error", "Wish failed");
        }
    }
}

