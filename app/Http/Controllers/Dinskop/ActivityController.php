<?php

namespace App\Http\Controllers\Dinskop;

use App\Model\VerifyUmkm;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class ActivityController extends Controller
{
    public function verify(Request $request)
    {
        $check = VerifyUmkm::where('umkm_id', $request->umkm_id)->get();
        if ($check->count() < 1) {
            if ($request->status == 'nonvalid') {
                VerifyUmkm::create([
                    'umkm_id' => $request->umkm_id,
                    'status' => $request->status,
                    'note' => $request->note,
                ]);
                return back()->with('success_verify','Status Umkm berhasil ditangani');
            } else {
                $ver =  VerifyUmkm::create([
                    'umkm_id' => $request->umkm_id,
                    'status' => $request->status,
                ]);

                if($request->hasFile('bukti')){
                    $file = $request->file('akta_notaris');
                    $bukti = $file->getClientOriginalName();
                    $file->move('upload/diskop/bukti/', $request->umkm_id.'/'.$bukti);
                    $ver->update([
                        'bukti' => 'upload/diskop/bukti/'.$request->umkm_id.'/'.$bukti
                    ]);
                }

                return back()->with('success_verify','Status Umkm berhasil ditangani');
            }
        } else {

        }
    }
}
