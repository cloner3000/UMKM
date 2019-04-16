@extends('layouts.dashboard')
@section('title','Product List')
@section('title_page')
    <h2>Daftar Produk Anda
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
                                    src="{{asset( App\Model\Umkm::where('user_id',Auth::user()->id)->firstOrFail()->avatar )}}"
                                    alt=""></div>
                        </div>
                        <div class="col-lg-8 col-md-8 col-12">
                            <h4 class="m-t-0 m-b-0"><strong>{{ Auth::user()->username }}</strong></h4>
                            <span class="job_post">{{ App\Model\Role::find(Auth::user()->role_id)->role_name }}</span>
                            <p>795 Folsom Ave, Suite 600<br> San Francisco, CADGE 94107</p>
                            <div>
                                @if(App\Model\Umkm::where('user_id',Auth::user()->id)->firstOrFail()->is_verified == true)
                                    <button class="btn btn-primary btn-round" readonly><i class="zmdi zmdi-check-all"></i>Usaha
                                        anda telah terverifikasi
                                    </button>
                                @else
                                    <button class="btn btn-danger btn-round" readonly><span class="zmdi zmdi-close"></span> Usaha
                                        anda belum terverifikasi
                                    </button>
                                @endif

                            </div>
                            <p class="social-icon m-t-5 m-b-0">
                                <a title="Twitter" href="javascript:void(0);"><i class="zmdi zmdi-twitter"></i></a>
                                <a title="Facebook" href="javascript:void(0);"><i
                                        class="zmdi zmdi-facebook"></i></a>
                                <a title="Google-plus" href="javascript:void(0);"><i class="zmdi zmdi-twitter"></i></a>
                                <a title="Behance" href="javascript:void(0);"><i class="zmdi zmdi-behance"></i></a>
                                <a title="Instagram" href="javascript:void(0);"><i class="zmdi zmdi-instagram "></i></a>
                            </p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-xl-6 col-lg-5 col-md-12">
            <div class="card">
                <ul class="row profile_state list-unstyled">
                    <li class="col-lg-4 col-md-4 col-6">
                        <div class="body">
                            <i class="zmdi zmdi-case-check col-amber"></i>
                            <h5 class="m-b-0 number count-to" data-from="0" data-to="2365" data-speed="1000"
                                data-fresh-interval="700">2365</h5>
                            <small>Shots View</small>
                        </div>
                    </li>
                    <li class="col-lg-4 col-md-4 col-6">
                        <div class="body">
                            <i class="zmdi zmdi-thumb-up col-blue"></i>
                            <h5 class="m-b-0 number count-to" data-from="0" data-to="1203" data-speed="1000"
                                data-fresh-interval="700">1203</h5>
                            <small>Likes</small>
                        </div>
                    </li>
                    <li class="col-lg-4 col-md-4 col-6">
                        <div class="body">
                            <i class="zmdi zmdi-comment-text col-red"></i>
                            <h5 class="m-b-0 number count-to" data-from="0" data-to="324" data-speed="1000"
                                data-fresh-interval="700">324</h5>
                            <small>Comments</small>
                        </div>
                    </li>
                    <li class="col-lg-4 col-md-4 col-6">
                        <div class="body">
                            <i class="zmdi zmdi-account text-success"></i>
                            <h5 class="m-b-0 number count-to" data-from="0" data-to="1980" data-speed="1000"
                                data-fresh-interval="700">1980</h5>
                            <small>Profile Views</small>
                        </div>
                    </li>
                    <li class="col-lg-4 col-md-4 col-6">
                        <div class="body">
                            <i class="zmdi zmdi-desktop-mac text-info"></i>
                            <h5 class="m-b-0 number count-to" data-from="0" data-to="251" data-speed="1000"
                                data-fresh-interval="700">251</h5>
                            <small>Website View</small>
                        </div>
                    </li>
                    <li class="col-lg-4 col-md-4 col-6">
                        <div class="body">
                            <i class="zmdi zmdi-attachment text-warning"></i>
                            <h5 class="m-b-0 number count-to" data-from="0" data-to="52" data-speed="1000"
                                data-fresh-interval="700">52</h5>
                            <small>Attachment</small>
                        </div>
                    </li>
                </ul>
            </div>
        </div>
    </div>


@endsection
