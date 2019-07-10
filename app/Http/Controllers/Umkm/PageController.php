<?php

namespace App\Http\Controllers\Umkm;

use App\Model\Cart;
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
        $review = Review::whereHas('getCart', function ($query){
            $query->whereHas('getProduct', function ($query){
                $query->whereHas('getUmkm',function ($query){
                    $query->where('user_id',Auth::user()->id);
                });
            });
        })->get()->take(10);
        $comment = Comment::whereHas('getProduct', function ($query){
            $query->whereHas('getUmkm',function ($query){
                $query->where('user_id',Auth::user()->id);
            });
        })->get()->count();

        $order = Cart::whereHas('getProduct', function ($query) use ($umkm){
            $query->whereHas('getUmkm',function ($query) use ($umkm){
               $query->where('umkm_id',$umkm->id);
            });
        })->where('isPaid',true)->where('isVerify', true)->where('isHandle',false)->get();

        $order_done = Cart::whereHas('getProduct', function ($query) use ($umkm){
            $query->whereHas('getUmkm',function ($query) use ($umkm){
                $query->where('umkm_id',$umkm->id);
            });
        })->where('isPaid',true)->where('isVerify', true)->where('isHandle',true)->get();

        return view('_umkm.main',[
            'produk' => count(Produk::where('umkm_id',$umkm->id)->get()),
            'review' => $review,
            'comment' =>$comment,
            'order' => $order,
            'done' => $order_done
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
        $data = Review::whereHas('getCart', function ($query){
            $query->whereHas('getProduct', function ($query){
                $query->whereHas('getUmkm',function ($query){
                    $query->where('user_id',Auth::user()->id);
                });
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

    public function order_list()
    {
        $data = Cart::where('isVerify', true)->where('isHandle', false)->orderBy('user_id')->paginate(10);
        $buyer = Cart::where('isVerify', true)->where('isHandle', false)->pluck('user_id')->unique();
        $produk = Cart::where('isVerify', true)->where('isHandle', false)->pluck('produk_id')->unique();
        return view('_umkm.order', [
            'data' => $data,
            'buyer' => $buyer,
            'produk' => $produk
        ]);
    }

    public function handle()
    {
        $data = Cart::where('isVerify', true)->where('isHandle', true)->orderBy('user_id')->paginate(10);
        $buyer = Cart::where('isVerify', true)->where('isHandle', true)->pluck('user_id')->unique();
        $produk = Cart::where('isVerify', true)->where('isHandle', true)->pluck('produk_id')->unique();
        return view('_umkm.handle', [
            'data' => $data,
            'buyer' => $buyer,
            'produk' => $produk
        ]);
    }
}
