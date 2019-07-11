<?php

namespace App\Http\Controllers\Root;

use App\Model\JenisUmkm;
use App\Model\Kategori;
use App\Model\Umkm;
use App\User;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class PageController extends Controller
{
    public function umkmfavorite()
    {
        return view('_root.favumkm');
    }

    public function jenisumkm()
    {
        return view('_root.jenisumkm',[
            'data' => JenisUmkm::orderBy('id')->get()
        ]);
    }

    public function kategori()
    {
        return view('_root.kategori',[
            'data' => Kategori::orderBy('id')->get()
        ]);
    }

    public function role()
    {
        return view('_root.role');
    }

    public function umkm_list()
    {
        $umkm = Umkm::wherehas('getVerify')->where('is_verified',true)->orderBy('updated_at','DESC')->get();
        return view('_root.umkm',[
            'umkm' =>$umkm
        ]);
    }

    public function petugas_list()
    {
        $data = User::where('role_id',2)->get();
        return view('_root.petugas',[
            'umkm' =>$data
        ]);
    }
}
