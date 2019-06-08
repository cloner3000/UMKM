@extends('layouts.dashboard')
@section('title','Dashboard')
@section('title_page')
    <h2>Dashboard
        <small>Welcome to Dashboard</small>
    </h2>
@endsection
@section('content')
    <div class="row clearfix">
        <div class="col-xl-6 col-lg-7 col-md-12">
            <div class="card profile-header">
                <div class="body">
                    <div class="row">
                        <div class="col-lg-4 col-md-4 col-12">
                            <div class="profile-image float-md-right">
                                <img
                                    src="{{asset( 'images/diskop.png')}}" class="img-circle"
                                    alt=""></div>
                        </div>
                        <div class="col-lg-8 col-md-8 col-12">
                            <h4 class="m-t-0 m-b-0"><strong> {{ Auth::user()->username }} </strong></h4>
                            <span class="job_post">{{\Illuminate\Support\Facades\Auth::user()->email}}</span>
                            <br>
                            <p><span
                                    class="badge badge-info">{{ App\Model\Role::find(Auth::user()->role_id)->role_name }}</span>
                            </p>
                            <div>
                                @if(Auth::user()->role_id == 1)
                                    @else
                                    @if($detail->status == 'Terverifikasi')
                                        <button class="btn btn-primary btn-round" readonly><i
                                                class="zmdi zmdi-check-all"></i>Akun
                                            anda telah terverifikasi
                                        </button>
                                    @else
                                        <button class="btn btn-danger btn-round" readonly><span
                                                class="zmdi zmdi-close"></span> Akun
                                            anda belum terverifikasi
                                        </button>
                                    @endif
                                @endif
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
