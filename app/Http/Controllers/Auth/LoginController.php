<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Foundation\Auth\AuthenticatesUsers;
use Auth;
use Illuminate\Http\Request;
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
    protected $redirectTo = '/dashboard';
    

    public function postLogin(Request $request) {    
        if(Auth::attempt(['email'=>$request->input('email'), 'password'=>$request->input('password') ]))
        {
            if(Auth::user() && Auth::user()->role == 'admin')
            {
                return redirect('/admin/tip/dashboard');
            }
            if(Auth::user() && Auth::user()->role == 'regular')
            {
                return redirect('/tip/dashboard');
            }
        }
        else {
            return redirect('/login')->with(['message' => 'User Credentials not authentic', 'style' => 'info']);
        }
    }

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('guest')->except('logout');
    }

}
