<?php

namespace App\Http\Controllers\Umkm;

use App\Model\Produk;
use App\Model\Umkm;
use Illuminate\Database\Eloquent\ModelNotFoundException;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\Input;

class ProductController extends Controller
{
    public function store(Request $request)
    {
        if ($request->hasFile('photos')) {
            $umkm_id = Umkm::where('user_id', Auth::user()->id)->first();
            $produk = Produk::create([
                'nama' => $request->nama,
                'umkm_id' => $umkm_id->id,
                'short_desc' => $request->short_desc,
                'long_desc' => $request->description,
                'keyword' => $request->key,
                'kategori_ids' => $request->kategori,
                'harga' => $request->harga,
                'purchase_order' => $request->preorder,
                'pic1' => $request->key,
                'bukalapak_link' => $request->bukalapak_link,
                'tokped_link' => $request->tokped_link,
                'status' => 'ensf',
            ]);

            if ($produk->purchase_order == false) {
                $produk->update([
                    'persediaan' => $request->stock
                ]);
            }

            if ($request->isDiscount == true) {
                $produk->update([
                    'isDiscount' => $request->isDiscount,
                    'discount' => $request->discount
                ]);
            }

            $allowedfileExtension = ['jpeg', 'jpg', 'png', 'svg'];
            $files = $request->file('photos');
            $img = array();
            foreach ($files as $file) {
                $extention = $file->getClientOriginalExtension();
                $filename = $file->getClientOriginalName();
                $file->move('upload/product/' . $umkm_id->id . '/', $filename);
                array_push($img, $umkm_id->id . '/' . $filename);
            }
            $produk->update([
                'pic1' => $img
            ]);

        }
        return redirect()->route('umkm.produk')->with('success_products', 'Data Berhasil Ditambah');
    }

    public function update(Request $request)
    {

        //if Nambah foto
        if ($request->hasFile('photos')) {
            $umkm_id = Umkm::where('user_id', Auth::user()->id)->first();
            $produk = Produk::find($request->id);

            $produk->update([
                'nama' => $request->nama,
                'umkm_id' => $umkm_id->id,
                'short_desc' => $request->short_desc,
                'long_desc' => $request->description,
                'keyword' => $request->key,
                'kategori_ids' => $request->kategori,
                'harga' => $request->harga,
                'purchase_order' => $request->po,
                'status' => 'ensf',
                'persediaan' => $request->stock,
                'isDiscount' => false,
                'discount' => $request->discount,
                'bukalapak_link' => $request->bukalapak_link,
                'tokped_link' => $request->tokped_link,
            ]);

            if ($request->isDiscount == true) {
                $produk->update([
                    'isDiscount' => $request->isDiscount,
                    'discount' => $request->discount
                ]);
            }

            $allowedfileExtension = ['jpeg', 'jpg', 'png', 'svg'];
            $files = $request->file('photos');
            $img = $produk->pic1;
            foreach ($files as $file) { //Storing Image to Public
                $extention = $file->getClientOriginalExtension();
                $filename = $file->getClientOriginalName();
                $file->move('upload/product/' . $umkm_id->id . '/', $filename);
                array_push($img, $umkm_id->id . '/' . $filename);
            }
            $produk->update([
                'pic1' => $img
            ]);

            $base_path = "upload/product/";
            if ($request->has('temp_photos')) {
                foreach ($request->temp_photos as $item) {
                    $key = array_search($item, $img);
                    array_splice($img, $key, 1);
                    //deleting Image
                    if (File::exists($base_path . $item)) {
                        File::delete($base_path . $item);
                    }
                }
                $produk->update([
                    'pic1' => $img
                ]);
                return redirect()->route('umkm.produk')->with('success_products', 'Data Berhasil Diperbarui');
            }

            return redirect()->route('umkm.produk')->with('success_products', 'Data Berhasil Diperbarui');
        } else {

            $umkm_id = Umkm::where('user_id', Auth::user()->id)->first();
            $produk = Produk::findOrFail($request->id);
            $produk->update([
                'nama' => $request->nama,
                'umkm_id' => $umkm_id->id,
                'short_desc' => $request->short_desc,
                'long_desc' => $request->description,
                'keyword' => $request->key,
                'kategori_ids' => $request->kategori,
                'harga' => $request->harga,
                'purchase_order' => $request->po,
                'status' => 'ensf',
                'persediaan' => $request->stock,
                'isDiscount' =>false,
                'discount' => $request->discount,
                'bukalapak_link' => $request->bukalapak_link,
                'tokped_link' => $request->tokped_link,
            ]);

            if ($request->isDiscount == true) {
                $produk->update([
                    'isDiscount' => $request->isDiscount,
                    'discount' => $request->discount
                ]);
            }
            //delete selecten image

            if ($request->has('temp_photos')) {
                $img = $produk->pic1;
                $base_path = "upload/product/";
                foreach ($request->temp_photos as $item) {
                    $key = array_search($item, $img);
                    array_splice($img, $key, 1);
                    //deleting Image
                    if (File::exists($base_path . $item)) {
                        File::delete($base_path . $item);
                    }
                }
                $produk->update([
                    'pic1' => $img
                ]);
                return redirect()->route('umkm.produk')->with('success_products', 'Data Berhasil Diperbarui');
            }

            return redirect()->route('umkm.produk')->with('success_products', 'Data Berhasil Diperbarui');
        }
    }

    public function destroy(Request $request)
    {
        try {
            $item = Produk::findOrfail($request->id);
            $base_path = "upload/product/";
            foreach ($item->pic1 as $photo) {
                if (File::exists($base_path . $photo)) {
                    File::delete($base_path . $photo);
                }
            }
            $item->delete();
            return redirect()->route('umkm.produk')->with('success_products', 'Data Berhasil Di hapus');
        } catch (ModelNotFoundException $exception) {
            return redirect()->route('umkm.produk')->with('error', $exception);
        }
    }
}
