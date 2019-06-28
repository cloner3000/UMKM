@extends('layouts.main')
@push('main_css')
    <link rel="stylesheet" type="text/css" href="{{asset('onetech/styles/product_styles.css')}}">
    <link rel="stylesheet" type="text/css" href="{{asset('onetech/styles/product_responsive.css')}}">

@endpush
@section('main_title','Detail Produk')
@section('main_content')

    <!-- Single Product -->

    <div class="single_product">
        <div class="container">
            <div class="row">

                <!-- Images -->
                <div class="col-lg-2 order-lg-1 order-2">
                    <ul class="image_list">
                        @foreach($data->pic1 as $item)
                            <li data-image="{{asset('upload/product/'.$item)}}"><img
                                    src="{{asset('upload/product/'.$item)}}" alt=""></li>
                        @endforeach
                    </ul>
                </div>

                <!-- Selected Image -->
                <div class="col-lg-5 order-lg-2 order-1">
                    <div class="image_selected"><img src="{{asset('upload/product/'.$data->pic1[0])}}" alt=""></div>
                </div>

                <!-- Description -->
                <div class="col-lg-5 order-3">
                    <div class="product_description">
                        <div class="product_category">Laptops</div>
                        <div class="product_name">{{$data->nama}}</div>
                        <div class="rating_r rating_r_4 product_rating"><i></i><i></i><i></i><i></i><i></i></div>
                        <div class="product_text">{!! $data->long_desc !!}</div>
                        <div class="order_info d-flex flex-row">
                            <form action="#">
                                <div class="clearfix" style="z-index: 1000;">

                                    <!-- Product Quantity -->
                                    <div class="product_quantity clearfix">
                                        <span>Jumlah: </span>
                                        <input id="quantity_input" type="text" min="1" pattern="[0-9]*" value="1"
                                               readonly>
                                        <input id="max_qty" type="hidden" value="{{$data->persediaan}}">
                                        <div class="quantity_buttons">
                                            <div id="quantity_inc_button" class="quantity_inc quantity_control"><i
                                                    class="fas fa-chevron-up"></i></div>
                                            <div id="quantity_dec_button" class="quantity_dec quantity_control"><i
                                                    class="fas fa-chevron-down"></i></div>
                                        </div>
                                    </div>

                                    <!-- Product Color -->
                                    {{--<ul class="product_color">--}}
                                        {{--<li>--}}
                                            {{--<span>Color: </span>--}}
                                            {{--<div class="color_mark_container">--}}
                                                {{--<div id="selected_color" class="color_mark"></div>--}}
                                            {{--</div>--}}
                                            {{--<div class="color_dropdown_button"><i class="fas fa-chevron-down"></i></div>--}}

                                            {{--<ul class="color_list">--}}
                                                {{--<li>--}}
                                                    {{--<div class="color_mark" style="background: #999999;"></div>--}}
                                                {{--</li>--}}
                                                {{--<li>--}}
                                                    {{--<div class="color_mark" style="background: #b19c83;"></div>--}}
                                                {{--</li>--}}
                                                {{--<li>--}}
                                                    {{--<div class="color_mark" style="background: #000000;"></div>--}}
                                                {{--</li>--}}
                                            {{--</ul>--}}
                                        {{--</li>--}}
                                    {{--</ul>--}}

                                </div>

                                <div class="product_price">Rp {{number_format($data->harga)}}</div>
                                <div class="button_container">
                                    <form action="" method="post">
                                        <input type="text" id="hasil_qty" name="qty" hidden>
                                        <button type="submit" class="button cart_button">Tambah ke keranjang</button>
                                    </form>
                                    <div class="product_fav"><i class="fas fa-heart"></i></div>
                                </div>

                            </form>
                        </div>
                    </div>
                </div>

            </div>
        </div>
    </div>

@endsection
@push('main_scipt')
    <script src="{{asset('onetech/js/product_custom.js')}}"></script>
@endpush
