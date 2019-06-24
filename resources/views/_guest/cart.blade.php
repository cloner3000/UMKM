@extends('layouts.main')
@push('main_css')
    <link rel="stylesheet" type="text/css" href="{{asset('onetech/styles/cart_styles.css')}}">
    <link rel="stylesheet" type="text/css" href="{{asset('onetech/styles/cart_responsive.css')}}">
@endpush
@section('main_title','Keranjang Belanja Anda')
@section('main_content')

    <!-- Cart -->

    <div class="cart_section">
        <div class="container">
            <div class="row">
                <div class="col-lg-10 offset-lg-1">
                    <div class="cart_container">
                        <div class="cart_title">Daftar Keranjang Belanja</div>
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
                                                    <h3 style="color: #A9A9A9">Keranjang Anda Masih Kosong </h3>
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
                                                <div class="cart_item_quantity cart_info_col">
                                                    <div class="cart_item_title">Jumlah</div>
                                                    <div class="cart_item_text">{{$item->qty}}</div>
                                                </div>
                                                <div class="cart_item_price cart_info_col">
                                                    <div class="cart_item_title">Harga</div>
                                                    <div class="cart_item_text">
                                                        Rp. {{number_format($produk->harga)}}</div>
                                                </div>
                                                <div class="cart_item_total cart_info_col">
                                                    <div class="cart_item_title">Total</div>
                                                    <div class="cart_item_text">
                                                        Rp. {{number_format($item->harga)}}</div>
                                                </div>
                                                <div class="cart_item_total cart_info_col">
                                                    <div class="cart_item_title">Aksi</div>
                                                    <div class="cart_item_text">
                                                        <button class="btn btn-danger btn-icon  btn-icon-mini btn-round"
                                                                data-toggle="tooltip"
                                                                title="Batalkan Pembelian Produk ini"
                                                                onclick="return dele({{$item->id}})">
                                                            <i class="fa fa-trash"></i>
                                                        </button>

                                                        <form id="delete-form-{{$item->id}}"
                                                              action="{{ route('add.cart.remove',['id' => $item->id])}}"
                                                              method="POST"
                                                              style="display: none;">
                                                            @csrf
                                                        </form>
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

                        <!-- Order Total -->
                        <div class="order_total">
                            <div class="order_total_content text-md-right">
                                <div class="order_total_title">Harga Total:</div>
                                <div class="order_total_amount">Rp. {{number_format($total)}}</div>
                            </div>
                        </div>

                        <div class="cart_buttons">
                            @if(count($data) < 1)
                                <a href="{{route('landing')}}">
                                    <button type="button" class="button cart_button_checkout">Mulai Belanja</button>
                                </a>
                            @else
                                <form action="{{route('add.cart.buy')}}" method="post">
                                    @csrf
                                    <input type="hidden" name="ids" id="" value="{{$id}}">
                                    <button type="submit" class="button cart_button_checkout">Pembayaran</button>
                                </form>
                            @endif

                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

@endsection
@push('main_scipt')
    <script src="{{asset('onetech/js/cart_custom.js')}}"></script>
    <script>
        function dele(id) {
            swal({
                title: 'Apakah Anda Yakin?',
                text: "Anda tidak dapat mengembalikan data ini!",
                icon: 'warning',
                showLoaderOnConfirm: true,
                closeOnClickOutside: false,
                buttons: {
                    cancel: {
                        text: "Batalkan",
                        closeModal: true,
                        visible: true
                    },
                    confirm: {
                        text: "Hapus",
                        backgroundcolor: "#fa5555"
                    }
                }
            }).then((confirm) => {
                if (confirm) {
                    document.getElementById('delete-form-' + id).submit()
                }
            });
        }
    </script>
@endpush
