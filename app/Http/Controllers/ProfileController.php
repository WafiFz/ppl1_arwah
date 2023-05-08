<?php

namespace App\Http\Controllers;

use Exception;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Str;
use App\Models\Userprofile;

class ProfileController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {   
        //
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $id = decode_id($id);

        if ($id != auth()->user()->id) {
            return redirect()->route('home');
        }

        $user = User::where('id', $id)->first();

        $data = [
            'user' => $user
        ];

        return view("client.index", compact('data'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit(Request $request, $id)
    {
        $id = decode_id($id);

        if ($id != auth()->user()->id) {
            return redirect()->route('home');
        }

        try {
            
            $input = $request->except('_token');

            DB::beginTransaction();
            
            // Update data user
            $user = User::find($id);
            $user->name = $input['first_name'] . ' ' . $input['last_name'];
            $user->first_name = $input['first_name'];
            $user->last_name = $input['last_name'];
            $user->email = $input['email'];
            $user->mobile = $input['mobile'];
            $user->gender = $input['gender'];
            $user->date_of_birth = $input['date_of_birth'];
            $user->save();

            // Update data user_profile
            $profile = Userprofile::where('user_id', $id);      
            $profile->update($input);

            // Update avatar
            $this->avatarHandle($request, $user, $profile);

            DB::commit();
           
            return redirect()->back()->with("flash_success", "Edit success");
        } catch (Exception $e) {
            DB::rollback();
            dd($e);
            return redirect()->back()->with("error", "Edit failed");
        }
    }

    public function changePassword(Request $request, $id)
    {
        $id = decode_id($id);

        if ($id != auth()->user()->id) {
            return redirect()->route('home');
        }

        $user = User::where('id', $id)->first();

        $data = [
            'user' => $user
        ];

        return view("client.changePassword", compact('data'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }

    /**
     * Avatar handle
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function avatarHandle(Request $request, $user, $profile)
    {
         // IF User Add New Photo At Form
         if ($request->avatar != null) {

            if($user->avatar != null) {
                // Delete Before Insert New Image
                // Replace directory
                $user->avatar = Str::replace('storage', 'public', $user->avatar);
                
                Storage::disk('local')->delete($user->avatar);
            }

            // Insert New Image
            $dir_avatar = $request->avatar->store('public/avatar');

            // Replace directory
            $avatar = Str::replace('public', 'storage', $dir_avatar);

            $user->update([
                'avatar' => $avatar,
            ]);

            $profile->update([
               'avatar' => $avatar,
           ]);
        }
    }
}
