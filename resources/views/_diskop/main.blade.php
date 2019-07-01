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
                                <li><a href="javascript:void(0);">Pesanan Hari ini</a></li>
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
                            <th>Produk</th>
                            <th>Produksi Oleh</th>
                            <th>Alamat Pembeli</th>
                            <th>Jumlah</th>
                            <th>Waktu pesan</th>
                        </tr>
                        </thead>
                        <tbody>
                        @foreach($order as $item)
                            <?php
                                \Carbon\Carbon::setLocale('ID');
                            $user = \App\User::find($item->user_id);
                            $detail = \App\Model\DetailUser::where('user_id',$user->id)->first();
                            $produk = \App\Model\Produk::find($item->produk_id);
                            $umkm = \App\Model\Umkm::find($produk->umkm_id);
                            ?>
                            <tr>
                                <td><img src="http://via.placeholder.com/60x50" alt="Product img"></td>
                                <td>{{$user->username}}</td>
                                <td>{{\App\Model\Produk::find($item->produk_id)->nama}}</td>
                                <td>{{$umkm->nama}}<br>
                                    {{$umkm->no_telp}}</td>
                                <td>{{$detail->alamat}} <br>
                                    Kec. {{$detail->kecamatan}}, Kel. {{$detail->kelurahan}} <br>
                                    Kode pos : {{$detail->zip_code}}
                                </td>
                                <td>{{$item->qty}}</td>
                                <?php
                                ?>
                                <td>{{\Carbon\Carbon::parse($item->created_at)->diffForHumans()}}</td>
                            </tr>
                        @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
@endsection
