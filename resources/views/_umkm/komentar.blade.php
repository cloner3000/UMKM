@extends('layouts.dashboard')
@section('title','Komentar ')
@section('title_page')
    <h2>Komentar dari Pelanggan
        <small>Daftar Komentar dan pertanyaan dari pelanggan</small>
    </h2>
@endsection
@section('content')

    <div class="row clearfix">
        <div class="col-lg-12">
            <div class="card action_bar">
                <div class="body">
                    <form action="{{route('umkm.comment.filter')}}" method="get">
                        <div class="row clearfix">
                            <div class="col-lg-10 col-md-5 col-6">
                                <div class="row">
                                    <div class="col-md-4">
                                        <div class="form-group">
                                            <label>Kategori produk <sub>Bisa lebih dari satu</sub></label>
                                            <select class="form-control show-tick z-index" multiple data-placeholder=""
                                                    data-live-search="true"
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
                                                <input type="date" class="form-control" placeholder="Start from"
                                                       name="start"
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
                                                <input type="date" class="form-control" placeholder="till form"
                                                       name="end"
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
                                        <i class="zmdi zmdi-attachment-alt"></i></small>
                                </div>
                                <div class="float-right">
                                    <button class="btn btn-success btn-icon  btn-icon-mini btn-round"
                                            data-toggle="tooltip"
                                            title="Balas Pertanyaan"
                                            onclick="modal('{{$item->id}}','{{$item->message}}','{{$item->produk_id}}')">
                                        <i class="zmdi zmdi-mail-reply"></i>
                                    </button>
                                    <button class="btn btn-primary btn-icon  btn-icon-mini btn-round"
                                            data-toggle="tooltip"
                                            title="Lihat Percakapan" onclick="show_answer('{{$item->id}}')">
                                        <i class="zmdi zmdi-more"></i>
                                    </button>
                                </div>
                                <p class="msg">{{$item->message}} </p>

                            </div>
                        </div>
                        <div class="media media-hidden offset-1" id="answer_hide-{{$item->id}}">
                            <div class="media-body">
                                <?php
                                $answer = \App\Model\Comment::where('isAnswer', true)->where('comment_id', $item->id)->get();
                                ?>
                                @foreach($answer as $ans)
                                    <div class="media-heading">
                                        <a href="javascript:void(0)"
                                           class="m-r-10">{{\App\User::find($ans->user_id)->username}}</a>
                                        <a href="{{route('umkm.produk.detail',[ 'id' => encrypt($item->id)])}}"
                                           target="_blank">
                                    <span
                                        class="badge bg-blue">{{\App\Model\Produk::find($item->produk_id)->nama}}</span>
                                        </a>
                                        <small class="float-right text-muted">
                                            <time class="hidden-sm-down"
                                                  datetime="2017">{{\Carbon\Carbon::parse($ans->created_at)->diffForHumans()}}</time>
                                            <i class="zmdi zmdi-attachment-alt"></i></small>
                                    </div>
                                    <div class="float-right">
                                        {{--<button class="btn btn-primary btn-icon  btn-icon-mini btn-round"--}}
                                                {{--data-toggle="tooltip"--}}
                                                {{--title="Balas Pertanyaan"--}}
                                                {{--onclick="modal('{{$item->id}}','{{$item->message}}','{{$item->produk_id}}')">--}}
                                            {{--<i class="zmdi zmdi-mail-reply"></i>--}}
                                        {{--</button>--}}
                                    </div>
                                    <p class="msg">{{$ans->message}} </p>
                                @endforeach
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
                <form action="{{route('umkm.comment.answer')}}" method="post">
                    @csrf
                    <div class="modal-header">
                        <h4 class="title" id="largeModalLabel"></h4>
                    </div>
                    <div class="modal-body">
                        <div class="form-group form-float" id="bukti">
                            <label for="filebukti">Pertanyaan Pelanggan</label>
                            <input type="text" id="pertanyaan" class="form-control disabled" readonly>
                        </div>

                        <div class="form-group form-float" id="bukti">
                            <label for="filebukti">Jawaban Anda</label>
                            <input type="text" id="jawaban" class="form-control" name="massage">
                        </div>
                    </div>
                    <input type="hidden" id="idproduk" name="produk_id">
                    <input type="hidden" id="idcomment" name="comment_id">
                    <div class="modal-footer">
                        <button type="button" class="btn btn-danger waves-effect" data-dismiss="modal">Tutup</button>
                        <button type="submit" class="btn btn-default btn-round waves-effect">Proses</button>
                    </div>
                </form>
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

        function show_answer(id) {
            $('#answer_hide-' + id).toggle("slow");
        }

        function modal(id, pesan, produk_id) {
            $("#largeModalLabel").text("Balas Pesan Pelanggan");
            $("#idproduk").val(produk_id);
            $("#pertanyaan").val(pesan);
            $("#idcomment").val(id);
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
