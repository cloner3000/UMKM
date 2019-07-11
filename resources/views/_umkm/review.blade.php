@extends('layouts.dashboard')
@section('title','Review Pelanggan')
@section('title_page')
    <h2>Review dari Pelanggan
        <small>Daftar kumpulan review dari pembeli</small>
    </h2>
@endsection
@section('content')

    <div class="row clearfix">
        <div class="col-lg-12">
            <div class="card action_bar">
                <div class="body">
                    <form action="{{route('umkm.review.filter')}}" method="get">
                        <div class="row clearfix">
                            <div class="col-lg-10 col-md-5 col-6">
                                <div class="row">
                                    <div class="col-md-4">
                                        <div class="form-group">
                                            <label>Kategori produk <sub>Bisa lebih dari satu</sub></label>
                                            <select class="form-control show-tick z-index" multiple data-placeholder=""  data-live-search="true"
                                                    name="produk[]">
                                                <option value="">Semua Produk</option>
                                                @foreach($produk as $item)
                                                    <option value="{{$item->id}}">{{$item->nama}}</option>
                                                @endforeach
                                            </select>
                                        </div>
                                    </div>
                                    <div class="col-md-4">
                                        <div class="form-group">
                                            <label for="start">Mulai Tanggal</label>
                                            <div class="input-group search">
                                                <input type="date" class="form-control" placeholder="Start from" name="start"
                                                       id="start">
                                                <span class="input-group-addon">
                                        <i class="zmdi zmdi-calendar"></i>
                                    </span>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-md-4">
                                        <div class="form-group">
                                            <label for="start">Sampai Tanggal</label>
                                            <div class="input-group search">
                                                <input type="date" class="form-control" placeholder="till form" name="end"
                                                       id="end">
                                                <span class="input-group-addon">
                                        <i class="zmdi zmdi-calendar"></i>
                                    </span>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="col-lg-2">
                                <br>
                                <button class="btn btn-info btn-round" data-toggle="tooltip"
                                        type="submit"
                                        title="Filter Data">
                                    <i class="zmdi zmdi-filter-list"></i>
                                </button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
    <div class="row clearfix">
        <div class="col-md-12 col-lg-12 col-xl-12">
            <ul class="mail_list list-group list-unstyled">

                @foreach($data as $item)
                    <?php
                    Carbon\Carbon::setLocale('id');
                    ?>
                    <li class="list-group-item">
                        <div class="media">
                            <div class="pull-left">
                                <div class="controls">
                                    <div class="checkbox">
                                        <input type="checkbox" id="basic_checkbox_1">
                                        <label for="basic_checkbox_1"></label>
                                    </div>
                                    {{--<a href="javascript:void(0);" class="favourite text-muted hidden-sm-down" data-toggle="active"><i class="zmdi zmdi-star-outline"></i></a>--}}
                                </div>
                                {{--<div class="thumb hidden-sm-down m-r-20"> <img src="{{asset('images/shop.png')}}" style="width: 30%; height: 20%" class="rounded-circle" alt=""> </div>--}}
                            </div>
                            <div class="media-body">
                                <div class="media-heading">
                                    <a href="javascript:void(0)" class="m-r-10">{{\App\User::find($item->user_id)->username}}</a>
                                    <a href="{{route('umkm.produk.detail',[ 'id' => encrypt($item->id)])}}"
                                       target="_blank">
                                        <?php
                                        $cart = \App\Model\Cart::find($item->carts_id);
                                        $produk = \App\Model\Produk::find($cart->produk_id);
                                        ?>
                                    <span
                                        class="badge bg-blue">{{$produk->nama}}</span>
                                    </a>
                                    <small class="float-right text-muted">
                                        <time class="hidden-sm-down"
                                              datetime="2017">{{\Carbon\Carbon::parse($item->created_at)->diffForHumans()}}</time>
                                        <i class="zmdi zmdi-attachment-alt"></i></small>
                                </div>
                                <span class="m-l-10">
                                        <?php
                                    $selisih = 5 - $item->star
                                    ?>
                                    @for($i=1 ; $i <= $item->star ; $i++)
                                        <a href="javascript:void(0);"><i class="zmdi zmdi-star col-amber"></i></a>
                                    @endfor
                                    @for($i=1 ; $i <= $selisih ; $i++)
                                        <a href="javascript:void(0);"><i
                                                class="zmdi zmdi-star-outline text-muted"></i></a>
                                    @endfor
                                    </span>
                                <p class="msg">{{$item->konten}} </p>
                            </div>
                        </div>
                    </li>
                @endforeach
            </ul>
            <div class="card m-t-5">

                <div class="body">
                    <ul class="pagination pagination-primary m-b-0">
                        {{ $data->links() }}
                    </ul>
                </div>

            </div>
        </div>
    </div>
@endsection
@push('script')
    <script>
        $(document).ready(function () {
            $('#end').attr('disabled', true);

            $("#start").on('blur', function () {
                if (!this.value)
                    $('#end').attr('disabled', true).val("");
                else
                    $("#end").removeAttr('disabled')
            });
        });

        $("#start").datepicker({
            format: "yyyy-mm-dd", autoclose: true, todayHighlight: true, todayBtn: true,
        }).on('changeDate', function (selected) {
            var minDate = new Date(selected.date.valueOf());
            $('#end input').datepicker({
                format: "yyyy-mm-dd", autoclose: true, todayHighlight: true, todayBtn: true,
                startDate: minDate,
            });
        });
    </script>
@endpush
