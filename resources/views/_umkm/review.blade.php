@extends('layouts.dashboard')
@section('title','Review Pelanggan')
@section('title_page')
    <h2>Review dari Pelanggan
        <small>daftar kumpulan review dari pembeli</small>
    </h2>
@endsection
@section('content')

    <div class="row clearfix">
        <div class="col-lg-12">
            <div class="card action_bar">
                <div class="body">
                    <div class="row clearfix">
                        <div class="col-lg-6 col-md-5 col-6">
                            <div class="row">
                                <div class="col-md-6">
                                    <div class="input-group search">
                                        <input type="date" class="form-control" placeholder="Start from" id="start">
                                        <span class="input-group-addon">
                                        <i class="zmdi zmdi-search"></i>
                                    </span>
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="input-group search">
                                        <input type="date" class="form-control" placeholder="till form" id="end">
                                        <span class="input-group-addon">
                                        <i class="zmdi zmdi-search"></i>
                                    </span>
                                    </div>
                                </div>
                            </div>

                        </div>
                        <div class="col-lg-6 col-md-6 col-3 text-right">
                            <div class="btn-group hidden-sm-down">
                                <button type="button" class="btn btn-neutral dropdown-toggle" data-toggle="dropdown"
                                        aria-haspopup="true" aria-expanded="false">More<span class="caret"></span>
                                </button>
                                <ul class="dropdown-menu">
                                    <li><a href="javascript:void(0);">Unread</a></li>
                                    <li><a href="javascript:void(0);">Unimportant</a></li>
                                    <li><a href="javascript:void(0);">Add star</a></li>
                                    <li role="separator" class="divider"></li>
                                    <li><a href="javascript:void(0);">Mute</a></li>
                                </ul>
                            </div>
                            <div class="btn-group hidden-md-down hidden-sm-down">
                                <div class="btn-group">
                                    <button type="button" class="btn btn-neutral dropdown-toggle" data-toggle="dropdown"
                                            aria-haspopup="true" aria-expanded="false">
                                        <i class="zmdi zmdi-filter"></i>
                                        <span class="caret"></span>
                                    </button>
                                    <ul class="dropdown-menu">
                                        <li>
                                            <a href="javascript:void(0);">Family</a>
                                        </li>
                                        <li>
                                            <a href="javascript:void(0);">Work</a>
                                        </li>
                                        <li>
                                            <a href="javascript:void(0);">Google</a>
                                        </li>
                                        <li role="separator" class="divider"></li>
                                        <li>
                                            <a href="javascript:void(0);">Create a Label</a>
                                        </li>
                                    </ul>
                                </div>
                            </div>
                            <div class="btn-group hidden-md-down hidden-sm-down">
                                <button type="button" class="btn btn-neutral dropdown-toggle" data-toggle="dropdown"
                                        aria-haspopup="true" aria-expanded="false"><i class="zmdi zmdi-folder"></i>
                                    <span class="caret"></span></button>
                                <ul class="dropdown-menu">
                                    <li><a href="javascript:void(0);">Important</a></li>
                                    <li><a href="javascript:void(0);">Social</a></li>
                                    <li><a href="javascript:void(0);">Bank Statements</a></li>
                                    <li role="separator" class="divider"></li>
                                    <li><a href="javascript:void(0);">Create a folder</a></li>
                                </ul>
                            </div>
                            <button type="button" class="btn btn-neutral hidden-sm-down">
                                <i class="zmdi zmdi-plus-circle"></i>
                            </button>
                            <button type="button" class="btn btn-neutral hidden-sm-down">
                                <i class="zmdi zmdi-archive"></i>
                            </button>
                            <button type="button" class="btn btn-neutral btn-danger">
                                <i class="zmdi zmdi-delete"></i>
                            </button>
                        </div>
                    </div>
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
                                    <a href="javascript:void(0)" class="m-r-10">Velit a labore</a>
                                    <a href="{{route('umkm.produk.detail',[ 'id' => encrypt($item->id)])}}"
                                       target="_blank">
                                    <span
                                        class="badge bg-blue">{{\App\Model\Produk::find($item->produk_id)->nama}}</span>
                                    </a>
                                    <small class="float-right text-muted">
                                        <time class="hidden-sm-down"
                                              datetime="2017">{{\Carbon\Carbon::parse($item->created_at)->diffForHumans()}}</time>
                                        <i class="zmdi zmdi-attachment-alt"></i></small>
                                </div>
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
                    $('#end').attr('disabled', true);
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
