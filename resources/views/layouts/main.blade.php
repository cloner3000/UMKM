<!DOCTYPE html>
<html lang="id">
<head>
    <title>@yield('main_title')</title>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="description" content="">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="icon" href="{{asset('images/shop.ico')}}">
    <link rel="stylesheet" href="{{asset('onetech/styles/bootstrap4/bootstrap.min.css')}}" type="text/css">
    <link href="{{asset('onetech/plugins/fontawesome-free-5.0.1/css/fontawesome-all.css')}}" rel="stylesheet"
          type="text/css">
    <link rel="stylesheet" type="text/css" href="{{asset('onetech/plugins/OwlCarousel2-2.2.1/owl.carousel.css')}}">
    <link rel="stylesheet" type="text/css" href="{{asset('onetech/plugins/OwlCarousel2-2.2.1/owl.theme.default.css')}}">
    <link rel="stylesheet" type="text/css" href="{{asset('onetech/plugins/OwlCarousel2-2.2.1/animate.css')}}">

    <link rel="stylesheet" type="text/css" href="{{asset('onetech/plugins/slick-1.8.0/slick.css')}}">
    <!-- Sweet Alert v2 -->
    <script src="{{ asset('js/sweetalert/sweetalert.min.js') }}"></script>
    @stack('main_css')
    <style>
        /*
 *
 * login-register modal
 * Autor: Creative Tim
 * Web-autor: creative.tim
 * Web script: http://creative-tim.com
 *
 */

        /*  Shake animation  */


        .animated {
            -webkit-animation-duration: 1s;
            -moz-animation-duration: 1s;
            -o-animation-duration: 1s;
            animation-duration: 1s;
            -webkit-animation-fill-mode: both;
            -moz-animation-fill-mode: both;
            -o-animation-fill-mode: both;
            animation-fill-mode: both;
        }

        .animated.hinges {
            -webkit-animation-duration: 2s;
            -moz-animation-duration: 2s;
            -o-animation-duration: 2s;
            animation-duration: 2s;
        }

        .animated.slow {
            -webkit-animation-duration: 3s;
            -moz-animation-duration: 3s;
            -o-animation-duration: 3s;
            animation-duration: 3s;
        }

        .animated.snail {
            -webkit-animation-duration: 4s;
            -moz-animation-duration: 4s;
            -o-animation-duration: 4s;
            animation-duration: 4s;
        }

        @-webkit-keyframes shake {
            0%, 100% {
                -webkit-transform: translateX(0);
            }
            10%, 30%, 50%, 70%, 90% {
                -webkit-transform: translateX(-10px);
            }
            20%, 40%, 60%, 80% {
                -webkit-transform: translateX(10px);
            }
        }

        @-moz-keyframes shake {
            0%, 100% {
                -moz-transform: translateX(0);
            }
            10%, 30%, 50%, 70%, 90% {
                -moz-transform: translateX(-10px);
            }
            20%, 40%, 60%, 80% {
                -moz-transform: translateX(10px);
            }
        }

        @-o-keyframes shake {
            0%, 100% {
                -o-transform: translateX(0);
            }
            10%, 30%, 50%, 70%, 90% {
                -o-transform: translateX(-10px);
            }
            20%, 40%, 60%, 80% {
                -o-transform: translateX(10px);
            }
        }

        @keyframes shake {
            0%, 100% {
                transform: translateX(0);
            }
            10%, 30%, 50%, 70%, 90% {
                transform: translateX(-10px);
            }
            20%, 40%, 60%, 80% {
                transform: translateX(10px);
            }
        }

        .shake {
            -webkit-animation-name: shake;
            -moz-animation-name: shake;
            -o-animation-name: shake;
            animation-name: shake;
        }

        .login .modal-dialog {
            width: 350px;
        }

        .login .modal-footer {
            border-top: 0;
            margin-top: 0px;
            padding: 10px 20px 20px;
        }

        .login .modal-header {
            border: 0 none;
            padding: 15px 15px 15px;
            /*     padding: 11px 15px; */
        }

        .login .modal-body {
            /*     background-color: #eeeeee; */
        }

        .login .division {
            float: none;
            margin: 0 auto 18px;
            overflow: hidden;
            position: relative;
            text-align: center;
            width: 100%;
        }

        .login .division .line {
            border-top: 1px solid #DFDFDF;
            position: absolute;
            top: 10px;
            width: 34%;
        }

        .login .division .line.l {
            left: 0;
        }

        .login .division .line.r {
            right: 0;
        }

        .login .division span {
            color: #424242;
            font-size: 17px;
        }

        .login .box .social {
            float: none;
            margin: 0 auto 30px;
            text-align: center;
        }

        .login .social .circle {
            background-color: #EEEEEE;
            color: #FFFFFF;
            border-radius: 100px;
            display: inline-block;
            margin: 0 17px;
            padding: 15px;
        }

        .login .social .circle .fa {
            font-size: 16px;
        }

        .login .social .facebook {
            background-color: #455CA8;
            color: #FFFFFF;
        }

        .login .social .google {
            background-color: #F74933;
        }

        .login .social .github {
            background-color: #403A3A;
        }

        .login .facebook:hover {
            background-color: #6E83CD;
        }

        .login .google:hover {
            background-color: #FF7566;
        }

        .login .github:hover {
            background-color: #4D4D4d;;
        }

        .login .forgot {
            color: #797979;
            margin-left: 0;
            overflow: hidden;
            text-align: center;
            width: 100%;
        }

        .login .btn-login, .registerBox .btn-register {
            background-color: #60bafd;
            border-color: #60bafd;
            border-width: 0;
            color: #FFFFFF;
            display: block;
            margin: 0 auto;
            padding: 15px 50px;
            text-transform: uppercase;
            width: 100%;
        }

        .login .btn-login:hover, .registerBox .btn-register:hover {
            background-color: #00A4E4;
            color: #FFFFFF;
        }

        .login .form-control {
            border-radius: 3px;
            background-color: rgba(0, 0, 0, 0.09);
            box-shadow: 0 1px 0px 0px rgba(0, 0, 0, 0.09) inset;
            color: #FFFFFF;
        }

        .login .form-control:hover {
            background-color: rgba(0, 0, 0, .16);
        }

        .login .form-control:focus {
            box-shadow: 0 1px 0 0 rgba(0, 0, 0, 0.04) inset;
            background-color: rgba(0, 0, 0, 0.23);
            color: #FFFFFF;
        }

        .login .box .form input[type="text"], .login .box .form input[type="password"] {
            border-radius: 3px;
            border: none;
            color: #333333;
            font-size: 16px;
            height: 46px;
            margin-bottom: 5px;
            padding: 13px 12px;
            width: 100%;
        }


        @media (max-width: 400px) {
            .login .modal-dialog {
                width: 100%;
            }
        }

        .big-login, .big-register {
            background-color: #00bbff;
            color: #FFFFFF;
            border-radius: 7px;
            border-width: 2px;
            font-size: 14px;
            font-style: normal;
            font-weight: 200;
            padding: 16px 60px;
            text-transform: uppercase;
            transition: all 0.3s ease 0s;
        }

        .big-login:hover {
            background-color: #00A4E4;
            color: #FFFFFF;
        }

        .big-register {
            background-color: rgba(0, 0, 0, .0);
            color: #00bbff;
            border-color: #00bbff;
        }

        .big-register:hover {
            border-color: #00A4E4;
            color: #00A4E4;
        }
    </style>
