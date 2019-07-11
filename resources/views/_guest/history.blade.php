@extends('layouts.main')
@push('main_css')
    <link rel="stylesheet" type="text/css" href="{{asset('onetech/styles/cart_styles.css')}}">
    <link rel="stylesheet" type="text/css" href="{{asset('onetech/styles/cart_responsive.css')}}">
@endpush
@section('main_title','Riwayat Belanja Anda')
@section('main_content')

    <!-- Cart -->

    <div class="cart_section">
        <div class="container">
            <div class="row">
                <div class="col-lg-10 offset-lg-1">
                    <div class="cart_container">
                        <div class="cart_title">Daftar keranjang belanja yang Pernah anda beli</div>
                        <div class="cart_items">
                            <ul class="cart_list">
                                <?php
                                $total = 0;
                                ?>
                                @if(count($data) < 1)
                                    <li class="cart_item clearfix">
                                        <div class="row center-block">
                                            <div class="col-lg-12">
                                                <center>
                                                    <img src="{{asset('images/empty_cart.svg')}}" alt=""
                                                         style="height: 40%;width: 30%;">
                                                    <h3 style="color: #A9A9A9">Anda Belum Memiliki Riwayat
                                                        Berbelanja </h3>
                                                </center>
                                            </div>
                                        </div>
                                    </li>
                                @else
                                    @foreach($data as $item)
                                        <li class="cart_item clearfix">
                                            <?php
                                            $produk = \App\Model\Produk::find($item->produk_id);
                                            ?>
                                            <div class="cart_item_image">
                                                <img src="{{asset('upload/product/'.$produk->pic1[0])}}" alt="">
                                            </div>
                                            <div
                                                class="cart_item_info d-flex flex-md-row flex-column justify-content-between">
                                                <div class="cart_item_name cart_info_col">
                                                    <div class="cart_item_title">Nama Produk</div>
                                                    <div class="cart_item_text">{{$produk->nama}}</div>
                                                </div>
                                                {{--<div class="cart_item_color cart_info_col">--}}
                                                {{--<div class="cart_item_title">Color</div>--}}
                                                {{--<div class="cart_item_text"><span--}}
                                                {{--style="background-color:#999999;"></span>Silver--}}
                                                {{--</div>--}}
                                                {{--</div>--}}
                                                <div class="cart_item_price cart_info_col">
                                                    <div class="cart_item_title">Harga</div>
                                                    <div class="cart_item_text">
                                                        Rp. {{number_format($produk->harga)}}</div>
                                                </div>
                                                <div class="cart_item_quantity cart_info_col">
                                                    <div class="cart_item_title">Tanggal Pembelian</div>
                                                    <div
                                                        class="cart_item_text">{{\Carbon\Carbon::parse($item->created_at)->format('d-M-Y')}}</div>
                                                </div>
                                                <div class="cart_item_total cart_info_col">
                                                    <div class="cart_item_title">Total</div>
                                                    <div class="cart_item_text">
                                                        Rp. {{number_format($item->harga)}}</div>
                                                </div>
                                                <div class="cart_item_total cart_info_col">
                                                    <div class="cart_item_title">Aksi</div>
                                                    <?php
                                                    $check = \App\Model\Review::where('user_id', \Illuminate\Support\Facades\Auth::user()->id)
                                                        ->where('carts_id', $item->id)->first();
                                                    ?>
                                                    <div class="cart_item_text">
                                                        @if(empty($check))
                                                            <button
                                                                class="btn btn-primary btn-icon  btn-icon-mini btn-round"
                                                                data-toggle="tooltip"
                                                                title="Berikan Review Pada produk ini"
                                                                onclick="return show_modal({{$item->id}})">
                                                                <i class="fa fa-comment"></i>
                                                            </button>
                                                            @else
                                                            <button
                                                                class="btn btn-success btn-icon  btn-icon-mini btn-round"
                                                                data-toggle="tooltip"
                                                                title="Anda telah memberikan review pada pembelian ini">
                                                                <i class="fa fa-check-circle"></i>
                                                            </button>
                                                        @endif
                                                    </div>
                                                </div>
                                            </div>

                                        </li>
                                        <?php
                                        $total = $total + $item->harga;
                                        ?>
                                    @endforeach
                                @endif
                            </ul>
                        </div>

                        <div class="cart_buttons">
                            @if(count($data) < 1)
                                <a href="{{route('landing')}}">
                                    <button type="button" class="button cart_button_checkout">Mulai Belanja</button>
                                </a>
                            @else
                            @endif
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <div class="modal fade" id="modalReview" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle"
         aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered" role="document">
            <div class="modal-content">
                <form action="{{route('history.review')}}" method="post" enctype="multipart/form-data">
                    @csrf
                    <div class="modal-header">
                        <h5 class="modal-title" id="exampleModalLongTitle">Berikan Review Pada Produk ini</h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <div class="modal-body">
                        <div class="form-group">
                            <label for="exampleInputEmail1">Rating <small style="color: red;">Wajib</small></label>
                            <div class="rate">
                                <i class="btn p-0 m-0 fa fa-star star s1" getvalue='1' aria-hidden="true"></i>
                                <i class="btn p-0 m-0 fa fa-star star s2" getvalue='2' aria-hidden="true"></i>
                                <i class="btn p-0 m-0 fa fa-star star s3" getvalue='3' aria-hidden="true"></i>
                                <i class="btn p-0 m-0 fa fa-star star s4" getvalue='4' aria-hidden="true"></i>
                                <i class="btn p-0 m-0 fa fa-star star s5" getvalue='5' aria-hidden="true"></i>
                            </div>

                            <small id="erating"></small>
                        </div>
                        <div class="form-group">
                            <label for="exampleInputEmail1">Komentar<small style="color: red;">Wajib</small></label>
                            <input type="text" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp"
                                   placeholder="Review anda" name="konten" required>
                            <input type="hidden" id="id_cart" aria-describedby="emailHelp" placeholder="Enter email"
                                   name="carts_id">
                            <input type="hidden" id="rating" aria-describedby="emailHelp" placeholder="Enter email"
                                   name="star">
                            <small id="emailHelp" class="form-text text-muted">Pastikan Sesuai dengan produk yang anda terima
                            </small>
                        </div>

                        <div class="form-group">
                            <label for="exampleInputEmail1">File Foto
                                <smal>bila ada</smal>
                            </label>
                            <input type="file" class="form-control" name="attachment" lang="id"
                                   accept='.jpg, .jpeg, .png'>
                        </div>

                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-dismiss="modal">tutup</button>
                        <button type="submit" class="btn btn-primary">Simpan</button>
                    </div>
                </form>
            </div>
        </div>
    </div>

