<!doctype html>
<html class="no-js " lang="en">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=Edge">
    <meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">
    <meta name="description" content="Responsive Bootstrap 4 and web Application ui kit.">

    <title>@yield('title')</title>
    <link rel="icon" href="favicon.ico" type="image/x-icon">
    <!-- Favicon-->
    <link rel="stylesheet" href="{{asset('template/bootstrap/css/bootstrap.min.css')}}">
    <!-- Custom Css -->
    <link rel="stylesheet" href="{{asset('template/assets/css/main.css')}}">
    <link rel="stylesheet" href="{{asset('template/assets/css/timeline.css')}}">
    <link rel="stylesheet" href="{{asset('template/assets/css/color_skins.css')}}">
    <link rel="stylesheet" href="{{asset('template/assets/css/ecommerce.css')}}">

    <!-- Sweet Alert v2 -->
    <script src="{{ asset('js/sweetalert/sweetalert.min.js') }}"></script>

    <link rel="stylesheet"  href="{{asset('template/bootstrap-select/css/bootstrap-select.css')}}" />
    <link rel="stylesheet"  href="{{asset('template/select2/select2-bootstrap.css')}}"/>
    <link rel="stylesheet"  href="{{asset('template/select2/select2.css')}}"/>
    @stack('css')
</head>
<body class="theme-blue">
<!-- Page Loader -->
{{--<div class="page-loader-wrapper">--}}
    {{--<div class="loader">--}}
        {{--<div class="m-t-30"><img class="zmdi-hc-spin" src="{{asset('images/Double.gif')}}" width="100" height="100"--}}
                                 {{--alt="Oreo">--}}
        {{--</div>--}}
        {{--<p>Please wait...</p>--}}
    {{--</div>--}}
{{--</div>--}}

<!-- Overlay For Sidebars -->
<div class="overlay"></div>

<!-- Top Bar -->
<nav class="navbar p-l-5 p-r-5">
    <ul class="nav navbar-nav navbar-left">
        <li>
            <div class="navbar-header">
                <a href="javascript:void(0);" class="bars"></a>
                <a class="navbar-brand" href="index.html"><span class="m-l-10">E-UMKM</span></a>
            </div>
        </li>
        <li><a href="javascript:void(0);" class="ls-toggle-btn" data-close="false"><i class="zmdi zmdi-swap"></i></a>
        </li>


        <li class="hidden-sm-down">
            <div class="input-group">
                <input type="text" class="form-control" placeholder="Search...">
                <span class="input-group-addon"><i class="zmdi zmdi-search"></i></span>
            </div>
        </li>
        <li class="float-right">
            <a href="{{ route('logout') }}"
               onclick="event.preventDefault();
               document.getElementById('logout-form').submit();" class="mega-menu" data-close="true"><i
                    class="zmdi zmdi-power"></i></a>
            <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                @csrf
            </form>

        </li>
    </ul>
</nav>

<!-- Left Sidebar -->
<aside id="leftsidebar" class="sidebar">
    <ul class="nav nav-tabs">
        <li class="nav-item"><a class="nav-link" data-toggle="tab" href="#dashboard"><i
                    class="zmdi zmdi-menu m-r-10"></i>Menu Anda</a></li>
    </ul>
    <div class="tab-content">
        <div class="tab-pane stretchRight active" id="dashboard">
            <div class="menu">
                @if(Auth::check())
                    <ul class="list">
                        @if(Auth::user()->role_id == 1)
                        @elseif(Auth::user()->role_id == 2)
                            @include('layouts.sidemenu._diskopside')
                        @elseif(Auth::user()->role_id == 3)
                            @include('layouts.sidemenu._umkmside')
                        @endif
                    </ul>
                @endif
            </div>
        </div>

    </div>
</aside>



<!-- Chat-launcher -->


<section class="content">

    <div class="block-header">
        <div class="row">
            <div class="col-lg-7 col-md-6 col-sm-12">
                @yield('title_page')
            </div>
        </div>
    </div>

    <div class="container-fluid">
        @yield('content')
    </div>
</section>
@include('layouts.partial.alert')
@include('layouts.partial.confirm')
{{--@include('layouts.partial.maps')--}}
<!-- Jquery Core Js -->
<script>
    $(document).ready(function(){
        $('[data-toggle="tooltip"]').tooltip();
    });
</script>



<script src="{{asset('template/assets/bundles/libscripts.bundle.js')}}"></script> <!-- Lib Scripts Plugin Js -->

<script src="{{asset('template/jquery/jquery-v3.3.1.min.js')}}"></script>
<script src="{{asset('template/assets/bundles/vendorscripts.bundle.js')}}"></script> <!-- Lib Scripts Plugin Js -->

<script  src="{{asset('template/bootstrap-select/js/bootstrap-select.js')}}"></script>
<script src="{{asset('template/assets/bundles/knob.bundle.js')}}"></script> <!-- Jquery Knob Plugin Js -->

<script src="{{asset('template/assets/bundles/mainscripts.bundle.js')}}"></script><!-- Custom Js -->
<script src="{{asset('template/assets/js/pages/charts/jquery-knob.js')}}"></script>
<script src="{{asset('template/select2/select2.min.js')}}"></script>
<script src="{{asset('template/tinymce/tinymce.js')}}"></script>

@stack('script')
</body>
</html>
