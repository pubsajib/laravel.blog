<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request; 
use App\User;
use Session;
use Image;
use File;

class UserController extends Controller {
    // public function __construct()
    // {
    //     $this->middleware('auth');
    // }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index() {
        $users = User::all();
        return view('users.index')->withUsers($users);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id) {
        $user = User::where('id', $id)->with('posts', 'comments')->first();
        return view('users.show')->withUser($user);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id) {
        $user = User::find($id);
        return view('users.edit')->withUser($user);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id) {
        $user = User::find($id);

        // validation
        $request->validate([
            'fname' => 'required|min:2',
            'email' => "required|email|unique:users,email,$id",
            'lname' => 'sometimes|min:2'
            // 'image' => 'sometimes|image'
        ]);

        // image
        if ( $request->hasFile('image') ) {
            $image = $request->file('image');
            // dd($image->getClientOriginalName());
            $fileName = 'user-'. time() .'.'. $image->getClientOriginalExtension();
            $location = public_path('images/'. $fileName);
            Image::make($image)->resize(300, 300)->save($location);
            File::delete('images/'.$user->image);
            $user->image    = $fileName;
        }

        // save
        $user->fname    = $request->fname;
        $user->lname    = $request->lname;
        $user->email    = $request->email;
        $user->city     = $request->city;
        $user->state    = $request->state;
        $user->zip      = $request->zip;
        $user->country  = $request->country;

        $user->save();

        // Redirect
        return redirect()->route('user.show', $user->id);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        dd('destroy user');
    }
}