</head>

<body>

<div class="super_container">

    <!-- Header -->

    <header class="header">

        <!-- Top Bar -->

        <div class="top_bar">
            <div class="container">
                <div class="row">
                    <div class="col d-flex flex-row">
                        <div class="top_bar_contact_item">
                            <div class="top_bar_icon"><span class="fa fa-phone"></span></div>
                            (0351) 464195
                        </div>
                        <div class="top_bar_contact_item">
                            <div class="top_bar_icon"></div>
                            <a href=""></a></div>
                        <div class="top_bar_content ml-auto">
                            @guest()
                                <div class="top_bar_user">
                                    <div class="user_icon"><img src="images/user.svg" alt=""></div>
                                    <div><a href="javascript:void(0)" onclick="openRegisterModal();"><span
                                                class="fa fa-user-plus"></span> Daftar </a></div>
                                    <div><a href="javascript:void(0)" onclick="openLoginModal();"> <span
                                                class="fa fa-sign-in-alt"></span> Masuk</a></div>
                                </div>
                            @else
                                <div class="top_bar_menu">
                                    <ul class="standard_dropdown top_bar_dropdown">
                                        <li>
                                            <a href="#">{{Auth::user()->username}} <span
                                                    class="fa fa-caret-down"></span></a>
                                            <ul>
                                                <li><a href="{{route('history')}}"><span class="fa fa-history"></span> Riwayat
                                                        Pembelian</a></li>
                                                <li><a href="{{route('account')}}"><span class="fa fa-cog"></span>
                                                        Pengaturan Akun</a></li>
                                                <li class="float-right">
                                                    <a href="{{ route('logout') }}"
                                                       onclick="event.preventDefault();
                                                         document.getElementById('logout-form').submit();"
                                                       class="mega-menu" data-close="true"><span
                                                            class="fa fa-power-off"> </span> Keluar </a>
                                                    <form id="logout-form" action="{{ route('logout') }}" method="POST"
                                                          style="display: none;">
                                                        @csrf
                                                    </form>

                                                </li>
                                            </ul>
                                        </li>
                                    </ul>
                                </div>
                            @endguest
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <!-- Header Main -->

        <div class="header_main">
            <div class="container">
                @auth()
                    <?php
                    $detail = \App\Model\DetailUser::where('user_id', \Illuminate\Support\Facades\Auth::user()->id)->first();
                    ?>
                    @if($detail->first_name == null || $detail->alamat == null || $detail->kecamatan == null
                    || $detail->kelurahan == null || $detail->zip_code == null || $detail->no_telp == null )
                        <div class="row">
                            <div class="col-lg-12 ">
                                <div class="alert alert-info" role="alert">
                                    Satu Langkah lagi. Ayo lengkapi datamu klik <a href="{{route('account')}}"
                                                                                   class="alert-link">Disini</a>
                                </div>
                            </div>
                        </div>
                    @endif
                @endauth
                <div class="row">
                    <!-- Logo -->
                    <div class="col-lg-2 col-sm-3 col-3 order-1">
                        <div class="logo_container">
                            <div class="logo"><a href="{{route('landing')}}">E-UMKM</a></div>
                        </div>
                    </div>

                    <!-- Search -->
                    <div class="col-lg-6 col-12 order-lg-2 order-3 text-lg-left text-right">
                        <div class="header_search">
                            <div class="header_search_content">
                                <div class="header_search_form_container">
                                    <form action="{{route('search')}}" class="header_search_form clearfix" method="get">
                                        <input type="search" required="required" class="header_search_input" name="key"
                                               placeholder="Search for products...">
                                        <div class="custom_dropdown">
                                            <div class="custom_dropdown_list">
                                                <span class="custom_dropdown_placeholder clc">All Categories</span>
                                                <i class="fas fa-chevron-down"></i>
                                                <ul class="custom_list clc">
                                                    <li><a class="clc" href="#">All Categories</a></li>
                                                    <li><a class="clc" href="#">Computers</a></li>
                                                    <li><a class="clc" href="#">Laptops</a></li>
                                                    <li><a class="clc" href="#">Cameras</a></li>
                                                    <li><a class="clc" href="#">Hardware</a></li>
                                                    <li><a class="clc" href="#">Smartphones</a></li>
                                                </ul>
                                            </div>
                                        </div>
                                        <button type="submit" class="header_search_button trans_300"
                                                style="color: white;" value="Submit"><span class="fa fa-search"></span>
                                        </button>
                                    </form>
                                </div>
                            </div>
                        </div>
                    </div>

                    <!-- Wishlist -->
                    @guest()
                    @else
                        <?php
                        $cart = \App\Model\Cart::where('user_id', Auth::user()->id)->where('isPaid', false)->get();
                        $wish = \App\Model\Wishlist::where('user_id', Auth::user()->id)->get();
                        $paid = 0;
                        foreach ($cart as $item) {
                            $paid = $paid + $item->harga;
                        }

                        ?>
                        <div class="col-lg-4 col-9 order-lg-3 order-2 text-lg-left text-right">
                            <div class="wishlist_cart d-flex flex-row align-items-center justify-content-end">
                                <div class="wishlist d-flex flex-row align-items-center justify-content-end">
                                    <div class="wishlist_icon">
                                        <span class="fa fa-heart" style="font-size: 32pt"></span>
                                    </div>
                                    <div class="wishlist_content">
                                        <div class="wishlist_text"><a href="{{route('wishlist')}}">Wishlist</a></div>
                                        <div class="wishlist_count">{{count($wish)}}</div>
                                    </div>
                                </div>

                                <!-- Cart -->
                                <div class="cart">
                                    <div class="cart_container d-flex flex-row align-items-center justify-content-end">
                                        <div class="cart_icon">
                                            <span class="fa fa-shopping-cart" style="font-size: 32pt"></span>
                                            <div class="cart_count"><span>{{count($cart)}}</span></div>
                                        </div>
                                        <div class="cart_content">
                                            <div class="cart_text"><a href="{{route('cart')}}">Keranjang</a></div>
                                            <div class="cart_price">Rp. {{number_format($paid)}}</div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    @endguest
                </div>
            </div>
        </div>

        <!-- Main Navigation -->

        <nav class="main_nav">
            <div class="container">
                <div class="row">
                    <div class="col">

                        <div class="main_nav_content d-flex flex-row">

                            <!-- Categories Menu -->

                            <div class="cat_menu_container">
                                <div class="cat_menu_title d-flex flex-row align-items-center justify-content-start">
                                    <div class="cat_burger"><span></span><span></span><span></span></div>
                                    <div class="cat_menu_text">Kategori</div>
                                </div>

                                <ul class="cat_menu">
                                    @foreach(\App\Model\Kategori::all()->take(9) as $item)
                                        <li><a href="#">{{$item->name}} <i class="fas fa-chevron-right ml-auto"></i></a>
                                        </li>
                                    @endforeach
                                </ul>
                            </div>

                            <!-- Main Nav Menu -->

                            {{--<div class="main_nav_menu ml-auto">--}}
                                {{--<ul class="standard_dropdown main_nav_dropdown">--}}
                                    {{--<li><a href="#">Home<i class="fas fa-chevron-down"></i></a></li>--}}
                                    {{--<li class="hassubs">--}}
                                        {{--<a href="#">Super Deals<i class="fas fa-chevron-down"></i></a>--}}
                                        {{--<ul>--}}
                                            {{--<li>--}}
                                                {{--<a href="#">Menu Item<i class="fas fa-chevron-down"></i></a>--}}
                                                {{--<ul>--}}
                                                    {{--<li><a href="#">Menu Item<i class="fas fa-chevron-down"></i></a>--}}
                                                    {{--</li>--}}
                                                    {{--<li><a href="#">Menu Item<i class="fas fa-chevron-down"></i></a>--}}
                                                    {{--</li>--}}
                                                    {{--<li><a href="#">Menu Item<i class="fas fa-chevron-down"></i></a>--}}
                                                    {{--</li>--}}
                                                {{--</ul>--}}
                                            {{--</li>--}}
                                            {{--<li><a href="#">Menu Item<i class="fas fa-chevron-down"></i></a></li>--}}
                                            {{--<li><a href="#">Menu Item<i class="fas fa-chevron-down"></i></a></li>--}}
                                            {{--<li><a href="#">Menu Item<i class="fas fa-chevron-down"></i></a></li>--}}
                                        {{--</ul>--}}
                                    {{--</li>--}}
                                    {{--<li class="hassubs">--}}
                                        {{--<a href="#">Featured Brands<i class="fas fa-chevron-down"></i></a>--}}
                                        {{--<ul>--}}
                                            {{--<li>--}}
                                                {{--<a href="#">Menu Item<i class="fas fa-chevron-down"></i></a>--}}
                                                {{--<ul>--}}
                                                    {{--<li><a href="#">Menu Item<i class="fas fa-chevron-down"></i></a>--}}
                                                    {{--</li>--}}
                                                    {{--<li><a href="#">Menu Item<i class="fas fa-chevron-down"></i></a>--}}
                                                    {{--</li>--}}
                                                    {{--<li><a href="#">Menu Item<i class="fas fa-chevron-down"></i></a>--}}
                                                    {{--</li>--}}
                                                {{--</ul>--}}
                                            {{--</li>--}}
                                            {{--<li><a href="#">Menu Item<i class="fas fa-chevron-down"></i></a></li>--}}
                                            {{--<li><a href="#">Menu Item<i class="fas fa-chevron-down"></i></a></li>--}}
                                            {{--<li><a href="#">Menu Item<i class="fas fa-chevron-down"></i></a></li>--}}
                                        {{--</ul>--}}
                                    {{--</li>--}}
                                    {{--<li class="hassubs">--}}
                                        {{--<a href="#">Pages<i class="fas fa-chevron-down"></i></a>--}}
                                        {{--<ul>--}}
                                            {{--<li><a href="shop.html">Shop<i class="fas fa-chevron-down"></i></a></li>--}}
                                            {{--<li><a href="product.html">Product<i class="fas fa-chevron-down"></i></a>--}}
                                            {{--</li>--}}
                                            {{--<li><a href="blog.html">Blog<i class="fas fa-chevron-down"></i></a></li>--}}
                                            {{--<li><a href="blog_single.html">Blog Post<i class="fas fa-chevron-down"></i></a>--}}
                                            {{--</li>--}}
                                            {{--<li><a href="regular.html">Regular Post<i--}}
                                                        {{--class="fas fa-chevron-down"></i></a></li>--}}
                                            {{--<li><a href="cart.html">Cart<i class="fas fa-chevron-down"></i></a></li>--}}
                                            {{--<li><a href="contact.html">Contact<i class="fas fa-chevron-down"></i></a>--}}
                                            {{--</li>--}}
                                        {{--</ul>--}}
                                    {{--</li>--}}
                                    {{--<li><a href="blog.html">Blog<i class="fas fa-chevron-down"></i></a></li>--}}
                                    {{--<li><a href="contact.html">Contact<i class="fas fa-chevron-down"></i></a></li>--}}
                                {{--</ul>--}}
                            {{--</div>--}}

                            <!-- Menu Trigger -->

                            <div class="menu_trigger_container ml-auto">
                                <div class="menu_trigger d-flex flex-row align-items-center justify-content-end">
                                    <div class="menu_burger">
                                        <div class="menu_trigger_text">menu</div>
                                        <div class="cat_burger menu_burger_inner">
                                            <span></span><span></span><span></span></div>
                                    </div>
                                </div>
                            </div>

                        </div>
                    </div>
                </div>
            </div>
        </nav>

        <!-- Menu -->

        <div class="page_menu">
            <div class="container">
                <div class="row">
                    <div class="col">

                        <div class="page_menu_content">

                            <div class="page_menu_search">
                                <form action="#">
                                    <input type="search" required="required" class="page_menu_search_input"
                                           placeholder="Search for products...">
                                </form>
                            </div>
                            <ul class="page_menu_nav">
                                <li class="page_menu_item has-children">
                                    <a href="#">Language<i class="fa fa-angle-down"></i></a>
                                    <ul class="page_menu_selection">
                                        <li><a href="#">English<i class="fa fa-angle-down"></i></a></li>
                                        <li><a href="#">Italian<i class="fa fa-angle-down"></i></a></li>
                                        <li><a href="#">Spanish<i class="fa fa-angle-down"></i></a></li>
                                        <li><a href="#">Japanese<i class="fa fa-angle-down"></i></a></li>
                                    </ul>
                                </li>
                                <li class="page_menu_item has-children">
                                    <a href="#">Currency<i class="fa fa-angle-down"></i></a>
                                    <ul class="page_menu_selection">
                                        <li><a href="#">US Dollar<i class="fa fa-angle-down"></i></a></li>
                                        <li><a href="#">EUR Euro<i class="fa fa-angle-down"></i></a></li>
                                        <li><a href="#">GBP British Pound<i class="fa fa-angle-down"></i></a></li>
                                        <li><a href="#">JPY Japanese Yen<i class="fa fa-angle-down"></i></a></li>
                                    </ul>
                                </li>
                                <li class="page_menu_item">
                                    <a href="#">Home<i class="fa fa-angle-down"></i></a>
                                </li>
                                <li class="page_menu_item has-children">
                                    <a href="#">Super Deals<i class="fa fa-angle-down"></i></a>
                                    <ul class="page_menu_selection">
                                        <li><a href="#">Super Deals<i class="fa fa-angle-down"></i></a></li>
                                        <li class="page_menu_item has-children">
                                            <a href="#">Menu Item<i class="fa fa-angle-down"></i></a>
                                            <ul class="page_menu_selection">
                                                <li><a href="#">Menu Item<i class="fa fa-angle-down"></i></a></li>
                                                <li><a href="#">Menu Item<i class="fa fa-angle-down"></i></a></li>
                                                <li><a href="#">Menu Item<i class="fa fa-angle-down"></i></a></li>
                                                <li><a href="#">Menu Item<i class="fa fa-angle-down"></i></a></li>
                                            </ul>
                                        </li>
                                        <li><a href="#">Menu Item<i class="fa fa-angle-down"></i></a></li>
                                        <li><a href="#">Menu Item<i class="fa fa-angle-down"></i></a></li>
                                        <li><a href="#">Menu Item<i class="fa fa-angle-down"></i></a></li>
                                    </ul>
                                </li>
                                <li class="page_menu_item has-children">
                                    <a href="#">Featured Brands<i class="fa fa-angle-down"></i></a>
                                    <ul class="page_menu_selection">
                                        <li><a href="#">Featured Brands<i class="fa fa-angle-down"></i></a></li>
                                        <li><a href="#">Menu Item<i class="fa fa-angle-down"></i></a></li>
                                        <li><a href="#">Menu Item<i class="fa fa-angle-down"></i></a></li>
                                        <li><a href="#">Menu Item<i class="fa fa-angle-down"></i></a></li>
                                    </ul>
                                </li>
                                <li class="page_menu_item has-children">
                                    <a href="#">Trending Styles<i class="fa fa-angle-down"></i></a>
                                    <ul class="page_menu_selection">
                                        <li><a href="#">Trending Styles<i class="fa fa-angle-down"></i></a></li>
                                        <li><a href="#">Menu Item<i class="fa fa-angle-down"></i></a></li>
                                        <li><a href="#">Menu Item<i class="fa fa-angle-down"></i></a></li>
                                        <li><a href="#">Menu Item<i class="fa fa-angle-down"></i></a></li>
                                    </ul>
                                </li>
                                <li class="page_menu_item"><a href="blog.html">blog<i class="fa fa-angle-down"></i></a>
                                </li>
                                <li class="page_menu_item"><a href="contact.html">contact<i
                                            class="fa fa-angle-down"></i></a></li>
                            </ul>

                            <div class="menu_contact">
                                <div class="menu_contact_item">
                                    <div class="menu_contact_icon"><span class="fa fa-phone"></span></div>
                                    +38 068 005 3570
                                </div>
                                <div class="menu_contact_item">
                                    <div class="menu_contact_icon"><span class="fa fa-envelope"></span></div>
                                    <a href="mailto:fastsales@gmail.com">fastsales@gmail.com</a></div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

    </header>

