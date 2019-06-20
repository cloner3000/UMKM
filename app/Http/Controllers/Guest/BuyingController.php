<?php

namespace App\Http\Controllers\Guest;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class BuyingController extends Controller
{
    public function add_cart(Request $request)
    {
        dd($request->all());
    }

    public function buy(Request $request)
    {

    }

    public function cancel_cart(Request $request)
    {

    }

    public function add_wishlist(Request $request)
    {

    }

    public function remove_wishlist(Request $request)
    {

    }
}
