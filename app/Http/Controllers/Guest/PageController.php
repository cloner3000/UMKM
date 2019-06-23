<?php

namespace App\Http\Controllers\Guest;

use App\Model\Comment;
use App\Model\Produk;
use App\Model\Review;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class PageController extends Controller
{
    public function index()
    {
        $new_arrival = Produk::orderBy('created_at',"DESC")->get()->take(10);
        return view('welcome',[
            'produk' => Produk::all(),
            'new' => $new_arrival
        ]);
    }

    public function detail(Request $request)
    {
        $id = decrypt($request->id);
        $data = Produk::findOrFail($id);
        $review = Review::where('produk_id',$data->id)->get();
        $comment = Comment::where('produk_id',$data->id)->where('isAnswer',false)->get();
        return view('_guest.detail',[
            'data' => $data,
            'review' => $review,
            'comment' => $comment
        ]);
    }
}