@yield('main_content')
@include('layouts.partial.modal_login')
<!-- Characteristics -->


    <!-- Footer -->

    <footer class="footer">
        <div class="container">
            <div class="row">

                <div class="col-lg-3 footer_col">
                    <div class="footer_column footer_contact">
                        <div class="logo_container">
                            <div class="logo"><a href="{{route('landing')}}">E-UMKM</a></div>
                        </div>
                        <div class="footer_title">Tanyakan Kami di</div>
                        <div class="footer_phone"><span class="fa fa-phone"></span> (0351) 464195</div>
                        <div class="footer_contact_text">
                            <p>Jl. Mayjen Panjaitan No.8, Pandean, Kec. Taman,</p>
                            <p> Kota Madiun, Jawa Timur 63133</p>
                        </div>
                        {{--<div class="footer_social">--}}
                        {{--<ul>--}}
                        {{--<li><a href="#"><i class="fab fa-facebook-f"></i></a></li>--}}
                        {{--<li><a href="#"><i class="fab fa-twitter"></i></a></li>--}}
                        {{--<li><a href="#"><i class="fab fa-youtube"></i></a></li>--}}
                        {{--<li><a href="#"><i class="fab fa-google"></i></a></li>--}}
                        {{--<li><a href="#"><i class="fab fa-vimeo-v"></i></a></li>--}}
                        {{--</ul>--}}
                        {{--</div>--}}
                    </div>
                </div>


            </div>
        </div>
    </footer>

    <!-- Copyright -->

    <div class="copyright">
        <div class="container">
            <div class="row">
                <div class="col">

                    <div
                        clasusers="copyright_container d-flex flex-sm-row flex-column align-items-center justify-content-start">
                        <div class="copyright_content">
                            <!-- Link back to Colorlib can't be removed. Template is licensed under CC BY 3.0. -->
                            Copyright &copy;<script>document.write(new Date().getFullYear());</script>
                            Umkm Dinas Koperasi Pemerintah Kota Madiun <i class="fa fa-heart"
                                                                          aria-hidden="true"></i> by <a
                                href="http://pttati.co.id" target="_blank">PT. TATI</a>
                            <!-- Link back to Colorlib can't be removed. Template is licensed under CC BY 3.0. -->
                        </div>
                        <div class="logos ml-sm-auto">
                            <ul class="logos_list">
                                {{--<li><a href="#"><img src="images/logos_1.png" alt=""></a></li>--}}
                                {{--<li><a href="#"><img src="images/logos_2.png" alt=""></a></li>--}}
                                {{--<li><a href="#"><img src="images/logos_3.png" alt=""></a></li>--}}
                                {{--<li><a href="#"><img src="images/logos_4.png" alt=""></a></li>--}}
                            </ul>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

