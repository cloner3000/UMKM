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
            $produk =  Produk::create([
                'nama' => $request->nama,
                'umkm_id' => $umkm_id->id,
                'short_desc' => $request->short_desc,
                'long_desc' => $request->description,
                'keyword' => $request->key,
                'kategori_ids' => $request->kategori,
                'harga' => $request->harga,
                'purchase_order' => $request->po,
                'pic1' => $request->key,
                'status' => 'ensf'
            ]);

            $allowedfileExtension = ['jpeg', 'jpg', 'png', 'svg'];
            $files = $request->file('photos');
            $img = array();
            foreach ($files as $file) {
                $extention = $file->getClientOriginalExtension();
                $filename = $file->getClientOriginalName();
                $file->move('upload/product/'.$umkm_id->id.'/', $filename);
                array_push($img,$umkm_id->id.'/'.$filename);
            }
            $produk->update([
               'pic1' => $img
            ]);

        }
        return redirect()->route('umkm.produk')->with('success','Data Berhasil Ditambah');
    }

    public function update(Request $request)
    {
        if ($request->hasFile('photos')) {
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
                'status' => 'ensf'
            ]);

            $allowedfileExtension = ['jpeg', 'jpg', 'png', 'svg'];
            $files = $request->file('photos');
            $img = $produk->pic1;
            foreach ($files as $file) { //Storing Image to Public
                $extention = $file->getClientOriginalExtension();
                $filename = $file->getClientOriginalName();
                $file->move('upload/product/'.$umkm_id->id.'/', $filename);
                array_push($img,$umkm_id->id.'/'.$filename);
            }
            $produk->update([
                'pic1' => $img
            ]);

            $base_path = "upload/product/";
            if($request->has('temp_photos')){
                foreach ($request->temp_photos as $item){
                    $key = array_search($item,$img);
                    array_splice($img,$key,1);
                    //deleting Image
                    if(File::exists($base_path.$item)){
                        File::delete($base_path.$item);
                    }
                }
                $produk->update([
                    'pic1' => $img
                ]);
                return redirect()->route('umkm.produk')->with('success','Data Berhasil Diperbarui');
            }

            return redirect()->route('umkm.produk')->with('success','Data Berhasil Diperbarui');
        }
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
                'status' => 'ensf'
            ]);

            $img = $produk->pic1;
            $base_path = "upload/product/";
            if($request->has('temp_photos')){
                foreach ($request->temp_photos as $item){
                    $key = array_search($item,$img);
                    array_splice($img,$key,1);
                    //deleting Image
                    if(File::exists($base_path.$item)){
                        File::delete($base_path.$item);
                    }
                }
                $produk->update([
                    'pic1' => $img
                ]);
                return redirect()->route('umkm.produk')->with('success','Data Berhasil Diperbarui');
            }
        return redirect()->route('umkm.produk')->with('success','Data Berhasil Diperbarui');
    }

    public function destroy(Request $request)
    {
        try{
            $item = Produk::findOrfail($request->id);
            $base_path = "upload/product/";
            foreach ($item->pic1 as $photo){
                if(File::exists($base_path.$photo)){
                    File::delete($base_path.$photo);
                }
            }
            $item->delete();
            return redirect()->route('umkm.produk')->with('success','Data Berhasil Di hapus');
        }catch (ModelNotFoundException $exception){
            return redirect()->route('umkm.produk')->with('error',$exception);
        }

    }
}
