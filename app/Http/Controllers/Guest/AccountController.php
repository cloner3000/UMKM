<?php

namespace App\Http\Controllers\Guest;

use App\Model\DetailUser;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;

class AccountController extends Controller
{
    public function change_ava(Request $request)
    {
        $guest = DetailUser::where('user_id',Auth::user()->id)->first();
        $file = $request->file('avatar');
        $avaname = $file->getClientOriginalName();
        $file->move('upload/ava/'.Auth::user()->id.'/', $avaname);
        $guest->update([
            'avatar' => 'upload/ava/'.Auth::user()->id.'/'.$avaname
        ]);

        return back()->with('success','Berhasil merubah foto avatar!');
    }

    public function setting(Request $request)
    {
        $guest = DetailUser::where('user_id',Auth::user()->id)->first();
        $guest->update([
            'first_name' => $request->first_name,
            'last_name' => $request->last_name,
            'gender' => $request->gender,
            'date_of_birth' => $request->date_of_birth,
            'no_telp' => $request->no_telp,
            'alamat' => $request->alamat,
            'kecamatan' => $request->kecamatan,
            'kelurahan' => $request->kelurahan,
            'zip_code' => $request->zip_code,
        ]);
        return back()->with('success','Data Diri Berhasil di perbarui');
    }
}
