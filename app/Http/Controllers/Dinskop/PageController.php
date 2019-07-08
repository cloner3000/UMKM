<?php

namespace App\Http\Controllers\Dinskop;

use App\Model\Cart;
use App\Model\DetailUser;
use App\Model\Umkm;
use App\Model\VerifyUmkm;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;

class PageController extends Controller
{
    public function index()
    {
        $user = Auth::user();
        $detail = DetailUser::where('user_id',$user->id)->first();
        $order = Cart::where('isPaid',true)->where('isVerify',false)->get();
        return view('_diskop.main',[
            'detail' => $detail,
            'order' => $order
        ]);
    }

    public function list_umkm()
    {
        $verify = VerifyUmkm::all()->pluck('umkm_id')->toArray();
        $umkm = Umkm::whereNotIn('id',$verify)->where('is_verified',false)->get();
        return view('_diskop.umkm.list',[
            'umkm' =>$umkm
        ]);
    }

    public function nonvalid()
    {
        $umkm = Umkm::wherehas('getVerify')->where('is_verified',false)->orderBy('updated_at','DESC')->get();
        return view('_diskop.umkm.list_nonvalid',[
            'umkm' =>$umkm
        ]);
    }

    public function detail_umkm($id)
    {
        $id = decrypt($id);
        $data = Umkm::findOrFail($id);
        return view('_diskop.umkm.detail',[
            'data' => $data
        ]);
    }

    public function order()
    {
        $data = Cart::where('isPaid',true)->where('isVerify',false)->where('isHandle',false)->orderBy('user_id')->paginate(10);
        return view('_diskop.order',[
           'data' => $data
        ]);
    }
}
