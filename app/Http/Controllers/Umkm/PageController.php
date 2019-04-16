<?php

namespace App\Http\Controllers\Umkm;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class PageController extends Controller
{
    public function index()
    {
        return view('_umkm.main');
    }

    public function produk()
    {
        return view('_umkm.produk');
    }
}