@endsection
@push('main_scipt')
    <script src="{{asset('onetech/js/cart_custom.js')}}"></script>
    <script>
        $(document).ready(function () {
            // Đánh giá qua click chuột
            // 1 Star
            $('.s1').click(function () {
                $('.s1').removeClass('fa-star').addClass('fa-star text-warning');
                $('.s2').removeClass('fa-star text-warning').addClass('fa-star');
                $('.s3').removeClass('fa-star text-warning').addClass('fa-star');
                $('.s4').removeClass('fa-star text-warning').addClass('fa-star');
                $('.s5').removeClass('fa-star text-warning').addClass('fa-star');
                $('#erating').html("<span class='badge badge-danger'>Sangat Buruk</span>");
            })
            // 2 Star
            $('.s2').click(function () {
                $('.s1').removeClass('fa-star').addClass('fa-star text-warning');
                $('.s2').removeClass('fa-star').addClass('fa-star text-warning');
                $('.s3').removeClass('fa-star text-warning').addClass('fa-star');
                $('.s4').removeClass('fa-star text-warning').addClass('fa-star');
                $('.s5').removeClass('fa-star text-warning').addClass('fa-star');
                $('#erating').html("<span class='badge badge-warning'>Buruk</span>");
            })
            // 3 Star
            $('.s3').click(function () {
                $('.s1').removeClass('fa-star').addClass('fa-star text-warning');
                $('.s2').removeClass('fa-star').addClass('fa-star text-warning');
                $('.s3').removeClass('fa-star').addClass('fa-star text-warning');
                $('.s4').removeClass('fa-star text-warning').addClass('fa-star');
                $('.s5').removeClass('fa-star text-warning').addClass('fa-star');
                $('#erating').html("<span class='badge badge-success'>Normal</span>");
            })
            // 4 Star
            $('.s4').click(function () {
                $('.s1').removeClass('fa-star').addClass('fa-star text-warning');
                $('.s2').removeClass('fa-star').addClass('fa-star text-warning');
                $('.s3').removeClass('fa-star').addClass('fa-star text-warning');
                $('.s4').removeClass('fa-star').addClass('fa-star text-warning');
                $('.s5').removeClass('fa-star text-warning').addClass('fa-star');
                $('#erating').html("<span class='badge badge-success'>Bagus</span>");
            })
            // 5 Star
            $('.s5').click(function () {
                $('.s1').removeClass('fa-star').addClass('fa-star text-warning');
                $('.s2').removeClass('fa-star').addClass('fa-star text-warning');
                $('.s3').removeClass('fa-star').addClass('fa-star text-warning');
                $('.s4').removeClass('fa-star').addClass('fa-star text-warning');
                $('.s5').removeClass('fa-star').addClass('fa-star text-warning');
                $('#erating').html("<span class='badge badge-success'>Sangat Bagus</span>");
            })
            $('.star').click(function () {
                var val = $(this).attr('getvalue').toString();
                $('#rating').val(val)
            })

            // ==============================================
            //// Chọn sao bằng mouseenter
            // $('.star').mouseenter(function(){
            //   var val = $(this).attr('getvalue').toString();
            //   console.log(val);
            // })
            //// 1 Star
            // $('.s1').mouseenter(function(){
            //   $('.s1').removeClass('fa-star').addClass('fa-star text-warning');
            //   $('.s2').removeClass('fa-star text-warning').addClass('fa-star');
            //   $('.s3').removeClass('fa-star text-warning').addClass('fa-star');
            //   $('.s4').removeClass('fa-star text-warning').addClass('fa-star');
            //   $('.s5').removeClass('fa-star text-warning').addClass('fa-star');
            //   $('#erating').html("<span class='badge badge-danger'>Rất tệ</span>");
            // })
            //// 2 Star
            // $('.s2').mouseenter(function(){
            //   $('.s1').removeClass('fa-star').addClass('fa-star text-warning');
            //   $('.s2').removeClass('fa-star').addClass('fa-star text-warning');
            //   $('.s3').removeClass('fa-star text-warning').addClass('fa-star');
            //   $('.s4').removeClass('fa-star text-warning').addClass('fa-star');
            //   $('.s5').removeClass('fa-star text-warning').addClass('fa-star');
            //   $('#erating').html("<span class='badge badge-warning'>Tệ</span>");
            // })
            //// 3 Star
            // $('.s3').mouseenter(function(){
            //   $('.s1').removeClass('fa-star').addClass('fa-star text-warning');
            //   $('.s2').removeClass('fa-star').addClass('fa-star text-warning');
            //   $('.s3').removeClass('fa-star').addClass('fa-star text-warning');
            //   $('.s4').removeClass('fa-star text-warning').addClass('fa-star');
            //   $('.s5').removeClass('fa-star text-warning').addClass('fa-star');
            //   $('#erating').html("<span class='badge badge-success'>Được</span>");
            // })
            //// 4 Star
            // $('.s4').mouseenter(function(){
            //   $('.s1').removeClass('fa-star').addClass('fa-star text-warning');
            //   $('.s2').removeClass('fa-star').addClass('fa-star text-warning');
            //   $('.s3').removeClass('fa-star').addClass('fa-star text-warning');
            //   $('.s4').removeClass('fa-star').addClass('fa-star text-warning');
            //   $('.s5').removeClass('fa-star text-warning').addClass('fa-star');
            //   $('#erating').html("<span class='badge badge-success'>Tốt</span>");
            // })
            //// 5 Star
            // $('.s5').mouseenter(function(){
            //   $('.s1').removeClass('fa-star').addClass('fa-star text-warning');
            //   $('.s2').removeClass('fa-star').addClass('fa-star text-warning');
            //   $('.s3').removeClass('fa-star').addClass('fa-star text-warning');
            //   $('.s4').removeClass('fa-star').addClass('fa-star text-warning');
            //   $('.s5').removeClass('fa-star').addClass('fa-star text-warning');
            //   $('#erating').html("<span class='badge badge-success'>Rất tốt</span>");
            // })
        })

        function show_modal(id) {
            $('#id_cart').val(id);
            $('#modalReview').modal('show');
        }
    </script>
@endpush
