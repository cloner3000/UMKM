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
                                    src="{{asset( App\Model\Umkm::where('user_id',Auth::user()->id)->firstOrFail()->avatar )}}"
                                    alt=""></div>
                        </div>
                        <div class="col-lg-8 col-md-8 col-12">
                            <h4 class="m-t-0 m-b-0"><strong>{{ Auth::user()->username }}</strong></h4>
                            <span class="job_post">{{ App\Model\Role::find(Auth::user()->role_id)->role_name }}</span>
                            <p>795 Folsom Ave, Suite 600<br> San Francisco, CADGE 94107</p>
                            <div>
                                @if(App\Model\Umkm::where('user_id',Auth::user()->id)->firstOrFail()->is_verified == true)
                                    <button class="btn btn-primary btn-round" readonly><i class="zmdi zmdi-check-all"></i>UMKM
                                        anda telah terverifikasi
                                    </button>
                                @else
                                    <button class="btn btn-danger btn-round" readonly><span class="zmdi zmdi-close"></span> UMKM
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
                            <h5 class="m-b-0 number count-to" data-from="0" data-to="{{$produk}}" data-speed="1000"
                                data-fresh-interval="700">{{$produk}}</h5>
                            <small>Produk</small>
                        </div>
                    </li>
                    <li class="col-lg-4 col-md-4 col-6">
                        <div class="body">
                            <i class="zmdi zmdi-thumb-up col-blue"></i>
                            <h5 class="m-b-0 number count-to" data-from="0" data-to="{{count($like)}}" data-speed="1000"
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

    <div class="row clearfix">
        <div class="col-sm-12 col-md-12 col-lg-12">
            <div class="card">
                <div class="header">
                    <h2><strong>Pesanan</strong> Baru</h2>
                    <ul class="header-dropdown">
                        <li class="dropdown"> <a href="javascript:void(0);" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false"> <i class="zmdi zmdi-more"></i> </a>
                            <ul class="dropdown-menu slideUp">
                                <li><a href="javascript:void(0);">Pesanan Hari ini</a></li>
                                <li><a href="javascript:void(0);">Seluruh Pesanan</a></li>
                            </ul>
                        </li>
                        <li class="remove">
                            <a role="button" class="boxs-close"><i class="zmdi zmdi-close"></i></a>
                        </li>
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
                        <tr>
                            <td><img src="http://via.placeholder.com/60x50" alt="Product img"></td>
                            <td>Hossein</td>
                            <td>IPONE-7</td>
                            <td>Porterfield 508 Virginia Street Chicago, IL 60653</td>
                            <td>3</td>
                            <td><span class="badge badge-success">DONE</span></td>
                        </tr>
                        <tr>
                            <td><img src="http://via.placeholder.com/60x50" alt="Product img"></td>
                            <td>Camara</td>
                            <td>NOKIA-8</td>
                            <td>2595 Pearlman Avenue Sudbury, MA 01776 </td>
                            <td>3</td>
                            <td><span class="badge badge-default">Delivered</span></td>
                        </tr>
                        <tr>
                            <td><img src="http://via.placeholder.com/60x50" alt="Product img"></td>
                            <td>Maryam</td>
                            <td>NOKIA-456</td>
                            <td>Porterfield 508 Virginia Street Chicago, IL 60653</td>
                            <td>4</td>
                            <td><span class="badge badge-success">DONE</span></td>
                        </tr>
                        <tr>
                            <td><img src="http://via.placeholder.com/60x50" alt="Product img"></td>
                            <td>Micheal</td>
                            <td>SAMSANG PRO</td>
                            <td>508 Virginia Street Chicago, IL 60653</td>
                            <td>1</td>
                            <td><span class="badge badge-success">DONE</span></td>
                        </tr>
                        <tr>
                            <td><img src="http://via.placeholder.com/60x50" alt="Product img"></td>
                            <td>Frank</td>
                            <td>NOKIA-456</td>
                            <td>1516 Holt Street West Palm Beach, FL 33401</td>
                            <td>13</td>
                            <td><span class="badge badge-warning">PENDING</span></td>
                        </tr>
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
                    <h2><strong>Komentar</strong> Terbaru  </h2>
                    <ul class="header-dropdown">
                        <li class="dropdown"> <a href="javascript:void(0);" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false"> <i class="zmdi zmdi-more"></i> </a>
                            <ul class="dropdown-menu slideUp">
                                <li><a href="javascript:void(0);">Action</a></li>
                                <li><a href="javascript:void(0);">Another action</a></li>
                                <li><a href="javascript:void(0);">Something else</a></li>
                            </ul>
                        </li>
                        <li class="remove">
                            <a role="button" class="boxs-close"><i class="zmdi zmdi-close"></i></a>
                        </li>
                    </ul>
                </div>
                <div class="body">
                    <ul class="row list-unstyled c_review">
                        <li class="col-12">
                            <div class="comment-action">
                                <h6 class="c_name">Hossein Shams</h6>
                                <p class="c_msg m-b-0">Cras sit amet nibh libero, in gravida nulla. Nulla vel metus scelerisque ante sollicitudin commodo. </p>
                                <div class="badge badge-info">iPhone 8</div>
                                <span class="m-l-10">
                                        <a href="javascript:void(0);"><i class="zmdi zmdi-star col-amber"></i></a>
                                        <a href="javascript:void(0);"><i class="zmdi zmdi-star col-amber"></i></a>
                                        <a href="javascript:void(0);"><i class="zmdi zmdi-star col-amber"></i></a>
                                        <a href="javascript:void(0);"><i class="zmdi zmdi-star col-amber"></i></a>
                                        <a href="javascript:void(0);"><i class="zmdi zmdi-star col-amber"></i></a>
                                    </span>
                                <small class="comment-date float-sm-right">Dec 21, 2017</small>
                            </div>
                        </li>
                        <li class="col-12">

                            <div class="comment-action">
                                <h6 class="c_name">Tim Hank</h6>
                                <p class="c_msg m-b-0">It is a long established fact that a reader will be distracted by the readable content of a page when looking at its layout</p>
                                <div class="badge badge-info">Nokia 8</div>
                                <span class="m-l-10">
                                        <a href="javascript:void(0);"><i class="zmdi zmdi-star col-amber"></i></a>
                                        <a href="javascript:void(0);"><i class="zmdi zmdi-star col-amber"></i></a>
                                        <a href="javascript:void(0);"><i class="zmdi zmdi-star-outline text-muted"></i></a>
                                        <a href="javascript:void(0);"><i class="zmdi zmdi-star-outline text-muted"></i></a>
                                        <a href="javascript:void(0);"><i class="zmdi zmdi-star-outline text-muted"></i></a>
                                    </span>
                                <small class="comment-date float-sm-right">Dec 18, 2017</small>
                            </div>
                        </li>

                    </ul>
                </div>
            </div>
        </div>
        <div class="col-xl-4 col-lg-5 col-md-12">
            <div class="card member-card">
                <div class="header l-parpl">
                    <h4 class="m-t-0">Matthew Deo</h4>
                </div>
                <div class="member-img">
                    <a href="profile.html" class="">
                        <img class="rounded-circle" src="../assets/images/lg/avatar3.jpg"  alt="profile-image">
                    </a>
                </div>
                <div class="body">
                    <div class="col-12">
                        <ul class="social-links list-unstyled">
                            <li>
                                <a title="facebook" href="javascript:void(0);">
                                    <i class="zmdi zmdi-facebook"></i>
                                </a>
                            </li>
                            <li>
                                <a title="twitter" href="javascript:void(0);">
                                    <i class="zmdi zmdi-twitter"></i>
                                </a>
                            </li>
                            <li>
                                <a title="instagram" href="javascript:void(0);">
                                    <i class="zmdi zmdi-instagram"></i>
                                </a>
                            </li>
                        </ul>
                        <p class="text-muted">795 Folsom Ave, Suite 600 San Francisco, CADGE 94107</p>
                    </div>
                    <hr>
                    <div class="row">
                        <div class="col-4">
                            <h5>98</h5>
                            <small>Item Buy</small>
                        </div>
                        <div class="col-4">
                            <h5>78</h5>
                            <small>Mobile</small>
                        </div>
                        <div class="col-4">
                            <h5>2,046$</h5>
                            <small>Spent</small>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

@endsection
