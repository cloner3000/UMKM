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
                'error' => 'Kata Sandi Lama Anda Salah!!'
            ]);
        } else {
            if ($request->new_pass !== $request->confirm_pass) {
                return back()->with([
                    'error' => 'Kata SAndi Baru Tidak Sama!!'
                ]);
            } else {
                if (Auth::user()->role_id == 3){ //UMKM
                    Auth::user()->update([
                        'username' => $request->username,
                        'password' => bcrypt($request->new_pass)
                    ]);
                    $umkm =  Umkm::findOrfail($request->umkm);
                    $umkm->update([
                        'nama' => $request->username
                    ]);
                }elseif (Auth::user()->role_id == 4){//GUest
                    Auth::user()->update([
                        'password' => bcrypt($request->new_pass)
                    ]);
                }
            }
            return back()->with([
                'success' => 'Berhasil Memperbarui Akun !'
            ]);
        }

    }
}
