@extends('layouts.main')
@push('main_css')
    <link rel="stylesheet" type="text/css" href="{{asset('onetech/styles/product_styles.css')}}">
    <link rel="stylesheet" type="text/css" href="{{asset('onetech/styles/product_responsive.css')}}">
    <style>
        .light-bg {
            background-color: #ffffff;
        }

        .dark-bg {
            background-color: #0a0a0a;
        }

        p.lead {
            color: #8fc400;
            margin-bottom: 2rem;
        }

        .section {
            padding: 80px 0;
        }

        .section-title {
            text-align: center;
            margin-bottom: 3rem;
        }

        .section-title small {
            color: #00bfff;
        }

        .img-thumbnail {
            border-color: #00bfff;
        }

        @media (max-width: 767px) {
            h1 {
                font-size: 40px;
            }

            h2 {
                font-size: 30px;
            }
        }

        /*  TABS
        ----------------------*/

        .tab-content {
            border-bottom-right-radius: 3px;
            border-bottom-left-radius: 3px;
            background-color: #FFF;
            box-shadow: 5px 5px 7px 5px rgba(0, 0, 0, 0.04);
            padding: 3rem;
        }

        @media (max-width: 992px) {
            .tab-content {
                padding: 1.5rem;
            }
        }

        .tab-content p {
            line-height: 1.8;
        }

        .tab-content h2 {
            margin-bottom: 0.5rem;
        }

        .nav-tabs {
            border-bottom: 0;
        }

        .nav-tabs .nav-item .nav-link,
        .nav-tabs .nav-link:focus,
        .nav-tabs .nav-link:hover {
            padding: 1rem 1rem;
            border-color: #faf6fb #faf6fb #FFF;
            font-size: 19px;
            color: #b5a4c8;
            background: #f5eff7;
        }

        .nav-tabs .nav-link.active {
            background: #FFF;
            border-top-width: 3px;
            border-color: #12b5e5 #faf6fb #FFF;
            color: #12b5e5;
        }

        #thumbwrap {
            position: relative;
        }

        .thumb span {
            position: absolute;
            visibility: hidden;
        }

        .thumb:hover,
        .thumb:hover span {
            visibility: visible;
            top: 0;
            left: 100px;
            z-index: 1;
        }

        @media (max-width: 650px) {
            .nav-tabs {
                display: block;
            }
        }
    </style>
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
                        <div class="product_category">
                            @foreach($data->kategori_ids as $item)
                                {{\App\Model\Kategori::find($item)->name}}
                            @endforeach
                        </div>
                        <div class="product_name">{{$data->nama}}</div>
                        <p class="lead">{{\App\Model\Umkm::find($data->umkm_id)->nama}}
                            @if(\App\Model\Umkm::find($data->umkm_id)->is_verified == true)
                                <button type="button"
                                        data-toggle="tooltip" title="Umkm ini telah terverifikasi"
                                        class="product_fav btn-info"><i class="fas fa-check "></i></button>
                            @else
                            @endif
                        </p>
                        {{--<div class="rating_r rating_r_4 product_rating"><i></i><i></i><i></i><i></i><i></i></div>--}}
                        <div class="product_text"></div>
                        <div class="order_info d-flex flex-row">
                            <form action="{{route('add.cart')}}" method="post">
                                @csrf
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
                                    {{--<div class="produkcolor_mark" style="background: #b19c83;"></div>--}}
                                    {{--</li>--}}
                                    {{--<li>--}}
                                    {{--<div class="color_mark" style="background: #000000;"></div>--}}
                                    {{--</li>--}}
                                    {{--</ul>--}}
                                    {{--</li>--}}
                                    {{--</ul>--}}

                                </div>

                                <div class="product_price">Rp {{number_format($data->harga)}} / Unit</div>
                                <div class="button_container">
                                    <input type="text" id="hasil_qty" name="qty" hidden>
                                    <input type="text" id="hasil_qty" name="produk_id" value="{{$data->id}}" hidden>
                                    <button type="submit" class="button cart_button"><span
                                            class="fa fa-cart-plus"></span> Tambah ke keranjang
                                    </button>
                                    <button id="wishlist" type="button" onclick="wishlist_pro()"
                                            data-toggle="tooltip" title="Wishlist Produk ini"
                                            class="product_fav"><i class="fas fa-heart"></i></button>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
            <br>
            <form id="form_wishlist" action="{{route('add.wishlist')}}" method="post">
                @csrf
                <input type="hidden" name="produk_id" value="{{$data->id}}">
            </form>


            <div class="row">
                <div class="container">
                    <div class="section light-bg">
                        <div class="container">

                            <ul class="nav nav-tabs nav-justified">
                                <li class="nav-item">
                                    <a class="nav-link active" data-toggle="tab" href="#tab-1-1">
                                        <h6><span class="fa fa-list-alt"></span> Informasi Produk</h6>
                                    </a>
                                </li>
                                <li class="nav-item">
                                    <a class="nav-link" data-toggle="tab" href="#tab-1-2">
                                        <h6><span class="fa fa-thumbs-up"></span> Review</h6>
                                    </a>
                                </li>
                                <li class="nav-item">
                                    <a class="nav-link" data-toggle="tab" href="#tab-1-3">
                                        <h6><span class="fa fa-question-circle"></span> Tanya Jawab</h6>
                                    </a>
                                </li>
                            </ul>
                            <div class="tab-content">
                                <div class="tab-pane show active" id="tab-1-1">
                                    <div class="d-flex flex-column flex-lg-row">
                                        <div>
                                            <h2>{{$data->nama}}</h2>
                                            @if(!$data->purchase_order)
                                                <p class="lead">Jumlah Persediaan Saat ini :
                                                    <b> {{$data->persediaan}}</b>
                                                </p>
                                            @else
                                                <button class="btn btn-success btn-round">Produk Pre-order</button>
                                            @endif
                                            <br>
                                            <br>

                                            {!! $data->long_desc !!}

                                            <br><br>

                                            <p>Check juga dilink berikut</p>
                                            <div class="row">
                                                @if($data->tokped_link != null)
                                                    <div class="col-lg-3">
                                                        <a href="{{url($data->tokped_link)}}" target="_blank">
                                                            <img src="{{asset('images/tokped.png')}}" alt="Tokopedia"
                                                                 style="width: 64px">
                                                        </a>
                                                    </div>
                                                @endif
                                                @if($data->bukalapak_link != null)
                                                    <div class="col-lg-3">
                                                        <a href="{{url($data->bukalapak_link)}}" target="_blank">
                                                            <img src="{{asset('images/bl.png')}}" alt="Bukalapak"
                                                                 style="width: 64px">
                                                        </a>
                                                    </div>
                                                @endif
                                            </div>

                                        </div>
                                    </div>
                                </div>

                                <div class="tab-pane" id="tab-1-2">
                                    <div class="d-flex flex-column flex-lg-row">
                                        @if(count($review) < 1)
                                            <div class="row">
                                                <div class="col-md-3 offset-2">
                                                    <img src="{{asset('images/norecordfound-icon.png')}}" alt="graphic"
                                                         class="img-fluid rounded ">
                                                </div>
                                                <div class="col-md-7">
                                                    <div class="mx-auto d-block pull-left">
                                                        <br>
                                                        <br>
                                                        <br>
                                                        <br>
                                                        <h4 class="center-align">Belum ada ulasan untuk produk ini</h4>
                                                        <p>Jadilah yang pertama untuk membeli dan memberikan review
                                                            untuk
                                                            produk ini</p>
                                                    </div>
                                                </div>
                                            </div>
                                        @else
                                            @foreach($review as $item)
                                                <div class="container">
                                                    <div class="media">
                                                        <div class="pr-3" href="#">
                                                            <div class="vote up">
                                                                <i class="fas fa-chevron-up"></i>
                                                            </div>
                                                            <div class="vote inactive">
                                                                <i class="fas fa-chevron-down"></i>
                                                            </div>
                                                        </div>
                                                        <div class="media-body">
                                                            <div class="row">
                                                                <div class="col-lg-2">
                                                                    <h5 class="mt-0">
                                                                        {{\App\User::find($item->user_id)->username}}
                                                                    </h5>
                                                                </div>
                                                                <div class="col-lg-2">
                                                                    {{\Carbon\Carbon::parse($item->created_at)->format('d-M-y')}}
                                                                </div>
                                                            </div>


                                                            <span class="m-l-10">
                                                                <?php
                                                                $selisih = 5 - $item->star
                                                                ?>
                                                                @for($i=1 ; $i <= $item->star ; $i++)
                                                                    <a href="javascript:void(0);"><i
                                                                            class="fa fa-star text-warning"></i></a>
                                                                @endfor
                                                                @for($i=1 ; $i <= $selisih ; $i++)
                                                                    <a href="javascript:void(0);"><i
                                                                            class="fa fa-star text-secondary"></i></a>
                                                                @endfor
                                                            </span>
                                                            <br>

                                                            {{$item->konten}}
                                                            <br>
                                                            @if($item->attachment != null)
                                                                <div id="thumbwrap">
                                                                    <a class="thumb" href="#">
                                                                        <img src="{{asset($item->attachment)}}" alt=""
                                                                             style="width: 128px; height: 50%">
                                                                        <span>
                                                                          <img src="{{asset($item->attachment)}}"
                                                                               alt=""></span>
                                                                    </a>
                                                                </div>
                                                            @else
                                                            @endif
                                                            <br>
                                                            <br>
                                                        </div>
                                                    </div>
                                                </div>
                                            @endforeach
                                        @endif
                                    </div>
                                </div>

                                <div class="tab-pane" id="tab-1-3">
                                    <div class="d-flex flex-column flex-lg-row">
                                        <div class="container">
                                            <div class="row">
                                                <div class="col-lg-12">
                                                    @foreach($comment as $item)
                                                        <div class="container">
                                                            <div class="media">
                                                                <div class="pr-3" href="#">
                                                                    <div class="vote up">
                                                                        <i class="fas fa-chevron-up"></i>
                                                                    </div>
                                                                    <div class="vote inactive">
                                                                        <i class="fas fa-chevron-down"></i>
                                                                    </div>
                                                                </div>
                                                                <div class="media-body">
                                                                    <h5 class="mt-0">{{\App\User::find($item->user_id)->username}}</h5>
                                                                    {{$item->message}}

                                                                    <?php
                                                                    $answer = \App\Model\Comment::where('isAnswer', true)->where('comment_id', $item->id)->get();
                                                                    ?>
                                                                    @foreach($answer as $ans)
                                                                        <div class="media mt-3">
                                                                            <div class="pr-3" href="#">
                                                                                <div class="vote up">
                                                                                    <i class="fas fa-chevron-up"></i>
                                                                                </div>
                                                                                <div class="vote inactive">
                                                                                    <i class="fas fa-chevron-down"></i>
                                                                                </div>
                                                                            </div>
                                                                            <div class="media-body">
                                                                                <?php
                                                                                $user = \App\User::find($ans->user_id);
                                                                                ?>

                                                                                <h5 class="mt-0">{{$user->username}}
                                                                                    @if($user->role_id == 3)
                                                                                        <span class="badge badge-info">Penjual</span>
                                                                                    @endif
                                                                                </h5>
                                                                                {{$ans->message}}
                                                                            </div>
                                                                        </div>
                                                                    @endforeach
                                                                    <br>
                                                                    <br>
                                                                    <form action="{{route('submit.comment.answer')}}"
                                                                          method="post">
                                                                        @csrf
                                                                        <div class="input-group mb-3">
                                                                            <input type="text" class="form-control"
                                                                                   placeholder="Isi Komentar disini"
                                                                                   aria-label="Recipient's username"
                                                                                   aria-describedby="basic-addon2"
                                                                                   name="massage"
                                                                                   required>
                                                                            <input type="hidden" name="produk_id"
                                                                                   value="{{$data->id}}">
                                                                            <input type="hidden" name="comment_id"
                                                                                   value="{{$item->id}}">
                                                                            <div class="input-group-append">
                                                                                <button class="btn btn-outline-info"
                                                                                        type="submit">Kirim
                                                                                </button>
                                                                            </div>
                                                                        </div>
                                                                    </form>
                                                                </div>
                                                            </div>
                                                        </div>
                                                        <br>
                                                        <br>
                                                    @endforeach
                                                </div>
                                            </div>
                                            <br><br>
                                            <div class="row">
                                                <div class="col-lg-12">

                                                    <div class="card border-info ">
                                                        <div class="card-header bg-transparent border-info"> Ada
                                                            pertanyaan ?<b>
                                                                Diskusikan dengan penjual</b>
                                                        </div>
                                                        <div class="card-body text-success">
                                                            <textarea name="question" id="tanya_ta" cols="115" rows="10"
                                                                      class="form-control" onchange="change_val()"
                                                                      placeholder="Apa yang anda tanyakan perihal produk ini?"
                                                                      style="box-sizing:border-box"></textarea>
                                                            <br>
                                                            <p class="card-text">
                                                                <button type="button" id="template1"
                                                                        class="btn btn-outline-info"
                                                                        data-toggle="tooltip"
                                                                        style="border-radius: 40px"
                                                                        onclick="question('Permisi, Apakah Barang Ready ?')"
                                                                        title="Permisi, Apakah Barang Ready ?">
                                                                    Permisi
                                                                    ,Apakah B.....
                                                                </button>
                                                                <button type="button" id="template2"
                                                                        class="btn btn-outline-info"
                                                                        data-toggle="tooltip"
                                                                        style="border-radius: 40px"
                                                                        onclick="question('Apakah Barang Bisa Dikirm Hari ini ?')"
                                                                        title="Apakah Barang Bisa Dikirm Hari ini ?">
                                                                    Apakah Barang B.....
                                                                </button>
                                                                <button type="button" id="template3"
                                                                        class="btn btn-outline-info"
                                                                        data-toggle="tooltip"
                                                                        style="border-radius: 40px"
                                                                        onclick="question('Apakah Ada Toko Offline ?')"
                                                                        title="Apakah Ada Toko Offline ?">Apakah Ada
                                                                    To.....
                                                                </button>
                                                            </p>
                                                            <div class="float-right">
                                                                <form action="{{route('submit.comment')}}"
                                                                      method="post">
                                                                    @csrf
                                                                    <input type="hidden" name="comment"
                                                                           id="comment_hidden">
                                                                    <input type="hidden" name="produk_id" id=""
                                                                           value="{{$data->id}}">
                                                                    <button type="submit" id="template3"
                                                                            class="btn btn-info">Kirim
                                                                    </button>
                                                                </form>
                                                            </div>
                                                        </div>
                                                    </div>

                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

