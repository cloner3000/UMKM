<?php

namespace App\Http\Controllers\Auth;

use App\Model\Umkm;
use App\User;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Input;

class UmkmRegisterController extends Controller
{
    public function register(Request $request)
    {

        if ($request->hasFile('avatar')) {
            $request->validate([
                'avatar' => 'image|max:1500'
            ]);
        }

        $check_user = User::where('email', $request->email)->first();
        if (!empty($check_user)) {
            return back()->with('error_register', 'Email telah dipakai')->withInput();
        } elseif ($request->password != $request->password_confirmation) {
            return back()->with('error_register', 'Password Tidak Sama')->withInput();
        }
        $request->validate([
            'akta_notaris' => 'image|max:1500'
        ]);
        //create user
        $user = User::create([
            'username' => $request['username'],
            'email' => $request['email'],
            'password' => Hash::make($request['password']),
            'isUmkm' => true,
            'role_id' => 3
        ]);

        $latlong = $this->getLatLong($request->alamat);
        $map = explode(',',$latlong);

        $umkm = Umkm::create([
            'user_id' => $user->id,
            'avatar' => 'images/shop.png',
            'nama' => $user->username,
            'desc' => $request->desc,
            'tgl_berdiri' => $request->tgl_berdiri,
            'nama_pemilik' => $request->nama_pemilik,
            'nik_pemilik' => $request->nik_pemilik,
            'alamat' => $request->alamat,
            'lat' => $map[0],
            'long' => $map[1],
            'jenis_id' => $request->jenis_id,
            'aset' => $request->aset,
            'omset' => $request->omset,
            'no_siup' =>$request->no_siup,
            'tgl_siup' => $request->tgl_siup,
            'tgl_siup_exp' =>$request->tgl_siup_exp,
            'npwp' =>$request->tgl_siup_exp,
            'tdp' =>$request->tgl_siup_exp,
            'tgl_tdp' =>$request->tgl_siup_exp,
            'tgl_tdp_exp' =>$request->tgl_siup_exp,
            'izin_ganguan' =>$request->tgl_siup_exp,
            'tgl_izin_ganguan' =>$request->tgl_siup_exp,
        ]);

        if ($request->hasFile('avatar')) {
            $file = $request->file('avatar');
            $avaname = $file->getClientOriginalName();
            $file->move('upload/'.$user->id.'/file/', $avaname);
            $umkm->update([
                'avatar' => 'upload/'.$user->id.'/file/'.$avaname
            ]);
        }
        if ($request->hasFile('akta_notaris')) {
            $file = $request->file('akta_notaris');
            $akta = $file->getClientOriginalName();
            $file->move('upload/'.$user->id.'/file/', $akta);
            $umkm->update([
                'akta_notaris' => 'upload/'.$user->id.'/file/'.$akta
            ]);
        }

        return back()->withInput();
    }

    public function getLatLong($address)
    {
        $address = str_replace(" ", "+", $address);

        $json = file_get_contents("https://maps.google.com/maps/api/geocode/json?key=AIzaSyBIljHbKjgtTrpZhEiHum734tF1tolxI68&address=$address&sensor=false&region=ID");
        $json = json_decode($json);

        $lat = $json->{'results'}[0]->{'geometry'}->{'location'}->{'lat'};
        $long = $json->{'results'}[0]->{'geometry'}->{'location'}->{'lng'};
        return $lat.','.$long;
    }
}
