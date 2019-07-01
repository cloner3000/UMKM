<?php

namespace App\Http\Controllers\Umkm;

use App\Model\JenisUmkm;
use App\Model\Umkm;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use App\Http\Controllers\Auth\UmkmRegisterController as Latlong;


class UmkmController extends Controller
{
    public function show()
    {
        $umkm = Umkm::where('user_id', Auth::user()->id)->first();
        return view('_umkm.umkm',[
            'umkm' => $umkm,
            'jenis' => JenisUmkm::findOrFail($umkm->jenis_id),
            'jenis_all' => JenisUmkm::all()
        ]);
    }

    public function update_general(Request $request)
    {
//        dd($request->jenis_id);
        $umkm = Umkm::where('user_id', Auth::user()->id)->first();
        $latlong = app(Latlong::class)->getLatLong($request->alamat);
        $map = explode(',',$latlong);
        $umkm->update([
            'nama_pemilik' => $request->nama_pemilik,
            'nik_pemilik' => $request->nik_pemilik,
            'alamat' => $request->alamat,
            'lat' => $map[0],
            'long' => $map[1],
            'avatar' => $request->avatar,
            'no_telp' => $request->no_telp,
            'jenis_id' => $request->jenis_id,
            'tgl_berdiri' => $request->tgl_berdiri,
            'desc' => $request->desc,
        ]);

        if($request->hasFile('new_logo')){
            $file = $request->file('avatar');
            $avaname = $file->getClientOriginalName();
            $file->move('upload/'.Auth::user()->id.'/file/', $avaname);
            $umkm->update([
                'avatar' => 'upload/'.Auth::user()->id.'/file/'.$avaname
            ]);
        }
        return back()->with('success_umkm','Data Umum Umkm anda berhasil diperbarui');
    }

    public function update_izin(Request $request)
    {
        $umkm = Umkm::where('user_id', Auth::user()->id)->first();
        $umkm->update([
            'aset' => $request->aset,
            'omset' => $request->omset,
            'no_siup' => $request->no_siup,
            'tgl_siup' => $request->tgl_siup,
            'tgl_siup_exp' => $request->tgl_siup_exp,
            'npwp' => $request->npwp,
            'tdp' => $request->tdp,
            'tgl_tdp' => $request->tgl_tdp,
            'tgl_tdp_exp' => $request->tgl_tdp_exp,
            'izin_ganguan' => $request->izin_ganguan,
            'tgl_izin_ganguan' => $request->tgl_izin_ganguan,
            'akta_notaris' => $request->akta_notaris,
        ]);

        if ($request->hasFile('new_akta')){
            $file = $request->file('new_akta');
            $avaname = $file->getClientOriginalName();
            $file->move('upload/'.Auth::user()->id.'/file/', $avaname);
            $umkm->update([
                'akta_notaris' => 'upload/'.Auth::user()->id.'/file/'.$avaname
            ]);
        }

        return back()->with('success_umkm','Data Perizinan Umkm anda berhasil diperbarui');
    }
}
