<?php

namespace App\Http\Controllers;

use App\Model\Umkm;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class UserController extends Controller
{
    public function update(Request $request)
    {

        if (!Hash::check($request->old_pass, Auth::user()->password)) {
            return back()->with([
                'error' => 'Password Lama Anda Salah!!'
            ]);
        } else {
            if ($request->new_pass !== $request->confirm_pass) {
                return back()->with([
                    'error' => 'Password Baru Tidak Sama!!'
                ]);
            } else {
                Auth::user()->update([
                    'username' => $request->username,
                    'password' => bcrypt($request->new_pass)
                ]);
                $umkm =  Umkm::findOrfail($request->umkm);
                $umkm->update([
                    'nama' => $request->username
                ]);
            }
            return back()->with([
                'success' => 'Berhasil Memperbarui Akun !'
            ]);
        }

    }
}
