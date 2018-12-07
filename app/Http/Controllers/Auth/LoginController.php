<?php

namespace App\Http\Controllers\Auth;

use App\Classes\JurisUser;
use App\Http\Controllers\Controller;
use Illuminate\Foundation\Auth\AuthenticatesUsers;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

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
    // protected $redirectTo = '/home';
    protected $maxAttempts = 3;
    protected $decayMinutes = 1;
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    protected function redirectTo()
    {
        $juris = new JurisUser(Auth::id());
        $checkAdmin = $juris->checkAdmin();
        if ($checkAdmin) return '/admin/user/ad_users';
        return "/home";
    }
    protected function credentials(Request $request)
    {
        $ar = ['password' => $request->password, 'active' => 1];
        if(filter_var($request->email, FILTER_VALIDATE_EMAIL)) {
            $ar['email'] = $request->email;
        } else {
            $ar['name'] = $request->email;
        }
        return $ar;
    }

    public function __construct()
    {
        $this->middleware('guest')->except('logout');
    }
}
