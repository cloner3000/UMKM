<?php

namespace App\Http\Controllers\Umkm;

use App\Model\JenisUmkm;
use App\Model\Umkm;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;

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
        
    }

    public function update_izin()
    {

    }
}
