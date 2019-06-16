<?php

namespace App\Http\Controllers\Guest;

use App\Model\Produk;
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

        return view('_guest.detail',[
            'data' => $data
        ]);
    }
}
