<?php

namespace App\Http\Controllers\Umkm;

use App\Model\Cart;
use App\Model\DetailUser;
use App\Model\Produk;
use App\Model\Umkm;
use App\User;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class OrderController extends Controller
{
    public function filter_order(Request $request)
    {
        $data = Cart::when($request->produk, function ($query) use ($request) {
            $query->whereIn('produk_id', $request->produk);
        })->when($request->user, function ($query) use ($request) {
            $query->whereIn('user_id', $request->user);
        })->when($request->start, function ($query) use ($request) {
            $query->when($request->end, function ($query) use ($request) {
                $query->where('created_at', '>=', Carbon::parse($request->start))
                    ->where('created_at', '<=', Carbon::parse($request->end));
            });
        })->where('isVerify', true)->where('isHandle', false)
            ->paginate(20);

        $buyer = Cart::where('isVerify', true)->where('isHandle', false)->pluck('user_id')->unique();
        $produk = Cart::where('isVerify', true)->where('isHandle', false)->pluck('produk_id')->unique();
        return view('_umkm.order', [
            'data' => $data,
            'buyer' => $buyer,
            'produk' => $produk
        ]);
    }

    public function handle(Request $request)
    {
        $cart = Cart::find($request->id);
        $cart->update([
           'isHandle' => true
        ]);
        return back()->with('success','Pesanan telah ditangani');
    }

    public function print(Request $request)
    {
        $id = decrypt($request->id);
        $order = Cart::find($id);
        $produk = Produk::find($order->produk_id);
        $umkm = Umkm::find($produk->umkm_id);
        $user = User::find($order->user_id);
        $buyer = DetailUser::where('user_id',$user->id)->first();
        return view('_umkm.invoice',[
            'order' => $order,
            'umkm' => $umkm,
            'produk' => $produk,
            'buyer' => $buyer
        ]);
    }
}
