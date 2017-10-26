<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Validator;
use Illuminate\Foundation\Auth\AuthenticatesUsers;
use Illuminate\Http\Request;
use Session;
use Auth;
class LoginController extends Controller
{
    /*
    |--------------------------------------------------------------------------
    | Login Controller
    |--------------------------------------------------------------------------
    |
    | This controller handles authenticating users for the application and
    | redirecting them to your home screen. The controller uses a trait
    | to conveniently provide its functionality to your applications.
    |
    */

    use AuthenticatesUsers;

    /**
     * Where to redirect users after login.
     *
     * @var string
     */
    protected $redirectTo = '/';

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth', ['except'=>['getLogin', 'getLogout', 'postLogin']]);
    }
    /**
     * Get a validator for an incoming registration request.
     *
     * @param  array  $data
     * @return \Illuminate\Contracts\Validation\Validator
     */
    protected function validator(array $data)
    {
        return Validator::make($data, [
            'email' => 'required|string|email|max:255',
            'password' => 'required|string|min:1',
        ]);
    }
    public function getLogin()
    {
        return view('auth.login');
    }
    public function postLogin(Request $request)
    {
        $res = $this->validator($request->all())->validate();
        $credentials = [];
        $credentials['email'] = $request->email;
        $credentials['password'] = $request->password;
        // $credentials['remember'] = $request->remember;

        if ( $request->remember ) $isLoggedIn = Auth::attempt( $credentials, true);
        else $isLoggedIn = Auth::attempt( $credentials, true);

        if ( $isLoggedIn ) return redirect()->route('posts.index');
        else return redirect()->route('login')->with('error', 'Credentials are wrong');
    }
    public function getLogout() {
        // echo "auth:" . Auth::user();
        Auth::logout();
        Session::flush();
        return redirect()->route('login');
    }
}