@endsection
@push('main_scipt')
    <script src="{{asset('onetech/js/product_custom.js')}}"></script>
    <script>

        $(document).ready(function () {
            $('#hasil_qty').val("1")
        })

        function wishlist_pro() {
            $('#form_wishlist').submit()
        }

        function question(q) {
            var input = $('#tanya_ta');
            var konten = input.val(input.val() + q);
            $('#comment_hidden').val(konten.val())
        }

        function change_val() {
            var input = $('#tanya_ta');
            $('#comment_hidden').val(input.val())
        }

        $(function () {
            "use strict";

            // $('a[href*="#"]').on('click', function (event) {
            //     {
            //         // Figure out element to scroll to
            //         var target = $(this);
            //         target = target.length ? target : $('[name=' + this.slice(1) + ']');
            //         // Does a scroll target exist?
            //         if (target.length) {
            //             // Only prevent default if animation is actually gonna happen
            //             event.preventDefault();
            //             $('html, body').animate({
            //                 scrollTop: target.offset().top
            //             }, 1000, function () {
            //                 // Callback after animation
            //                 // Must change focus!
            //                 var $target = $(target);
            //                 $target.focus();
            //                 if ($target.is(":focus")) { // Checking if the target was focused
            //                     return false;
            //                 } else {
            //                     $target.attr('tabindex', '-1'); // Adding tabindex for elements not focusable
            //                     $target.focus(); // Set focus again
            //                 }
            //                 ;
            //             });
            //         }
            //     }
            // });

        }); /* End Fn */
    </script>
@endpush
