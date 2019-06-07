<?php

namespace App\Http\Controllers\Root;

use App\Model\JenisUmkm;
use foo\bar;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Queue\Console\RetryCommand;

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
}
