@extends('layouts.main')
@push('main_css')
    <link rel="stylesheet" href="{{asset('onetech/plugins/jquery-ui-1.12.1.custom/jquery-ui.css')}}">
    <link rel="stylesheet" type="text/css" href="{{asset('onetech/styles/shop_styles.css')}}">
    <link rel="stylesheet" type="text/css" href="{{asset('onetech/styles/shop_responsive.css')}}">
    <link rel="stylesheet" href="{{asset('js/bootstrap-select/css/bootstrap-select.min.css')}}">
@endpush
@section('main_title','Cari barang sesuai kebutuhan mu')
@section('main_content')

    <div class="home">
        <div class="home_background parallax-window" data-parallax="scroll"
             data-image-src="images/shop_background.jpg"></div>
        <div class="home_overlay"></div>
        <div class="home_content d-flex flex-column align-items-center justify-content-center">
            <h2 class="home_title">Hasil Pencarian</h2>
        </div>
    </div>

    <!-- Shop -->

    <div class="shop">
        <div class="container">
            <div class="row">
                <div class="col-lg-3">

                    <!-- Shop Sidebar -->
                    <div class="shop_sidebar">
                        <div class="form-group">
                            <label class="sidebar_title">Kategori produk</label><br>
                            <select name="jenis_id" multiple class="form-control my-select"
                                    data-live-search="true" required>
                                @foreach(\App\Model\Kategori::all() as $item)
                                    <option value="{{$item->id}}"> {{$item->name}} </option>
                                @endforeach
                            </select>
                        </div>
                        <div class="sidebar_section filter_by_section">
                            <div class="sidebar_title">Filter By</div>
                            <div class="sidebar_subtitle">Harga</div>
                            <div class="filter_price">
                                <div id="slider-range" class="slider_range"></div>
                                <p>Range: </p>

                                <p><input type="text" id="amount" class="amount" readonly
                                          style="border:0; font-weight:bold;"></p>
                            </div>
                        </div>

                    </div>

                </div>

                <div class="col-lg-9">

                    <!-- Shop Content -->

                    <div class="shop_content">
                        <div class="shop_bar clearfix">
                            <div class="shop_product_count"><span>{{$counter}}</span> Produk Ditemukan</div>
                            <div class="shop_sorting">
                                <span>Urutkan Berdasarkan:</span>
                                <ul>
                                    <li>
                                        <span class="sorting_text">highest rated
                                            <i class="fas fa-chevron-down"></i></span>
                                        <ul>
                                            <li class="shop_sorting_button"
                                                data-isotope-option='{ "sortBy": "original-order" }'>highest rated
                                            </li>
                                            <li class="shop_sorting_button" data-isotope-option='{ "sortBy": "name" }'>
                                                Nama
                                            </li>
                                            <li class="shop_sorting_button" data-isotope-option='{ "sortBy": "price" }'>
                                                Harga
                                            </li>
                                        </ul>
                                    </li>
                                </ul>
                            </div>
                        </div>

                        <div class="product_grid">
                            <div class="product_grid_border"></div>

                        @foreach($data as $item)
                            @if($item->isDiscount == true)

                                <!-- Product Item -->
                                    <div class="product_item discount">
                                        <div class="product_border"></div>
                                        <div
                                            class="product_image d-flex flex-column align-items-center justify-content-center">
                                            <img src="images/featured_1.png" alt=""></div>
                                        <div class="product_content">

                                            <div class="product_price">Rp.  {{ $item->harga - ($item->harga*($item->discount/100))}}<span><br> <strike> Rp. {{$item->harga}} </strike></span></div>
                                            <div class="product_name">
                                                <div><a href="{{route('detail.product',['id' => encrypt($item->id)])}}" tabindex="0">{{$item->nama}}</a></div>
                                            </div>
                                        </div>
                                        <div class="product_fav"><i class="fas fa-heart"></i></div>
                                        <ul class="product_marks">
                                            <li class="product_mark product_discount">-{{$item->discount}}%</li>
                                            <li class="product_mark product_new">new</li>
                                        </ul>
                                    </div>
                            @else

                                <!-- Product Item -->
                                    <div class="product_item">
                                        <div class="product_border"></div>
                                        <div
                                            class="product_image d-flex flex-column align-items-center justify-content-center">
                                            <img src="images/featured_2.png" alt=""></div>
                                        <div class="product_content">

                                            <div class="product_price" >Rp. {{$item->harga}}</div>
                                            <div class="product_name">
                                                <div><a href="{{route('detail.product',['id' => encrypt($item->id)])}}" tabindex="0">{{$item->nama}}</a></div>
                                            </div>
                                        </div>
                                        <div class="product_fav"><i class="fas fa-heart"></i></div>
                                        <ul class="product_marks">
                                            <li class="product_mark product_discount">-{{$item->discount}}%</li>
                                            <li class="product_mark product_new">new</li>
                                        </ul>
                                    </div>
                            @endif
                        @endforeach
                        </div>

                        <!-- Shop Page Navigation -->

                        <div class="shop_page_nav d-flex flex-row">

                            <ul class="page_nav d-flex flex-row">
                                {{$data->links()}}
                            </ul>

                        </div>

                    </div>

                </div>
            </div>
        </div>
    </div>

@endsection
@push('main_scipt')
    <script src="{{asset('onetech/plugins/Isotope/isotope.pkgd.min.js')}}"></script>
    <script src="{{asset('onetech/plugins/jquery-ui-1.12.1.custom/jquery-ui.js')}}"></script>
    <script src="{{asset('onetech/js/shop_custom.js')}}"></script>

    <script src="{{asset('js/bootstrap-select/js/bootstrap-select.min.js')}}"></script>
    <script>
        $('.my-select').selectpicker();
        initPriceSlider();
        function initPriceSlider()
        {
            if($("#slider-range").length)
            {
                $("#slider-range").slider(
                    {
                        range: true,
                        min: 0,
                        max: 10000000,
                        values: [ 0, 5000000 ],
                        slide: function( event, ui )
                        {
                            $( "#amount" ).val( "Rp." + ui.values[ 0 ] + " - Rp." + ui.values[ 1 ] );
                        }
                    });

                $( "#amount" ).val( "Rp. " + $( "#slider-range" ).slider( "values", 0 ) + " - Rp. " + $( "#slider-range" ).slider( "values", 1 ) );
                $('.ui-slider-handle').on('mouseup', function()
                {
                    $('.product_grid').isotope({
                        filter: function()
                        {
                            var priceRange = $('#amount').val();
                            var priceMin = parseFloat(priceRange.split('-')[0].replace('Rp.', ''));
                            var priceMax = parseFloat(priceRange.split('-')[1].replace('Rp.', ''));
                            var itemPrice = $(this).find('.product_price').clone().children().remove().end().text().replace( 'Rp.', '' );

                            return (itemPrice > priceMin) && (itemPrice < priceMax);
                        },
                        animationOptions: {
                            duration: 750,
                            easing: 'linear',
                            queue: false
                        }
                    });
                });
            }
        }
    </script>
@endpush
