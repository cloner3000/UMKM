<?php

namespace App\Http\Controllers\Guest;

use App\Model\Comment;
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

        return back()->with('success_komen','Pertanyaan anda berhasil disimpan, silahkan pantau untuk mendapatkan jawaban');
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
        return back()->with('success_komen','Jawaaas anda berhasil disimpan, silahkan pantau untuk mendapatkan jawaban');
    }
}
