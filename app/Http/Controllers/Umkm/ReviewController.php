<?php

namespace App\Http\Controllers\Umkm;

use App\Model\Review;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class ReviewController extends Controller
{
    public function review_filter(Request $request)
    {
        $data = Review::when($request->start, function ($query) use ($request) {

        })->when($request->produk, function ($query) use ($request) {

        })->whereHas('getProduct', function ($query) {
            $query->whereHas('getUmkm', function ($query) {
                $query->where('user_id', Auth::user()->id);
            });
        })->orderBy('id',$request->order)->paginate(10)->append($request->only([
            'order',
            'produk'
        ]));
        return view('_umkm.review', [
            'data' => $data
        ]);
    }
}
