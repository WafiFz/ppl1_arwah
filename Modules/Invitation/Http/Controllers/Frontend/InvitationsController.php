<?php

namespace Modules\Invitation\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Illuminate\Support\Str;
use Modules\Invitation\Entities\Invitation;
use Modules\Order\Entities\Order;
use Illuminate\Support\Facades\Storage;

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
    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return Response
     */
    // public function show($id)
    // {
    //     $id = decode_id($id);

    //     $module_title = $this->module_title;
    //     $module_name = $this->module_name;
    //     $module_path = $this->module_path;
    //     $module_icon = $this->module_icon;
    //     $module_model = $this->module_model;
    //     $module_name_singular = Str::singular($module_name);

    //     $module_action = 'Show';

    //     $$module_name_singular = $module_model::findOrFail($id);

    //     return view(
    //         "invitation::frontend.$module_name.show",
    //         compact('module_title', 'module_name', 'module_icon', 'module_action', 'module_name_singular', "$module_name_singular", 'posts')
    //     );
    // }
    public function show($id)
    {
        $data = Order::find($id);

        return view('client/editInvitation', ['data' => $data]);
    }

    public function edit(Request $request, $id)
    {
        // dd($request->love_story_1);
        // cari data yang akan diubah 
        $order = Order::find($id);
        $package = $order->package;
        $theme = $order->theme;
        $invitation = $order->invitation;
        $wedding = $invitation->wedding;
        $groom = $wedding->groom;
        $bride = $wedding->bride;
        $events = $wedding->event;
        $love_stories = $wedding->love_story;

        // ==============================
        //  Invitation
        // ==============================
        // Ubah Tanggal
        // $order->created_by = '';
        // Ubah Paket
        $package->name = $request->package_name;
        // Ubah Tema
        $theme->name = $request->theme_name;
        // Ubah Status
        $invitation->status = $request->status;
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
        // 

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
        // 
        // Instagram
        $groom->instagram = $request->groom_instagram;

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
        // 
        // Instagram
        $bride->instagram = $request->bride_instagram;

        // ==============================
        //  Events
        // ==============================
        // Akad
        // Tanggal
        $events[0]->date = '2000-09-22 00:00:00';
        // Waktu Mulai
        $events[0]->start_time = '05:23:18';
        // Waktu Akhir
        $events[0]->end_time = '06:22:18';
        // Tempat
        $events[0]->place = 'Gedung Pemkot';

        // Resepsi
        // Tanggal
        $events[1]->date = '2000-09-22 00:00:00';
        // Waktu Mulai
        $events[1]->start_time = '05:23:18';
        // Waktu Akhir
        $events[1]->end_time = '03:22:18';
        // Tempat
        $events[1]->place = 'Rumah Rangga';

        // Unduh Mantu
        // Tanggal
        $events[2]->date = '2001-09-22 00:00:00';
        // Waktu Mulai
        $events[2]->start_time = '05:23:18';
        // Waktu Akhir
        $events[2]->end_time = '03:22:18';
        // Tempat
        $events[2]->place = 'Rumah S';

        // ==============================
        //  Love Stories
        // ==============================
        $index = 1;
        $desc_year = 'year_';
        $desc_love_story = 'love_story_';
        $desc_story = 'story_';
        foreach ($love_stories as $love_story) {
            $name_year = $desc_year . strval($index);
            $name_love_story = $desc_love_story . strval($index);
            $name_story = $desc_story . strval($index);

            // For Year
            $love_story->year =  $request->$name_year;

            // For Story
            $love_story->story = $request->$name_story;

            // For Image
            if ($request->$name_love_story != null) {
                if ($love_story->image != null) {
                    // Delete Before Insert New Image
                    // Replace Directory
                    $love_story->image = Str::replace('storage', 'public', $love_story->image);
                    Storage::disk('local')->delete($love_story->image);
                }

                // Insert New Image
                $dir_image = $request->$name_love_story->store('public/love_story');

                // Replace Directory
                $image = Str::replace('public', 'storage', $dir_image);

                $love_story->update([
                    'image' => $image,
                ]);
            }
            $love_story->save();
            $index++;
        }

        // ==============================
        //  Gallery
        // ==============================
        dd($request->image_gallery_1);



        // Save Changes
        $package->save();
        $theme->save();
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
