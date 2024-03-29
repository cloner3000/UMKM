<?php

namespace App\Http\Controllers\Guest;

use App\Model\Cart;
use App\Model\Comment;
use App\Model\Produk;
use App\Model\Review;
use App\Model\Wishlist;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;

class PageController extends Controller
{
    public function index()
    {
        $new_arrival = Produk::orderBy('created_at',"DESC")->get()->take(10);
        $diskon = Produk::where('isDiscount', true)->get()->take(12);
        return view('welcome',[
            'produk' => Produk::all(),
            'new' => $new_arrival,
            'diskon' => $diskon
        ]);
    }

    public function detail(Request $request)
    {
        $id = decrypt($request->id);
        $data = Produk::findOrFail($id);
        $review = Review::whereHas('getCart', function ($query) use($data){
            $query->where('produk_id',$data->id);
        })->get();
        $comment = Comment::where('produk_id',$data->id)->where('isAnswer',false)->get();
        return view('_guest.detail',[
            'data' => $data,
            'review' => $review,
            'comment' => $comment
        ]);
    }

    public function history()
    {
        $data = Cart::where('isHandle',true)->get();
        return view('_guest.history',[
            'data' => $data
        ]);
    }

    public function account()
    {
        return view('_guest.pengaturan');
    }

    public function cart()
    {
        $data = Cart::where('user_id',Auth::user()->id)->where('isPaid',false)->get();
        $id = Cart::where('user_id',Auth::user()->id)->where('isPaid',false)->get()->pluck('id');

        return view('_guest.cart',[
            'data' => $data,
            'id' => $id
        ]);
    }

    public function wishlist()
    {
        $data = Wishlist::where('user_id',Auth::user()->id)->get();
        return view('_guest.wish',[
            'data' => $data
        ]);
    }
}
