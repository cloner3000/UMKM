@extends('layouts.dashboard')
@section('title','Data Kategori')
@section('title_page')
    <h2>Kategori
        <small>Data Kategori Jenis Barang</small>
    </h2>
@endsection
@section('content')
    <div class="row clearfix">
        <div class="col-xl-5 col-lg-5 col-md-12">
            <div role="tabpanel" class="tab-pane">
                <div class="card">
                    <div class="header">
                        <h2><strong>Tambah</strong> Data</h2>
                    </div>
                    <div class="body">
                        <form method="post" action="{{route('root.kategori.store')}}">
                            {{csrf_field()}}
                            <div class="form-group">
                                <input type="text" class="form-control" placeholder="Nama Kategori" name="name_"
                                       value="{{ old('name_') }}" required>
                            </div>
                            <button type="submit" class="btn btn-primary btn-round">Simpan</button>
                        </form>
                    </div>
                </div>

            </div>
        </div>
        <div class="col-xl-7 col-lg-5 col-md-12">
            <div role="tabpanel" class="tab-pane">
                <div class="card">
                    <div class="header">
                        <h2><strong>Data</strong> Kategori</h2>
                    </div>
                    <div class="body">
                        <div class="table-responsive">
                            <table class="table table-bordered table-striped table-hover js-basic-example dataTable"
                                   id="myTable">
                                <thead>
                                <tr>
                                    <th>Id</th>
                                    <th>Nama Kategori</th>
                                    <th>update terakhir</th>
                                    <th>Aksi</th>
                                </tr>
                                </thead>
                                <tbody>
                                @foreach($data as $datas)
                                    <tr>
                                        <td>{{$datas->id}}</td>
                                        <td>{{$datas->name}}</td>
                                        <?php
                                        Carbon\Carbon::setLocale('id');
                                        ?>
                                        <td>{{\Carbon\Carbon::parse($datas->updated_at)->diffForHumans()}}</td>

                                        <td>
                                            <button class="btn btn-primary btn-icon" data-toggle="tooltip"
                                                    title="Edit Data"
                                                    onclick="modal('{{$datas->id}}','{{$datas->name}}')">
                                                <i class="zmdi zmdi-edit"></i>
                                            </button>

                                            <br>
                                            <?php

                                            ?>
                                            <button class="btn btn-danger btn-icon" data-toggle="tooltip"
                                                    title="Hapus Data" onclick="return dele({{$datas->id}})">
                                                <i class="zmdi zmdi-delete"></i>
                                            </button>
                                            <form id="delete-form-{{$datas->id}}"
                                                  action="{{ route('root.kategori.delete',['id' => $datas->id])}}" method="POST"
                                                  style="display: none;">

                                                @csrf
                                            </form>
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
    </div>
@endsection

@section('modal_umkm')
    <div class="modal fade" id="largeModal" tabindex="-1" role="dialog">
        <div class="modal-dialog modal-lg" role="document">
            <div class="modal-content">
                <form action="{{route('root.kategori.update')}}" method="post" enctype="multipart/form-data">
                    @csrf
                    <div class="modal-header">
                        <h5 class="title" id="largeModalLabel"> </h5>
                    </div>
                    <div class="modal-body">
                        <div class="form-group form-float" id="bukti">
                            <label for="id_data">ID Data</label>
                            <input type="text" id="id_data" class="form-control disabled" name="" disabled>
                            <input type="hidden" name="id" id="true_id">
                        </div>

                        <div class="form-group form-float" id="divlasan">
                            <label for="jenis_umkm">Nama Kategori</label>
                            <input type="text" id="jenis_umkm" class="form-control" name="kategori">
                        </div>

                    </div>
                    <input type="hidden" id="idumkm" name="umkm_id">
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
        function modal(id, nama) {
            $("#largeModalLabel").text('Sunting Data '+nama);
            $("#id_data").val(id);
            $("#true_id").val(id);
            $("#jenis_umkm").val(nama);
            $("#largeModal").modal('show');
        }
    </script>
    <script>
        function dele(id) {
            swal({
                title: 'Apakah Anda Yakin?',
                text: "Anda tidak dapat mengembalikan data ini!",
                icon: 'warning',
                showLoaderOnConfirm: true,
                closeOnClickOutside: false,
                buttons :{
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
            }).then((confirm)=> {
                if (confirm) {
                    document.getElementById('delete-form-'+id).submit()
                }
            });
        }
    </script>
@endpush
