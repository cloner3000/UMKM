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
                                    src="{{asset( App\Model\Umkm::where('user_id',Auth::user()->id)->firstOrFail()->avatar )}}">
                            </div>
                        </div>
                        <div class="col-lg-8 col-md-8 col-12">
                            <h4 class="m-t-0 m-b-0"><strong>{{ Auth::user()->username }}</strong></h4>
                            <span class="job_post">{{ App\Model\Role::find(Auth::user()->role_id)->role_name }}</span>
                            <p>{{App\Model\Umkm::where('user_id',Auth::user()->id)->firstOrFail()->alamat}}</p>
                            <div>
                                @if(App\Model\Umkm::where('user_id',Auth::user()->id)->firstOrFail()->is_verified == true)
                                    <button class="btn btn-primary btn-round" readonly><i
                                            class="zmdi zmdi-check-all"></i>UMKM
                                        anda telah terverifikasi
                                    </button>
                                @else
                                    <button class="btn btn-danger btn-round" readonly><span
                                            class="zmdi zmdi-close"></span> UMKM
                                        anda belum terverifikasi
                                    </button>
                                @endif

                            </div>
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
                            <h5 class="m-b-0 number count-to" data-from="0" data-to="{{$produk}}" data-speed="1000"
                                data-fresh-interval="700">{{$produk}}</h5>
                            <small>Produk</small>
                        </div>
                    </li>
                    <li class="col-lg-4 col-md-4 col-6">
                        <div class="body">
                            <i class="zmdi zmdi-thumb-up col-blue"></i>
                            <h5 class="m-b-0 number count-to" data-from="0" data-to="0" data-speed="1000"
                                data-fresh-interval="700">1203</h5>
                            <small>Likes</small>
                        </div>
                    </li>
                    <li class="col-lg-4 col-md-4 col-6">
                        <div class="body">
                            <i class="zmdi zmdi-comment-text col-red"></i>
                            <h5 class="m-b-0 number count-to" data-from="0" data-to="{{$comment}}" data-speed="1000"
                                data-fresh-interval="700">324</h5>
                            <small>Comments</small>
                        </div>
                    </li>
                    <li class="col-lg-4 col-md-4 col-6">
                        <div class="body">
                            <i class="zmdi zmdi-account text-success"></i>
                            <h5 class="m-b-0 number count-to" data-from="0" data-to="{{count($review)}}"
                                data-speed="1000"
                                data-fresh-interval="700">1980</h5>
                            <small>Review</small>
                        </div>
                    </li>
                    <li class="col-lg-4 col-md-4 col-6">
                        <div class="body">
                            <i class="zmdi zmdi-shopping-cart text-info"></i>
                            <h5 class="m-b-0 number count-to" data-from="0" data-to="{{count($order)}}" data-speed="1000"
                                data-fresh-interval="700">{{count($order)}}</h5>
                            <small>Pesanan</small>
                        </div>
                    </li>
                    <li class="col-lg-4 col-md-4 col-6">
                        <div class="body">
                            <i class="zmdi zmdi-assignment-check text-warning"></i>
                            <h5 class="m-b-0 number count-to" data-from="0" data-to="{{count($done)}}" data-speed="1000"
                                data-fresh-interval="700">{{count($done)}}</h5>
                            <small>Pesanan teratasi</small>
                        </div>
                    </li>
                </ul>
            </div>
        </div>
    </div>

    <?php
    $umkm = App\Model\Umkm::where('user_id', Auth::user()->id)->first();
    $notif = \App\Model\VerifyUmkm::where('umkm_id', $umkm->id)->where('status', 'nonvalid')->get();
    ?>
    @if($notif->count() > 0)
        <div class="row clearfix">
            <div class="col-xl-12 col-lg-7 col-md-12">

                <div class="alert alert-warning">
                    <div class="alert-icon">
                        <i class="zmdi zmdi-info"></i>
                    </div>
                    <strong>Ohh Tidak!</strong> Sepertinya data umkm anda kurang valid <a
                        href="{{route('umkm.show.akun')}}" class="alert-link">silahkan check disini</a>
                </div>
            </div>
        </div>
    @endif

    <div class="row clearfix">
        <div class="col-sm-12 col-md-12 col-lg-12">
            <div class="card">
                <div class="header">
                    <h2><strong>Pesanan</strong> Baru</h2>
                    <ul class="header-dropdown">
                        <li class="dropdown">
                            <a href="javascript:void(0);" class="dropdown-toggle"
                               data-toggle="dropdown" role="button" aria-haspopup="true"
                               aria-expanded="false"> <i class="zmdi zmdi-more"></i> </a>
                            <ul class="dropdown-menu slideUp">
                                <li><a href="{{route('umkm.order')}}">Pesanan Hari ini</a></li>
                                <li><a href="javascript:void(0);">Seluruh Pesanan</a></li>
                            </ul>
                        </li>
                        {{--<li class="remove">--}}
                        {{--<a role="button" class="boxs-close"><i class="zmdi zmdi-close"></i></a>--}}
                        {{--</li>--}}
                    </ul>
                </div>
                <div class="body table-responsive members_profiles">
                    <table class="table table-hover">
                        <thead>
                        <tr>
                            <th style="width:60px;">#</th>
                            <th>Pemesan</th>
                            <th>Item</th>
                            <th>Address</th>
                            <th>Quantity</th>
                            <th>Status</th>
                        </tr>
                        </thead>
                        <tbody>
                        @foreach($order as $item)
                            <?php
                            $user = \App\User::find($item->user_id);
                            $detail = \App\Model\DetailUser::where('user_id',$user->id)->first();
                            ?>
                            <tr>
                                <td><img src="http://via.placeholder.com/60x50" alt="Product img"></td>
                                <td>{{$user->username}}</td>
                                <td>{{\App\Model\Produk::find($item->produk_id)->nama}}</td>
                                <td>{{$detail->alamat}} <br>
                                    Kec. {{$detail->kecamatan}}, Kel. {{$detail->kelurahan}} <br>
                                    Kode pos : {{$detail->zip_code}}
                                </td>
                                <td>{{$item->qty}}</td>
                                <?php
                                ?>
                                <td><span class="badge badge-info">Baru Masuk</span></td>
                            </tr>
                        @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>

    <div class="row clearfix">
        <div class="col-xl-8 col-lg-7 col-md-12">
            <div class="card">
                <div class="header">
                    <h2><strong>Review</strong> Pelanggan Terbaru </h2>
                    <ul class="header-dropdown">
                        <li class="dropdown"><a href="javascript:void(0);" class="dropdown-toggle"
                                                data-toggle="dropdown" role="button" aria-haspopup="true"
                                                aria-expanded="false"> <i class="zmdi zmdi-more"></i> </a>
                            <ul class="dropdown-menu slideUp">
                                <li><a href="{{route('umkm.review.show')}}">Lihat Selengkapnya</a></li>
                            </ul>
                        </li>
                    </ul>
                </div>
                <div class="body">
                    <ul class="row list-unstyled c_review">
                        <?php
                        Carbon\Carbon::setLocale('id');
                        ?>
                        @foreach($review as $item)
                            <li class="col-12">
                                <div class="comment-action">
                                    <h6 class="c_name">Hossein Shams</h6>
                                    <p class="c_msg m-b-0">{{$item->konten}} </p>
                                    <div
                                        class="badge badge-info">{{\App\Model\Produk::find($item->produk_id)->nama}}</div>
                                    <span class="m-l-10">
                                        <?php
                                        $selisih = 5 - $item->star
                                        ?>
                                        @for($i=1 ; $i <= $item->star ; $i++)
                                            <a href="javascript:void(0);"><i class="zmdi zmdi-star col-amber"></i></a>
                                        @endfor
                                        @for($i=1 ; $i <= $selisih ; $i++)
                                            <a href="javascript:void(0);"><i
                                                    class="zmdi zmdi-star-outline text-muted"></i></a>
                                        @endfor
                                    </span>
                                    <small
                                        class="comment-date float-sm-right">{{\Carbon\Carbon::parse($item->created_at)->format('d M, Y')}}</small>
                                </div>
                            </li>
                        @endforeach
                    </ul>
                </div>
            </div>
        </div>
    </div>
@endsection
