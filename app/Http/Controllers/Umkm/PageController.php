<?php

namespace App\Http\Controllers\Umkm;

use App\Model\Kategori;
use App\Model\Produk;
use App\Model\Umkm;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;

class PageController extends Controller
{
    public function index()
    {
        return view('_umkm.main');
    }

    public function produk()
    {
        $umkm = Umkm::where('user_id',Auth::user()->id)->first();
        return view('_umkm.produk',[
            'product' => Produk::where('umkm_id',$umkm->id)->paginate(10)
        ]);
    }

    public function form_tambah()
    {
        return view('_umkm.form.c_product',[
            'kategori' => Kategori::all()
        ]);
    }

    public function edit_form($id)
    {
        $item = Produk::findOrFail(decrypt($id));
        return view('_umkm.form.e_product',[
            'data' => $item,
            'kategori' => Kategori::whereNotIn('id',$item->kategori_ids)->get()
        ]);
    }

    public function detail_form($id)
    {
        $result_id = decrypt($id);
        return view('_umkm.detail', [
            'data' => Produk::findOrFail($result_id),
        ]);
    }
}
