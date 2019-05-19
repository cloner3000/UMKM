<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\User;
use Illuminate\Database\Eloquent\ModelNotFoundException;
use Illuminate\Foundation\Auth\AuthenticatesUsers;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

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
    protected $redirectTo = '/home';

    /**
     * Showing Login Page 
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function showLoginForm()
    {
        return view('auth.login');
    }

    public function login(Request $request)
    {
        $this->validate($request, [
            'email' => 'required',
            'password' => 'required',
        ]);
        try{
            $user = User::where('email', $request->email)->first();
            if(empty($user)){
                return back()->with([
                    'error_login' => 'Email Atau Password Anda Salah!!.'
                ]);
            }

            if(!Hash::check($request->password, $user->password)) {
                return back()->with([
                    'error_login' => 'Email Atau Password Anda Salah!!.'
                ]);
            }
            Auth::login($user);
            $role = Auth::user()->role_id;

            if($role == 1 || $role == 2){
                return redirect()->route('diskop.home');
            }elseif ($role == 3) {
                return redirect()->route('umkm.home');
            }elseif ($role == 4){
                return redirect('/')->with('login','Anda masuk sebagai '.Auth::user()->username);
            }
        }catch (ModelNotFoundException $exception){
            return back()->with([
                'error' => $exception
            ]);
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
