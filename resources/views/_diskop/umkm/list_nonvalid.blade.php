@extends('layouts.dashboard')
@section('title','Daftar Umkm Non-valid')
@section('title_page')
    <h2>Umkm Non valid
        <small>Daftar Umkm non valid</small>
    </h2>
@endsection
@section('content')
    <div class="row clearfix">
        <div class="col-lg-12">
            <div class="card">
                <div class="header">
                    <h2><strong>Data</strong> Umkm </h2>
                </div>
                <div class="body">
                    <div class="table-responsive">
                        <table class="table table-bordered table-striped table-hover js-basic-example dataTable"
                               id="myTable">
                            <thead>
                            <tr>
                                <th>Logo Umkm</th>
                                <th>Nama Umkm</th>
                                <th>Pemilik Umkm</th>
                                <th>update terakhir</th>
                                <th>Status</th>
                                <th>Aksi</th>
                            </tr>
                            </thead>
                            <tbody>
                            @foreach($umkm as $data)
                                <tr>
                                    <td><img src="{{asset($data->avatar)}}" class="img-circle" height="40%"></td>
                                    <td>{{$data->nama}}</td>
                                    <td>{{$data->nama_pemilik}} </td>
                                    <?php
                                    Carbon\Carbon::setLocale('id');
                                    ?>
                                    <td>{{\Carbon\Carbon::parse($data->updated_at)->diffForHumans()}}</td>
                                    <td>
                                        @if($data->is_verified == true)
                                            <span class="badge badge-success">Tervifikasi</span>
                                        @else
                                            <span class="badge badge-warning">Belum Terivikasi</span> <br>
                                            <span class="badge badge-danger">Umkm Tidak Valid</span>
                                        @endif
                                    </td>
                                    <td>
                                        <a href="{{route('diskop.detail.umkm',['id' => encrypt($data->id)])}}"
                                           target="_blank">
                                            <button class="btn btn-primary btn-icon" data-toggle="tooltip"
                                                    title="Detail Umkm">
                                                <i class="zmdi zmdi-info-outline"></i>
                                            </button>
                                        </a>
                                        <br>
                                        <?php
                                        $note = \App\Model\VerifyUmkm::where('umkm_id',$data->id)->first();
                                        ?>
                                        <input type="hidden" name="" id="note-{{$data->id}}" value="{!! $note->note !!}">
                                        <button class="btn btn-warning btn-icon" data-toggle="tooltip"
                                                title="Validasi ulang"
                                                onclick="modal('{{$data->id}}','{{$data->nama}}','{{$note->id}}')">
                                            <i class="zmdi zmdi-check-circle-u"></i>
                                        </button>

                                    </td>
                                </tr>
                            @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection

@section('modal_umkm')
    <div class="modal fade" id="largeModal" tabindex="-1" role="dialog">
        <div class="modal-dialog modal-lg" role="document">
            <div class="modal-content">
                <form action="{{route('diskop.verify')}}" method="post" enctype="multipart/form-data">
                    @csrf
                    <div class="modal-header">
                        <h4 class="title" id="largeModalLabel"></h4>
                    </div>
                    <div class="modal-body">
                        <div class="form-group">
                            <label>Status Verifikasi</label>
                            <div class="radio">
                                <input type="radio" name="status" id="radio1" value="valid" required>
                                <label for="radio1">
                                    Data Umkm valid
                                </label>
                            </div>

                            <div class="radio">
                                <input type="radio" name="status" id="radio2" value="nonvalid" required>
                                <label for="radio2">
                                    Data Umkm tidak valid
                                </label>
                            </div>
                        </div>

                        <div class="form-group form-float" id="bukti">
                            <label for="filebukti">Upload bukti Umkm valid <small style="color: red;">Wajib, maks 2mb</small></label>
                            <input type="file" id="filebukti" class="form-control"  name="bukti">
                        </div>

                        <div class="form-group form-float" id="divlasan">
                            <label for="alasan">Alasan mengapa Umkm tidak valid</label>
                            <textarea id="alasan" class="form-control" placeholder="Deskripsi Singkat" name="note"> </textarea>
                        </div>

                    </div>
                    <input type="hidden" id="idumkm" name="umkm_id" value="">
                    <input type="hidden" id="verify_id" name="verify_id" value="">
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
           $('#radio2').change(function () {
               if ($(this).prop("checked",true)) {
                   $('#divlasan').show();
                   $('#bukti').hide();
               }
           });
           $('#radio1').change(function () {
               if ($(this).prop("checked",true)) {
                   $('#divlasan').hide();
                   $('#bukti').show();
               }
           });

           $("#bukti").hide();
       });

       tinymce.init({selector: 'textarea'});

        function modal(id, nama, verify_id) {
            $("#largeModalLabel").text(nama);
            $("#idumkm").val(id);
            $("#verify_id").val(verify_id);
            $("#alasan").val(function () {
                tinyMCE.activeEditor.setContent($("#note-"+id).val());
            });
            $("#largeModal").modal('show');
        }
    </script>
@endpush
