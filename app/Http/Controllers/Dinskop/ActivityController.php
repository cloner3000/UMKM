<?php

namespace App\Http\Controllers\Dinskop;

use App\Model\Umkm;
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
                    $file = $request->file('bukti');
                    $bukti = $file->getClientOriginalName();
                    $file->move('upload/diskop/bukti/', $request->umkm_id.'/'.$bukti);
                    $ver->update([
                        'bukti' => 'upload/diskop/bukti/'.$request->umkm_id.'/'.$bukti
                    ]);
                }

                return back()->with('success_verify','Status Umkm berhasil ditangani');
            }
        } else {
            $verify = VerifyUmkm::findOrFail($request->verify_id);
            if ($request->status == 'nonvalid') {
                $verify->update([
                    'umkm_id' => $request->umkm_id,
                    'status' => $request->status,
                    'note' => $request->note,
                ]);
                return back()->with('success_verify','Status Umkm berhasil ditangani');
            } else {
                $umkm = Umkm::findOrFail($request->umkm_id);
                $verify->update([
                    'umkm_id' => $request->umkm_id,
                    'status' => $request->status,
                ]);
                $umkm->update([
                    'is_verified' => true
                ]);

                if($request->hasFile('bukti')){
                    $file = $request->file('bukti');
                    $bukti = $file->getClientOriginalName();
                    $file->move('upload/diskop/bukti/', $request->umkm_id.'/'.$bukti);
                    $verify->update([
                        'bukti' => 'upload/diskop/bukti/'.$request->umkm_id.'/'.$bukti
                    ]);
                }

                return back()->with('success_verify','Status Umkm berhasil ditangani');
            }
        }
    }
}
