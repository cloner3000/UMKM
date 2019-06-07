<?php

namespace App\Http\Controllers\Root;

use App\Model\JenisUmkm;
use App\Model\Kategori;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class DataMasterController extends Controller
{
    public function jenisUmkm_store(Request $request)
    {
        $check = JenisUmkm::where('name', $request->name_)->get()->count();
        if ($check < 1) {
            JenisUmkm::create([
                'name' => $request->name_
            ]);
            return back()->with('success_master', 'Data Berhasil di tambah');
        } else {
            return back()->with('error_master', 'Data telah ada, Silahkan masukkan data yang lain')->withInput();
        }
    }

    public function jenisUmkm_update(Request $request)
    {
        $check = JenisUmkm::where('name', $request->jenis_umkm)->get()->count();
        if ($check < 1) {
            $data = JenisUmkm::findOrFail($request->id);
            $data->update([
                'name' => $request->jenis_umkm
            ]);
            return back()->with('success_master', 'Data Berhasil di perbarui');
        } else {
            return back()->with('error_master', 'Data telah ada, Silahkan masukkan data yang lain')->withInput();
        }
    }

    public function jenisUmkm_destroy(Request $request)
    {
        $data = JenisUmkm::findOrFail($request->id);
        $data->delete();
        return back()->with('success_master', 'Data Berhasil di hapus');
    }

    // Kategori

    public function kategori_store(Request $request)
    {
        $check = Kategori::where('name', $request->name_)->get()->count();
        if ($check < 1) {
            Kategori::create([
                'name' => $request->name_
            ]);
            return back()->with('success_master', 'Data Berhasil di tambah');
        } else {
            return back()->with('error_master', 'Data telah ada, Silahkan masukkan data yang lain')->withInput();
        }
    }

    public function kategori_update(Request $request)
    {
        $check = Kategori::where('name', $request->kategori)->get()->count();
        if ($check < 1) {
            $data = Kategori::findOrFail($request->id);
            $data->update([
                'name' => $request->kategori
            ]);
            return back()->with('success_master', 'Data Berhasil di perbarui');
        } else {
            return back()->with('error_master', 'Data telah ada, Silahkan masukkan data yang lain')->withInput();
        }
    }

    public function kategori_destroy(Request $request)
    {
        $data = Kategori::findOrFail($request->id);
        $data->delete();
        return back()->with('success_master', 'Data Berhasil di hapus');
    }
}
