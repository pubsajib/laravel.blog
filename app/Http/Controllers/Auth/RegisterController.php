<?php

namespace App\Http\Controllers\Auth;

use App\User;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Validator;
use Illuminate\Foundation\Auth\RegistersUsers;
use Illuminate\Http\Request;
use Auth;

class RegisterController extends Controller {
    use RegistersUsers;
    protected $redirectTo = '/';

    public function __construct() {
        $this->middleware('guest');
    }
    protected function validator(array $data) {
        return Validator::make($data, [
            'name' => 'required|string|max:255',
            'email' => 'required|string|email|max:255|unique:users',
            'password' => 'required|string|min:1|confirmed',
        ]);
    }
    protected function create(array $data) {
        // dd($data);
        return User::create([
            'fname' => $data['name'],
            'email' => $data['email'],
            'password' => bcrypt($data['password']),
        ]);
    }
    protected function getRegister()
    {
        return view('auth.register');
    }
    protected function postRegister( Request $request )
    {   
        $res = $this->validator($request->all())->validate();
        $user = $this->create($request->all());
        if ( Auth::loginUsingId($user->id) ) {
            return redirect()->route('posts.index');
        } else {
            return view('auth.login');
        }
    }
}
