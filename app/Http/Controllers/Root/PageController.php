<?php

namespace App\Http\Controllers\Root;

use App\Model\JenisUmkm;
use App\Model\Kategori;
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
}
