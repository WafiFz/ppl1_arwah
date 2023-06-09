<?php

namespace Modules\Invitation\Http\Controllers\Frontend;

use Carbon\Carbon;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Storage;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use App\Http\Controllers\Controller;
use App\Traits\HelperTrait;

// Entities
use Modules\Order\Entities\Order;
use Modules\Invitation\Entities\Invitation;
use Modules\Invitation\Entities\Guest;

class InvitationsController extends Controller
{
    public function __construct()
    {
        // Page Title
        $this->module_title = 'Invitations';

        // module name
        $this->module_name = 'invitations';

        // directory path of the module
        $this->module_path = 'invitation::backend';

        // module icon
        $this->module_icon = 'fa-regular fa-sun';

        // module model name, path
        $this->module_model = "Modules\Invitation\Models\Invitation";
    }

    /**
     * Display a listing of the resource.
     *
     * @return Response
     */
    public function index()
    {
        $module_title = $this->module_title;
        $module_name = $this->module_name;
        $module_path = $this->module_path;
        $module_icon = $this->module_icon;
        $module_model = $this->module_model;
        $module_name_singular = Str::singular($module_name);

        $module_action = 'List';

        $$module_name = $module_model::latest()->paginate();

        return view(
            "invitation::frontend.$module_path.index",
            compact('module_title', 'module_name', "$module_name", 'module_icon', 'module_action', 'module_name_singular')
        );
    }

    public function store(Request $request)
    {
        //
    }

    public function show($id)
    {
        $order = Order::find($id);
        $guests = Guest::where('invitation_id', $order->invitation->id)->orderBy('id', 'desc')->limit(10)->get();
        $guests_count = count($order->invitation->guest);

        $data = [
            'order' => $order,
            'guests' => $guests,
            'guests_count' => $guests_count,

        ];

        return view('client/editInvitation', compact('data'));
    }

    public function edit(Request $request, $id)
    {
        // cari data yang akan diubah 
        $order = Order::find($id);
        $invitation = $order->invitation;
        $wedding = $invitation->wedding;
        $groom = $wedding->groom;
        $bride = $wedding->bride;
        $events = $wedding->event;
        $love_stories = $wedding->love_story;
        $galleries = $wedding->gallery;

        // ==============================
        //  Invitation
        // ==============================
        // Ubah Status
        // $invitation->status = $request->status;
        $invitation->status = 'ACTIVE';
        // Ubah Slug
        $invitation->slug = $request->slug;
        // Ubah Domain
        // 

        // ==============================
        //  Wedding
        // ==============================
        // Judul
        $wedding->title = $request->title;
        // Lokasi
        $wedding->location = $request->location;
        // Link Lokasi
        $wedding->location_gmap = $request->location_gmap;
        // Nomor Rekening
        $wedding->rekening_gift = $request->rekening_gift;

        // ==============================
        //  Groom
        // ==============================
        // Nama
        $groom->name = $request->groom_name;
        // Ayah
        $groom->father = $request->groom_father;
        // Ibu
        $groom->mother = $request->groom_mother;
        // Alamat
        $groom->address = $request->groom_address;
        // Instagram
        $groom->instagram = $request->groom_instagram;
        // Foto
        $groom->image = HelperTrait::storeImage($groom->image, $request->groom_image, 'wedding/grooms');

        // ==============================
        //  Bride
        // ==============================
        // Nama
        $bride->name = $request->bride_name;
        // Ayah
        $bride->father = $request->bride_father;
        // Ibu
        $bride->mother = $request->bride_mother;
        // Alamat
        $bride->address = $request->bride_address;
        // Instagram
        $bride->instagram = $request->bride_instagram;
        // Foto
        $bride->image = HelperTrait::storeImage($bride->image, $request->bride_image, 'wedding/brides');

        // ==============================
        //  Events
        // ==============================
        // Tanggal
        $events[0]->date = Carbon::parse($request->date_akad)->format('Y-m-d H:i:s');
        // Waktu Mulai
        $events[0]->start_time = $request->start_time_akad;
        // Waktu Akhir
        $events[0]->end_time = $request->end_time_akad;
        // Tempat
        $events[0]->place = $request->place_akad;

        // Resepsi
        // Tanggal
        $events[1]->date = Carbon::parse($request->date_resepsi)->format('Y-m-d H:i:s');
        // Waktu Mulai
        $events[1]->start_time = $request->start_time_resepsi;
        // Waktu Akhir
        $events[1]->end_time = $request->end_time_resepsi;
        // Tempat
        $events[1]->place = $request->place_resepsi;

        // Unduh Mantu
        // Tanggal
        $events[2]->date = Carbon::parse($request->date_unduh_mantu)->format('Y-m-d H:i:s');
        // Waktu Mulai
        $events[2]->start_time = $request->start_time_unduh_mantu;
        // Waktu Akhir
        $events[2]->end_time = $request->end_time_unduh_mantu;
        // Tempat
        $events[2]->place = $request->place_unduh_mantu;

        // ==============================
        //  Love Stories
        // ==============================
        if(isset($request->year)){
            for ($i = 0; $i < count($love_stories); $i++) {
                // Year
                $love_stories[$i]->year = $request->year[$i];
                // Story
                $love_stories[$i]->story = $request->story[$i];
    
                // For Image
                if (isset($request->love_story_image[$i])) {
                    $love_stories[$i]->image = HelperTrait::storeImage($love_stories[$i]->image, $request->love_story_image[$i], 'wedding/love_story');
                };
    
                $love_stories[$i]->save();
            }
        }

        // ==============================
        //  Gallery
        // ==============================
        if(isset($request->gallery_image)){
            for ($i = 0; $i < count($galleries); $i++) {
                // File
                if (isset($request->gallery_image[$i])){
                    $galleries[$i]->file = HelperTrait::storeImage($galleries[$i]->file, $request->gallery_image[$i], 'wedding/gallery');
                };
    
                $galleries[$i]->save();
            }
        }

        // Save Changes
        $invitation->save();
        $wedding->save();
        $groom->save();
        $bride->save();
        foreach ($events as $event) {
            $event->save();
        }

        return redirect()->route('client.editInvitation', $id);
    }
}
