<?php

namespace App\Http\Controllers\Guest;

use App\Model\Produk;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class SearchController extends Controller
{
    public function search(Request $request)
    {
        $data = Produk::when($request->key, function ($query) use ($request) {
            $query->whereRaw('(nama LIKE \'%' . $request->key . '%\')');
        })->where('isHide', false)->paginate(20)->appends($request->only([
            'key',
        ]));;
        $counter = Produk::when($request->key, function ($query) use ($request) {
            $query->whereRaw('(nama LIKE \'%' . $request->key . '%\')');
        })->where('isHide', false)->get();


        return view('_guest.search', [
            'data' => $data,
            'counter' => count($counter)
        ]);
    }
}