</div>

<script src="{{asset('onetech/js/jquery-3.3.1.min.js')}}"></script>
<script src="{{asset('onetech/styles/bootstrap4/popper.js')}}"></script>
<script src="{{asset('onetech/styles/bootstrap4/bootstrap.min.js')}}"></script>
<script src="{{asset('onetech/plugins/greensock/TweenMax.min.js')}}"></script>
<script src="{{asset('onetech/plugins/greensock/TimelineMax.min.js')}}"></script>
<script src="{{asset('onetech/plugins/scrollmagic/ScrollMagic.min.js')}}"></script>
<script src="{{asset('onetech/plugins/greensock/animation.gsap.min.js')}}"></script>
<script src="{{asset('onetech/plugins/greensock/ScrollToPlugin.min.js')}}"></script>
<script src="{{asset('onetech/plugins/OwlCarousel2-2.2.1/owl.carousel.js')}}"></script>
<script src="{{asset('onetech/plugins/slick-1.8.0/slick.js')}}"></script>
<script src="{{asset('onetech/plugins/easing/easing.js')}}"></script>
<script>
    $(function () {
        $('[data-toggle="tooltip"]').tooltip()
    })
</script>
@include('layouts.partial._script')
@include('layouts.partial.alert')
@stack('main_scipt')
</body>

</html>
