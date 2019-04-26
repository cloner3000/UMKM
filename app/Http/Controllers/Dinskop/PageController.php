<?php

namespace App\Http\Controllers\Dinskop;

use App\Model\DetailUser;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;

class PageController extends Controller
{
    public function index()
    {
        $user = Auth::user();
        $detail = DetailUser::where('user_id',$user->id)->first();
        return view('_diskop.main',[
            'detail' => $detail
        ]);
    }


}
