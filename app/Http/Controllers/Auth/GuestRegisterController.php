<?php

namespace App\Http\Controllers\Auth;

use App\Model\DetailUser;
use App\User;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class GuestRegisterController extends Controller
{
    public function register(Request $request)
    {
//        $rules = [
//            'username' => 'required|string',
//            'email' => 'required|email|unique:users',
//            'password' => 'required|string|min:8',
//            'isGuest' => 'required'
//        ];
//        $message = [
//          'required' => 'Wajib di isi'
//        ];
//
//        $this->validate($request,$rules,$message);
//
//
//        $user = User::create([
//
//        ]);
        $check_user = User::where('email', $request->email)->first();
        if (!empty($check_user)) {
            return back()->with('error_register', 'Email telah dipakai');
        } elseif ($request->password != $request->password_confirmation) {
            return back()->with('error_register', 'Password Tidak Sama');
        }
        $user = User::create([
            'username' => $request['username'],
            'email' => $request['email'],
            'password' => Hash::make($request['password']),
            'isGuest' => $request['isGuest'],
            'role_id' => 4
        ]);

        DetailUser::create([
           'user_id' => $user->id
        ]);

        Auth::login($user);
        return redirect('/')->with('login','Pendaftaran Behasil, Selamat Berbelanja');

    }
}
