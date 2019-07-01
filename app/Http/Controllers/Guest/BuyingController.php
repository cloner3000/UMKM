<?php

namespace App\Http\Controllers\Guest;

use App\Model\Cart;
use App\Model\Order;
use App\Model\Produk;
use App\Model\Wishlist;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;

class BuyingController extends Controller
{
    public function add_cart(Request $request)
    {
        $produk = Produk::findOrFail($request->produk_id);
        $cart = Cart::create([
            'user_id' => Auth::user()->id,
            'produk_id' => $request->produk_id,
            'qty' => $request->qty,
            'harga' => $produk->harga * $request->qty,
            'isCart' => true,
            'isPaid' => false
        ]);
        if ($produk->purchase_order == false) {
            $produk->update([
                'persediaan' => $produk->persediaan - $request->qty
            ]);
        }

        return back()->with('success_cart', 'Produk Sukses ditambah ke kerajang, silahkan check keranjang anda');
    }

    public function buy(Request $request)
    {

        $detail = \App\Model\DetailUser::where('user_id',\Illuminate\Support\Facades\Auth::user()->id)->first();
        if ($detail->first_name == null || $detail->alamat == null || $detail->kecamatan == null
            || $detail->kelurahan == null || $detail->zip_code == null || $detail->no_telp == null ){
            return redirect()->route('account')->with('warning', 'Mohon untuk melengkapi biodata anda terlebih dahulu!');
        }

        $cart = Cart::where('user_id', Auth::user()->id)->where('isCart', true)->get();
//        dd($cart->pluck('id')->toArray());
        foreach ($cart as $item) {
            $item->update([
                'isCart' => false,
                'isPaid' => true
            ]);
        }
        Order::create([
            'user_id' => Auth::user()->id,
            'order_item_ids' => $cart->pluck('id')->toArray(),
            'status' => 'baru'
        ]);
        return back()->with('success_cart', 'Pembelian anda akan diproses oleh pihak Dinas Koperasi Kota Madiun');


    }

    public function cancel_cart(Request $request)
    {
        $cart = Cart::find($request->id);
        $produk = Produk::find($cart->produk_id);

        if ($produk->purchase_order == false) {
            $produk->update([
                'persediaan' => $produk->persediaan + $cart->qty,
            ]);
        }
        $cart->delete();

        return back()->with('success_cart', 'Item keranjang anda berhasil dihapus');
    }

    public function add_wishlist(Request $request)
    {
        $wish = Wishlist::where('produk_id',$request->produk_id)->first();
        if (empty($wish)){
            Wishlist::create([
                'user_id' => Auth::user()->id,
                'produk_id' => $request->produk_id
            ]);

            return back()->with('success_cart', 'Daftar ingin dibeli bertambah');
        }
        else{
            return back()->with('error', 'Produk ini sudah anda favoritkan');
        }

    }

    public function remove_wishlist(Request $request)
    {
        $wish = Wishlist::find($request->id);
        $wish->delete();
        return back()->with('success_cart', 'Daftar ingin Dihapus');
    }
}
