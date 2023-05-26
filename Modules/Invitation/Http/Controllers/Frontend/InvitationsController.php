<?php

namespace Modules\Invitation\Http\Controllers\Frontend;

use Carbon\Carbon;
use Illuminate\Support\Str;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Modules\Order\Entities\Order;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Storage;
use Modules\Invitation\Entities\Invitation;

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
        $galleries = $wedding->gallery;

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
        // Akad (Pae Array)
        // Tanggal
        $events[0]->date = Carbon::parse($request->date_akad)->format('Y-m-d H:i:s');
        // Waktu Mulai
        $events[0]->start_time = $request->start_time_akad;
        // Waktu Akhir
        $events[0]->end_time = $request->end_time_akad;
        // Tempat
        $events[0]->place = $request->place_akad;

        // dd($request->all(), $events[0]->date);
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
        for ($i = 0; $i < count($love_stories); $i++) {
            // Year
            $love_stories[$i]->year = $request->year[$i];
            // Story
            $love_stories[$i]->story = $request->story[$i];

            // For Image
            if (isset($request->love_story_image[$i])) {
                if ($love_stories[$i]->image != null) {
                    // Delete Before Insert New Image
                    // Rpelace Directory
                    $love_stories[$i]->image = Str::replace('storage', 'public', $love_stories[$i]->image);
                    Storage::disk('local')->delete($love_stories[$i]->image);
                }
                // Insert New Image
                $dir_image = $request->love_story_image[$i]->store('public/love_story');

                // Replace Directory
                $image = Str::replace('public', 'storage', $dir_image);

                $love_stories[$i]->image = $image;
            }

            $love_stories[$i]->save();
        }

        // ==============================
        //  Gallery
        // ==============================
        for ($i = 0; $i < count($galleries); $i++) {
            // File
            if (isset($request->gallery_image[$i])) {
                if ($galleries[$i]->file != null) {
                    // Delete Before Insert New Image
                    // Replace Directory
                    $galleries[$i]->file = Str::replace('storage', 'public', $galleries[$i]->file);
                    Storage::disk('local')->delete($galleries[$i]->file);
                }
                // Insert New Image
                $dir_image = $request->gallery_image[$i]->store('public/gallery');

                // Replace Directory
                $file = Str::replace('public', 'storage', $dir_image);

                $galleries[$i]->file = $file;
            }
            $galleries[$i]->save();
        }

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
