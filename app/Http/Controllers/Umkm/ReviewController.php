<?php

namespace App\Http\Controllers\Umkm;

use App\Model\Produk;
use App\Model\Review;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Carbon;
use Illuminate\Support\Facades\Auth;

class ReviewController extends Controller
{
    public function review_filter(Request $request)
    {

        $data = Review::when($request->start, function ($query) use ($request) {
            $query->when($request->end, function ($query) use ($request) {
                $query->where('created_at', '>=', Carbon::parse($request->start))
                    ->where('created_at', '<=', Carbon::parse($request->end));
            });
        })->when($request->produk, function ($query) use ($request) {
            $query->whereIn('produk_id', $request->produk);
        })->whereHas('getCart', function ($query){
            $query->whereHas('getProduct', function ($query){
                $query->whereHas('getUmkm',function ($query){
                    $query->where('user_id',Auth::user()->id);
                });
            });
        })->orderBy('id', "DESC")->paginate(10);

        $produk = Produk::whereHas('getUmkm',function ($query){
            $query->where('user_id',Auth::user()->id);
        })->get();

        return view('_umkm.review', [
            'data' => $data,
            'produk' =>$produk
        ]);
    }
}
