@extends('layouts.main')
@push('main_css')

    <link rel="stylesheet" type="text/css" href="{{asset('onetech/styles/main_styles.css')}}">
    <link rel="stylesheet" type="text/css" href="{{asset('onetech/styles/responsive.css')}}">

@endpush
@section('main_title','E-Umkm')
@section('main_content')


    <!-- Banner -->

    <div class="banner">
        <div class="banner_background"
             style="background-image:url({{asset('images/banner_background.jpg')}})"></div>
        <div class="container fill_height">
            <div class="row fill_height">
                <div class="banner_product_image"><img src="{{asset('images/banner_product.png')}}" alt="">
                </div>
                <div class="col-lg-5 offset-lg-4 fill_height">
                    <div class="banner_content">
                        <h1 class="banner_text">Segera Daftarkan UMKM Anda</h1>
                        <div class="banner_product_name">Kami Bantu Wujudkan Lapak Impianmu</div>
                        <br>
                        <div class="button banner_button"><a href="{{route('register')}}">Daftar Sekarang</a></div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- Hot New Arrivals -->

    <div class="new_arrivals">
        <div class="container">
            <div class="row">
                <div class="col">
                    <div class="tabbed_container">
                        <div class="tabs clearfix tabs-right">
                            <div class="new_arrivals_title">Produk Baru</div>
                            <ul class="clearfix">
                                <li class="active">Rekomendasi Kami</li>
                            </ul>
                            <div class="tabs_line"><span></span></div>
                        </div>
                        <div class="row">
                            <div class="col-lg-9" style="z-index:1;">

                                <!-- Product Panel -->
                                <div class="product_panel panel active">
                                    <div class="arrivals_slider slider">

                                        <!-- Slider Item -->
                                        @foreach($new as $item)
                                            <?php

                                            ?>
                                            <div class="arrivals_slider_item">
                                                <div class="border_active"></div>
                                                <div
                                                    class="product_item is_new d-flex flex-column align-items-center justify-content-center text-center">
                                                    <div
                                                        class="product_image d-flex flex-column align-items-center justify-content-center">
                                                        <img src="{{asset('upload/product/'.$item->pic1[0])}}" alt=""
                                                             style="width: 80%;"></div>
                                                    <div class="product_content">
                                                        <div class="product_price">
                                                            Rp. {{number_format($item->harga)}} </div>
                                                        <div class="product_name">
                                                            <div>
                                                                <a href="{{route('detail.product',['id' => encrypt($item->id)])}}">{{$item->nama}}</a>
                                                            </div>
                                                        </div>
                                                        <div class="product_extras">
                                                            <div class="product_color">
                                                                <input type="radio" checked name="product_color"
                                                                       style="background:#b19c83">
                                                                <input type="radio" name="product_color"
                                                                       style="background:#000000">
                                                                <input type="radio" name="product_color"
                                                                       style="background:#999999">
                                                            </div>
                                                            <a href="{{route('detail.product',['id'=> encrypt($item->id)])}}">
                                                                <button type="submit" class="product_cart_button">Lihat
                                                                    Detail
                                                                </button>
                                                            </a>
                                                        </div>
                                                    </div>
                                                    <div class="product_fav"><i class="fas fa-heart"></i></div>
                                                    <ul class="product_marks">
                                                        <li class="product_mark product_discount">-25%</li>
                                                        <li class="product_mark product_new">Baru</li>
                                                    </ul>
                                                </div>
                                            </div>

                                        @endforeach
                                    </div>
                                    <div class="arrivals_slider_dots_cover"></div>
                                </div>
                            </div>

                            <div class="col-lg-3">
                                <div class="arrivals_single clearfix">
                                    <div class="d-flex flex-column align-items-center justify-content-center">
                                        <div class="arrivals_single_image"><img src="images/new_single.png" alt="">
                                        </div>
                                        <div class="arrivals_single_content">
                                            <div class="arrivals_single_category"><a href="#">Smartphones</a></div>
                                            <div class="arrivals_single_name_container clearfix">
                                                <div class="arrivals_single_name"><a href="#">LUNA Smartphone</a></div>
                                                <div class="arrivals_single_price text-right">$379</div>
                                            </div>
                                            <div class="rating_r rating_r_4 arrivals_single_rating">
                                                <i></i><i></i><i></i><i></i><i></i></div>
                                            <form action="{{route('add.cart')}}" method="post">
                                                @csrf
                                                <button type="submit" class="arrivals_single_button">Add to Cart
                                                </button>
                                            </form>
                                        </div>
                                        <div class="arrivals_single_fav product_fav active"><i class="fas fa-heart"></i>
                                        </div>
                                        <ul class="arrivals_single_marks product_marks">
                                            <li class="arrivals_single_mark product_mark product_new">new</li>
                                        </ul>
                                    </div>
                                </div>
                            </div>

                        </div>

                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- Best Sellers -->

    <div class="best_sellers">
        <div class="container">
            <div class="row">
                <div class="col">
                    <div class="tabbed_container">
                        <div class="tabs clearfix tabs-right">
                            <div class="new_arrivals_title">Diskon Saat Ini</div>
                            <ul class="clearfix">
                                <li class="active">20 Produk Terbaik</li>
                            </ul>
                            <div class="tabs_line"><span></span></div>
                        </div>

                        <div class="bestsellers_panel panel active">

                            <!-- Best Sellers Slider -->

                            <div class="bestsellers_slider slider">

                                <!-- Best Sellers Item -->
                                @foreach($diskon as $item)
                                    <div class="bestsellers_item discount">
                                        <div
                                            class="bestsellers_item_container d-flex flex-row align-items-center justify-content-start">
                                            <div class="bestsellers_image"><img src="{{asset($item->pic1[0])}}" alt=""></div>
                                            <div class="bestsellers_content">
                                                <div class="bestsellers_category"><a href="#">Headphones</a></div>
                                                <div class="bestsellers_name"><a href="{{route('detail.product',['id' => encrypt($item->id)])}}">{{$item->nama}}</a>
                                                </div>
                                                {{--<div class="rating_r rating_r_4 bestsellers_rating">--}}
                                                    {{--<i></i><i></i><i></i><i></i><i></i></div>--}}
                                                <div class="bestsellers_price discount">Rp. {{number_format($item->harga - ($item->harga*($item->discount/100)))}}<span><br> <strike> Rp. {{number_format($item->harga)}} </strike></span></div>
                                            </div>
                                        </div>

                                        <div class="bestsellers_fav active"></div>
                                        <ul class="bestsellers_marks">
                                            <li class="bestsellers_mark bestsellers_discount">-{{$item->discount}}%</li>
                                            <li class="bestsellers_mark bestsellers_new">new</li>
                                        </ul>
                                    </div>
                                @endforeach
                            </div>
                        </div>
                    </div>

                </div>
            </div>
        </div>
    </div>
@endsection
@push('main_scipt')
    <script src="{{asset('onetech/js/custom.js')}}"></script>
@endpush
