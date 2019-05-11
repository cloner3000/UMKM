<!DOCTYPE html>
<html lang="en">
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
            0%, 100% {-webkit-transform: translateX(0);}
            10%, 30%, 50%, 70%, 90% {-webkit-transform: translateX(-10px);}
            20%, 40%, 60%, 80% {-webkit-transform: translateX(10px);}
        }

        @-moz-keyframes shake {
            0%, 100% {-moz-transform: translateX(0);}
            10%, 30%, 50%, 70%, 90% {-moz-transform: translateX(-10px);}
            20%, 40%, 60%, 80% {-moz-transform: translateX(10px);}
        }

        @-o-keyframes shake {
            0%, 100% {-o-transform: translateX(0);}
            10%, 30%, 50%, 70%, 90% {-o-transform: translateX(-10px);}
            20%, 40%, 60%, 80% {-o-transform: translateX(10px);}
        }

        @keyframes shake {
            0%, 100% {transform: translateX(0);}
            10%, 30%, 50%, 70%, 90% {transform: translateX(-10px);}
            20%, 40%, 60%, 80% {transform: translateX(10px);}
        }

        .shake {
            -webkit-animation-name: shake;
            -moz-animation-name: shake;
            -o-animation-name: shake;
            animation-name: shake;
        }

        .login .modal-dialog{
            width: 350px;
        }
        .login .modal-footer{
            border-top: 0;
            margin-top: 0px;
            padding: 10px 20px 20px;
        }
        .login .modal-header {
            border: 0 none;
            padding: 15px 15px 15px;
            /*     padding: 11px 15px; */
        }
        .login .modal-body{
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

        .login .social .circle{
            background-color: #EEEEEE;
            color: #FFFFFF;
            border-radius: 100px;
            display: inline-block;
            margin: 0 17px;
            padding: 15px;
        }
        .login .social .circle .fa{
            font-size: 16px;
        }
        .login .social .facebook{
            background-color: #455CA8;
            color: #FFFFFF;
        }
        .login .social .google{
            background-color: #F74933;
        }
        .login .social .github{
            background-color: #403A3A;
        }
        .login .facebook:hover{
            background-color: #6E83CD;
        }
        .login .google:hover{
            background-color: #FF7566;
        }
        .login .github:hover{
            background-color: #4D4D4d;;
        }
        .login .forgot {
            color: #797979;
            margin-left: 0;
            overflow: hidden;
            text-align: center;
            width: 100%;
        }
        .login .btn-login, .registerBox .btn-register{
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
        .login .btn-login:hover, .registerBox .btn-register:hover{
            background-color: #00A4E4;
            color: #FFFFFF;
        }
        .login .form-control{
            border-radius: 3px;
            background-color: rgba(0, 0, 0, 0.09);
            box-shadow: 0 1px 0px 0px rgba(0, 0, 0, 0.09) inset;
            color: #FFFFFF;
        }
        .login .form-control:hover{
            background-color: rgba(0,0,0,.16);
        }
        .login .form-control:focus{
            box-shadow: 0 1px 0 0 rgba(0, 0, 0, 0.04) inset;
            background-color: rgba(0,0,0,0.23);
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


        @media (max-width:400px){
            .login .modal-dialog{
                width: 100%;
            }
        }

        .big-login, .big-register{
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
        .big-login:hover{
            background-color: #00A4E4;
            color: #FFFFFF;
        }
        .big-register{
            background-color: rgba(0,0,0,.0);
            color: #00bbff;
            border-color: #00bbff;
        }
        .big-register:hover{
            border-color: #00A4E4;
            color:  #00A4E4;
        }
    </style>
</head>

<body>

<div class="super_container">

    <!-- Header -->

    <header class="header">

        <!-- Header Main -->

        <div class="header_main">
            <div class="container">
                <div class="row">

                    <!-- Logo -->
                    <div class="col-lg-2 col-sm-3 col-3 order-1">
                        <div class="logo_container">
                            <div class="logo"><a href="#">E - UMKM</a></div>
                        </div>
                    </div>

                    <!-- Search -->
                    <div class="col-lg-7 col-12 order-lg-2 order-3 text-lg-left text-right">
                        <div class="header_search">
                            <div class="header_search_content">
                                <div class="header_search_form_container">
                                    <form action="#" class="header_search_form clearfix">
                                        <input type="search" required="required" class="header_search_input"
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
                                        <button type="submit" class="header_search_button trans_300" value="Submit">
                                            <span class="fa fa-search" style="color: #ffffff;"></span></button>
                                    </form>
                                </div>
                            </div>
                        </div>
                    </div>

                    <!-- Wishlist -->
                    <div class="col-lg-3 col-8 order-lg-2 order-2 text-lg-left text-right">
                        <div class="wishlist_cart d-flex flex-row align-items-center justify-content-end">
                            @guest
                                <div class="wishlist d-flex flex-row align-items-center justify-content-end">
                                    <div class="wishlist_content">
                                        <div class="row">
                                            <div class="col-md-5">
                                                <button data-toggle="modal" onclick="openLoginModal();" type="button"
                                                        class="btn btn-outline-primary border-0 ">Masuk
                                                </button>
                                            </div>
                                            <div class="col-md-5">
                                                <button data-toggle="modal" onclick="openRegisterModal();" type="button"
                                                        class="btn btn-outline-primary">Daftar
                                                </button>
                                            </div>
                                        </div>

                                    </div>
                                </div>

                            @else
                                <div class="wishlist d-flex flex-row align-items-center justify-content-end">
                                    <div class="wishlist_icon"><img src="images/heart.png" alt=""></div>
                                    <div class="wishlist_content">
                                        <div class="wishlist_text"><a href="#">Wishlist</a></div>
                                        <div class="wishlist_count">115</div>
                                    </div>
                                </div>

                                <!-- Cart -->
                                <div class="cart">
                                    <div class="cart_container d-flex flex-row align-items-center justify-content-end">
                                        <div class="cart_icon">
                                            <img src="images/cart.png" alt="">
                                            <div class="cart_count"><span>10</span></div>
                                        </div>
                                        <div class="cart_content">
                                            <div class="cart_text"><a href="#">Cart</a></div>
                                            <div class="cart_price">$85</div>
                                        </div>
                                    </div>
                                </div>
                            @endguest
                        </div>
                    </div>
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
                                    <div class="cat_menu_text">categories</div>
                                </div>

                                <ul class="cat_menu">
                                    <li><a href="#">Computers & Laptops <i class="fas fa-chevron-right ml-auto"></i></a></li>
                                    <li><a href="#">Cameras & Photos<i class="fas fa-chevron-right"></i></a></li>
                                    <li class="hassubs">
                                        <a href="#">Hardware<i class="fas fa-chevron-right"></i></a>
                                        <ul>
                                            <li class="hassubs">
                                                <a href="#">Menu Item<i class="fas fa-chevron-right"></i></a>
                                                <ul>
                                                    <li><a href="#">Menu Item<i class="fas fa-chevron-right"></i></a></li>
                                                    <li><a href="#">Menu Item<i class="fas fa-chevron-right"></i></a></li>
                                                    <li><a href="#">Menu Item<i class="fas fa-chevron-right"></i></a></li>
                                                    <li><a href="#">Menu Item<i class="fas fa-chevron-right"></i></a></li>
                                                </ul>
                                            </li>
                                            <li><a href="#">Menu Item<i class="fas fa-chevron-right"></i></a></li>
                                            <li><a href="#">Menu Item<i class="fas fa-chevron-right"></i></a></li>
                                            <li><a href="#">Menu Item<i class="fas fa-chevron-right"></i></a></li>
                                        </ul>
                                    </li>
                                    <li><a href="#">Smartphones & Tablets<i class="fas fa-chevron-right"></i></a></li>
                                    <li><a href="#">TV & Audio<i class="fas fa-chevron-right"></i></a></li>
                                    <li><a href="#">Gadgets<i class="fas fa-chevron-right"></i></a></li>
                                    <li><a href="#">Car Electronics<i class="fas fa-chevron-right"></i></a></li>
                                    <li><a href="#">Video Games & Consoles<i class="fas fa-chevron-right"></i></a></li>
                                    <li><a href="#">Accessories<i class="fas fa-chevron-right"></i></a></li>
                                </ul>
                            </div>

                            <!-- Main Nav Menu -->

                            <div class="main_nav_menu ml-auto">
                                <ul class="standard_dropdown main_nav_dropdown">
                                    <li><a href="index.html">Home<i class="fas fa-chevron-down"></i></a></li>
                                    <li class="hassubs">
                                        <a href="#">Super Deals<i class="fas fa-chevron-down"></i></a>
                                        <ul>
                                            <li>
                                                <a href="#">Menu Item<i class="fas fa-chevron-down"></i></a>
                                                <ul>
                                                    <li><a href="#">Menu Item<i class="fas fa-chevron-down"></i></a></li>
                                                    <li><a href="#">Menu Item<i class="fas fa-chevron-down"></i></a></li>
                                                    <li><a href="#">Menu Item<i class="fas fa-chevron-down"></i></a></li>
                                                </ul>
                                            </li>
                                            <li><a href="#">Menu Item<i class="fas fa-chevron-down"></i></a></li>
                                            <li><a href="#">Menu Item<i class="fas fa-chevron-down"></i></a></li>
                                            <li><a href="#">Menu Item<i class="fas fa-chevron-down"></i></a></li>
                                        </ul>
                                    </li>
                                    <li class="hassubs">
                                        <a href="#">Featured Brands<i class="fas fa-chevron-down"></i></a>
                                        <ul>
                                            <li>
                                                <a href="#">Menu Item<i class="fas fa-chevron-down"></i></a>
                                                <ul>
                                                    <li><a href="#">Menu Item<i class="fas fa-chevron-down"></i></a></li>
                                                    <li><a href="#">Menu Item<i class="fas fa-chevron-down"></i></a></li>
                                                    <li><a href="#">Menu Item<i class="fas fa-chevron-down"></i></a></li>
                                                </ul>
                                            </li>
                                            <li><a href="#">Menu Item<i class="fas fa-chevron-down"></i></a></li>
                                            <li><a href="#">Menu Item<i class="fas fa-chevron-down"></i></a></li>
                                            <li><a href="#">Menu Item<i class="fas fa-chevron-down"></i></a></li>
                                        </ul>
                                    </li>
                                    <li class="hassubs">
                                        <a href="#">Pages<i class="fas fa-chevron-down"></i></a>
                                        <ul>
                                            <li><a href="shop.html">Shop<i class="fas fa-chevron-down"></i></a></li>
                                            <li><a href="product.html">Product<i class="fas fa-chevron-down"></i></a></li>
                                            <li><a href="blog.html">Blog<i class="fas fa-chevron-down"></i></a></li>
                                            <li><a href="blog_single.html">Blog Post<i class="fas fa-chevron-down"></i></a></li>
                                            <li><a href="regular.html">Regular Post<i class="fas fa-chevron-down"></i></a></li>
                                            <li><a href="cart.html">Cart<i class="fas fa-chevron-down"></i></a></li>
                                            <li><a href="contact.html">Contact<i class="fas fa-chevron-down"></i></a></li>
                                        </ul>
                                    </li>
                                    <li><a href="blog.html">Blog<i class="fas fa-chevron-down"></i></a></li>
                                    <li><a href="contact.html">Contact<i class="fas fa-chevron-down"></i></a></li>
                                </ul>
                            </div>

                            <!-- Menu Trigger -->

                            <div class="menu_trigger_container ml-auto">
                                <div class="menu_trigger d-flex flex-row align-items-center justify-content-end">
                                    <div class="menu_burger">
                                        <div class="menu_trigger_text">menu</div>
                                        <div class="cat_burger menu_burger_inner"><span></span><span></span><span></span></div>
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
                                    <input type="search" required="required" class="page_menu_search_input" placeholder="Search for products...">
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
                                    <a href="index.html">Home<i class="fa fa-angle-down"></i></a>
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
                                <li class="page_menu_item"><a href="blog.html">blog<i class="fa fa-angle-down"></i></a></li>
                                <li class="page_menu_item"><a href="contact.html">contact<i class="fa fa-angle-down"></i></a></li>
                            </ul>

                            <div class="menu_contact">
                                <div class="menu_contact_item"><div class="menu_contact_icon"><img src="images/phone_white.png" alt=""></div>+38 068 005 3570</div>
                                <div class="menu_contact_item"><div class="menu_contact_icon"><img src="images/mail_white.png" alt=""></div><a href="mailto:fastsales@gmail.com">fastsales@gmail.com</a></div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

    </header>

    <!-- Banner -->

        <div class="banner">
            <div class="banner_background" style="background-image:url({{asset('onetech/images/banner_background.jpg')}})"></div>
            <div class="container fill_height">
                <div class="row fill_height">
                    <div class="banner_product_image"><img src="{{asset('onetech/images/banner_product.png')}}" alt=""></div>
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
                                <div class="logo"><a href="#">OneTech</a></div>
                            </div>
                            <div class="footer_title">Got Question? Call Us 24/7</div>
                            <div class="footer_phone">+38 068 005 3570</div>
                            <div class="footer_contact_text">
                                <p>17 Princess Road, London</p>
                                <p>Grester London NW18JR, UK</p>
                            </div>
                            <div class="footer_social">
                                <ul>
                                    <li><a href="#"><i class="fab fa-facebook-f"></i></a></li>
                                    <li><a href="#"><i class="fab fa-twitter"></i></a></li>
                                    <li><a href="#"><i class="fab fa-youtube"></i></a></li>
                                    <li><a href="#"><i class="fab fa-google"></i></a></li>
                                    <li><a href="#"><i class="fab fa-vimeo-v"></i></a></li>
                                </ul>
                            </div>
                        </div>
                    </div>

                    <div class="col-lg-2 offset-lg-2">
                        <div class="footer_column">
                            <div class="footer_title">Find it Fast</div>
                            <ul class="footer_list">
                                <li><a href="#">Computers & Laptops</a></li>
                                <li><a href="#">Cameras & Photos</a></li>
                                <li><a href="#">Hardware</a></li>
                                <li><a href="#">Smartphones & Tablets</a></li>
                                <li><a href="#">TV & Audio</a></li>
                            </ul>
                            <div class="footer_subtitle">Gadgets</div>
                            <ul class="footer_list">
                                <li><a href="#">Car Electronics</a></li>
                            </ul>
                        </div>
                    </div>

                    <div class="col-lg-2">
                        <div class="footer_column">
                            <ul class="footer_list footer_list_2">
                                <li><a href="#">Video Games & Consoles</a></li>
                                <li><a href="#">Accessories</a></li>
                                <li><a href="#">Cameras & Photos</a></li>
                                <li><a href="#">Hardware</a></li>
                                <li><a href="#">Computers & Laptops</a></li>
                            </ul>
                        </div>
                    </div>

                    <div class="col-lg-2">
                        <div class="footer_column">
                            <div class="footer_title">Customer Care</div>
                            <ul class="footer_list">
                                <li><a href="#">My Account</a></li>
                                <li><a href="#">Order Tracking</a></li>
                                <li><a href="#">Wish List</a></li>
                                <li><a href="#">Customer Services</a></li>
                                <li><a href="#">Returns / Exchange</a></li>
                                <li><a href="#">FAQs</a></li>
                                <li><a href="#">Product Support</a></li>
                            </ul>
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
                            class="copyright_container d-flex flex-sm-row flex-column align-items-center justify-content-start">
                            <div class="copyright_content">
                                <!-- Link back to Colorlib can't be removed. Template is licensed under CC BY 3.0. -->
                                Copyright &copy;<script>document.write(new Date().getFullYear());</script>
                                All rights reserved | This template is made with <i class="fa fa-heart"
                                                                                    aria-hidden="true"></i> by <a
                                    href="https://colorlib.com" target="_blank">Colorlib</a>
                                <!-- Link back to Colorlib can't be removed. Template is licensed under CC BY 3.0. -->
                            </div>
                            <div class="logos ml-sm-auto">
                                <ul class="logos_list">
                                    <li><a href="#"><img src="images/logos_1.png" alt=""></a></li>
                                    <li><a href="#"><img src="images/logos_2.png" alt=""></a></li>
                                    <li><a href="#"><img src="images/logos_3.png" alt=""></a></li>
                                    <li><a href="#"><img src="images/logos_4.png" alt=""></a></li>
                                </ul>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

</div>

<script src="{{asset('onetech/js/jquery-3.3.1.min.js')}}"></script>

@include('layouts.partial._script')
@push('main_scipt')
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
    <script src="{{asset('onetech/js/custom.js')}}"></script>
</body>

</html>
