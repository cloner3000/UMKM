<?php

namespace App\Http\Controllers\Umkm;

use App\Model\Kategori;
use App\Model\Like;
use App\Model\Produk;
use App\Model\Review;
use App\Model\Umkm;
use App\Model\Comment;
use function foo\func;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;

class PageController extends Controller
{
    public function index()
    {
        $umkm = Umkm::where('user_id',Auth::user()->id)->first();
        $review = Review::whereHas('getProduct', function ($query){
            $query->whereHas('getUmkm',function ($query){
                $query->where('user_id',Auth::user()->id);
            });
        })->get()->take(10);
        $comment = Comment::whereHas('getProduct', function ($query){
            $query->whereHas('getUmkm',function ($query){
                $query->where('user_id',Auth::user()->id);
            });
        })->get()->count();
        return view('_umkm.main',[
            'produk' => count(Produk::where('umkm_id',$umkm->id)->get()),
            'review' => $review,
            'comment' =>$comment
        ]);
    }

    public function produk()
    {
        $umkm = Umkm::where('user_id',Auth::user()->id)->first();
        return view('_umkm.produk',[
            'umkm' => $umkm,
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

    public function review()
    {
        $data = Review::whereHas('getProduct', function ($query){
            $query->whereHas('getUmkm',function ($query){
                $query->where('user_id',Auth::user()->id);
            });
        })->paginate(10);

        $produk = Produk::whereHas('getUmkm',function ($query){
            $query->where('user_id',Auth::user()->id);
        })->get();

        return view('_umkm.review',[
            'data' => $data,
            'produk' => $produk
        ]);
    }

    public function komentar()
    {
        $data = Comment::whereHas('getProduct', function ($query) {
            $query->whereHas('getUmkm',function ($query) {
                $query->where('user_id',Auth::user()->id);
            });
        })->where('isAnswer',false)->paginate(10);
        $produk = Produk::whereHas('getUmkm',function ($query){
            $query->where('user_id',Auth::user()->id);
        })->get();
        return view('_umkm.komentar',[
            'data' => $data,
            'produk' => $produk
        ]);
    }
}
