<?php

namespace App\Http\Controllers\Guest;

use App\Model\Comment;
use App\Model\Produk;
use App\Model\Review;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;

class ReviewCommentController extends Controller
{
    public function comment_store(Request $request)
    {
        Comment::create([
            'message' => $request->comment,
            'title' => 'pertanyaan',
            'produk_id' => $request->produk_id,
            'user_id' => Auth::user()->id
        ]);

        return back()->with('success_komen', 'Pertanyaan anda berhasil disimpan, silahkan pantau untuk mendapatkan jawaban');
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
        return back()->with('success_komen', 'Jawaaas anda berhasil disimpan, silahkan pantau untuk mendapatkan jawaban');
    }

    public function review_store(Request $request)
    {

        $produk = Produk::whereHas('getCart',function ($query) use ($request){
            $query->where('id',$request->carts_id);
        })->first();

        $review = Review::create([
            'carts_id' => $request->carts_id,
            'user_id' => Auth::user()->id,
            'star' => $request->star,
            'konten' => $request->konten
        ]);


        if($request->hasFile('attachment')){
            $file = $request->file('attachment');
            $bukti = $file->getClientOriginalName();
            $file->move('upload/review/'.$produk->id.'/', $bukti);
            $review->update([
                'attachment' => 'upload/review/'.$produk->id.'/'.$bukti
            ]);
        }
        return back()->with('success_cart', 'Terima kasih atas saran dan masukkan anda :)');
    }
}
