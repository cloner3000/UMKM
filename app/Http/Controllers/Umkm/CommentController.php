<?php

namespace App\Http\Controllers\Umkm;

use App\Model\Comment;
use App\Model\Produk;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Carbon;
use Illuminate\Support\Facades\Auth;

class CommentController extends Controller
{
    public function review_filter(Request $request)
    {

        $data = Comment::when($request->start, function ($query) use ($request) {
            $query->when($request->end, function ($query) use ($request) {
                $query->where('created_at', '>=', Carbon::parse($request->start))
                    ->where('created_at', '<=', Carbon::parse($request->end));
            });
        })->when($request->produk, function ($query) use ($request) {
            $query->whereIn('produk_id', $request->produk);
        })->whereHas('getProduct', function ($query) {
            $query->whereHas('getUmkm', function ($query) {
                $query->where('user_id', Auth::user()->id);
            });
        })->orderBy('id', "DESC")->paginate(10);

        $produk = Produk::whereHas('getUmkm',function ($query){
            $query->where('user_id',Auth::user()->id);
        })->get();

        return view('_umkm.komentar', [
            'data' => $data,
            'produk' =>$produk
        ]);
    }

    public function answer_comment(Request $request)
    {
        Comment::create([
            'message' => $request->massage,
            'produk_id' => $request->produk_id,
            'comment_id' => $request->comment_id,
            'isAnswer' => true,
            'user_id' => Auth::user()->id,
            'title' => 'jawaban'
        ]);
        return back();
    }

    public function edit_answer()
    {
        
    }
}
