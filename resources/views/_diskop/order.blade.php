@extends('layouts.dashboard')
@section('title','Pemesanan Hari ini ')
@section('title_page')
    <h2>Daftar Pesanan
        <small>Pesanan masuk dari pelanggan</small>
    </h2>
@endsection
@section('content')

    {{--<div class="row clearfix">--}}
    {{--<div class="col-lg-12">--}}
    {{--<div class="card action_bar">--}}
    {{--<div class="body">--}}
    {{--<form action="{{route('umkm.comment.filter')}}" method="get">--}}
    {{--<div class="row clearfix">--}}
    {{--<div class="col-lg-10 col-md-5 col-6">--}}
    {{--<div class="row">--}}
    {{--<div class="col-md-4">--}}
    {{--<div class="form-group">--}}
    {{--<label>Kategori produk <sub>Bisa lebih dari satu</sub></label>--}}
    {{--<select class="form-control show-tick z-index" multiple data-placeholder=""--}}
    {{--data-live-search="true"--}}
    {{--name="produk[]">--}}
    {{--<option value="">Semua Produk</option>--}}
    {{--@foreach($produk as $item)--}}
    {{--<option value="{{$item->id}}">{{$item->nama}}</option>--}}
    {{--@endforeach--}}
    {{--</select>--}}
    {{--</div>--}}
    {{--</div>--}}
    {{--<div class="col-md-4">--}}
    {{--<div class="form-group">--}}
    {{--<label for="start">Mulai Tanggal</label>--}}
    {{--<div class="input-group search">--}}
    {{--<input type="date" class="form-control" placeholder="Start from"--}}
    {{--name="start"--}}
    {{--id="start">--}}
    {{--<span class="input-group-addon">--}}
    {{--<i class="zmdi zmdi-calendar"></i>--}}
    {{--</span>--}}
    {{--</div>--}}
    {{--</div>--}}
    {{--</div>--}}
    {{--<div class="col-md-4">--}}
    {{--<div class="form-group">--}}
    {{--<label for="start">Sampai Tanggal</label>--}}
    {{--<div class="input-group search">--}}
    {{--<input type="date" class="form-control" placeholder="till form"--}}
    {{--name="end"--}}
    {{--id="end">--}}
    {{--<span class="input-group-addon">--}}
    {{--<i class="zmdi zmdi-calendar"></i>--}}
    {{--</span>--}}
    {{--</div>--}}
    {{--</div>--}}
    {{--</div>--}}
    {{--</div>--}}
    {{--</div>--}}
    {{--<div class="col-lg-2">--}}
    {{--<br>--}}
    {{--<button class="btn btn-info btn-round" data-toggle="tooltip"--}}
    {{--type="submit"--}}
    {{--title="Filter Data">--}}
    {{--<i class="zmdi zmdi-filter-list"></i>--}}
    {{--</button>--}}
    {{--</div>--}}
    {{--</div>--}}
    {{--</form>--}}
    {{--</div>--}}
    {{--</div>--}}
    {{--</div>--}}
    {{--</div>--}}

    <div class="row clearfix">
        <div class="col-md-12 col-lg-12 col-xl-12">
            <ul class="mail_list list-group list-unstyled">

                @foreach($data as $item)
                    <?php
                    Carbon\Carbon::setLocale('id');
                    ?>
                    <?php
                    $detail = \App\Model\DetailUser::where('user_id', \App\User::find($item->user_id)->id)->first();
                    ?>
                    <li class="list-group-item">
                        <div class="media">
                            <div class="media-body">
                                <div class="media-heading">
                                    <a href="javascript:void(0)"
                                       class="m-r-10">{{\App\User::find($item->user_id)->username}}</a>
                                    <a href="{{route('umkm.produk.detail',[ 'id' => encrypt($item->id)])}}"
                                       target="_blank">
                                    <span
                                        class="badge bg-blue">{{\App\Model\Produk::find($item->produk_id)->nama}}</span>
                                    </a>
                                    <small class="float-right text-muted">
                                        <time class="hidden-sm-down"
                                              datetime="2017">{{\Carbon\Carbon::parse($item->created_at)->diffForHumans()}}</time>
                                        <i class="zmdi zmdi-time"></i></small>
                                </div>
                                <div class="float-right">
                                    <button class="btn btn-success btn-icon  btn-icon-mini btn-round"
                                            data-toggle="tooltip"
                                            title="Profil Pembeli"
                                            onclick="modal('{{$detail->first_name}}','{{$detail->gender}}',
                                                '{{$detail->alamat}}','{{$detail->kecamatan}}','{{$detail->kelurahan}}',
                                                '{{$detail->zip_code}}','{{$detail->no_telp}}')">
                                        <i class="zmdi zmdi-account"></i>
                                    </button>
                                    @if (Route::currentRouteName() == 'diskop.order.all')
                                    @else
                                        <form action="{{route('diskop.order.verify')}}" method="post">
                                            @csrf
                                            <input type="hidden" value="{{$item->id}}" name="cart_id">
                                            <button class="btn btn-primary btn-icon  btn-icon-mini btn-round"
                                                    type="submit"
                                                    data-toggle="tooltip"
                                                    title="Kirim data ke Umkm">
                                                <i class="zmdi zmdi-check-circle"></i>
                                            </button>
                                        </form>
                                    @endif
                                </div>
                                <p class="msg">{{$detail->alamat}} <br>
                                    Kec. {{$detail->kecamatan}} ,Kel. {{$detail->kelurahan}} <br>
                                    {{$detail->zip_code}}</p>

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
@section('modal_umkm')
    <div class="modal fade" id="largeModal" tabindex="-1" role="dialog">
        <div class="modal-dialog modal-lg" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h4 class="title" id="largeModalLabel"></h4>
                </div>
                <div class="modal-body">
                    <div class="row">
                        <div class="col-sm-4 col-sm-offset-1">
                            <div class="picture-container">
                                <div class="picture">
                                    <img src="{{asset('images/Flat Blue-900x900.jpg')}}" class="img-circle"
                                         name="avatar"
                                         id="img_pembeeli" title=""/>
                                </div>
                            </div>
                        </div>
                        <div class="col-sm-6">
                            <div class="form-group">
                                <label>Nama Pmbeli
                                </label>
                                <h6 id="nama_pembeli"></h6>
                            </div>
                            <div class="form-group">
                                <label>No telpon pembeli
                                </label>
                                <h6 id="notelp_pembeli"></h6>
                            </div>
                            <div class="form-group">
                                <label>Alamat Pembeli
                                </label>
                                <h6 id="alamat_pembeli"></h6>
                            </div>
                            <div class="form-group">
                                <label>Kode Pos
                                </label>
                                <h6 id="kodepos"></h6>
                            </div>
                        </div>
                    </div>
                </div>
                <input type="hidden" id="idproduk" name="produk_id">
                <input type="hidden" id="idcomment" name="comment_id">
                <div class="modal-footer">
                    <button type="button" class="btn btn-danger waves-effect" data-dismiss="modal">Tutup</button>
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
            $('.media-hidden').hide();
        });

        function modal(nama, gender, alamat, kec, kel, kp, telp) {
            $("#largeModalLabel").text("Profile " + nama);
            $("#nama_pembeli").text(nama + " ( " + gender + " )");
            $("#notelp_pembeli").text(telp);
            $("#alamat_pembeli").text(alamat + ", Kec. " + kec + " Kel. " + kel);
            $("#kodepos").text(kp);
            $("#largeModal").modal('show');
        }

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
