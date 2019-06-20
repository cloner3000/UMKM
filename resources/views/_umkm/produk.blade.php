@extends('layouts.dashboard')
@section('title','Product List')
@section('title_page')
    <h2>Daftar Produk Anda
    </h2>
@endsection
@section('content')

    @if($umkm->is_verified == true)
        <div class="row clearfix">
            <div class="col-lg-4">
                <a href="{{route('umkm.produk.tambah')}}">
                    <button type="button" data-color="light-blue" class="btn bg-indigo waves-effect">
                        <span class="zmdi zmdi-format-playlist-add"></span>
                        <b>Tambah Data</b>
                    </button>
                </a>
            </div>
        </div>

        <div class="row clearfix">
            <div class="col-lg-12">
                <div class="card product_item_list">
                    <div class="body table-responsive">
                        <table class="table table-hover m-b-0">
                            <thead>
                            <tr>

                                <th>Product Name</th>
                                <th data-breakpoints="sm xs">Detail</th>
                                <th data-breakpoints="xs">Harga</th>
                                <th data-breakpoints="xs md">Purchase-Order</th>
                                <th data-breakpoints="sm xs md">Action</th>
                            </tr>
                            </thead>
                            <tbody>
                            @foreach($product as $item)
                                <tr>
                                    <td><h5>{{$item->nama}}</h5></td>
                                    <td><span class="text-muted">randomised words even slightly believable</span></td>
                                    <td>Rp. {{$item->harga }}</td>
                                    <td>
                                        @if($item->purchase_order == true)
                                            <span class="badge badge-success">Siap Jual</span>
                                        @else
                                            <span class="badge badge-warning">Purchase Order (PO)</span>
                                        @endif
                                    </td>
                                    <td>
                                        <a href="{{route('umkm.produk.detail',[ 'id' => encrypt($item->id)])}}"
                                           class="btn btn-default waves-effect waves-float waves-cyan"
                                           data-toggle="tooltip" title="Lihat Selengkapnya"><i
                                                class="zmdi zmdi-view-web"></i></a>
                                        <a href="{{route('umkm.produk.edit',['id' => encrypt($item->id)])}}"
                                           class="btn btn-info waves-effect waves-float waves-green"
                                           data-toggle="tooltip" title="edit data"><i class="zmdi zmdi-edit"></i></a>
                                        <button onclick="return dele({{$item->id}})"
                                                class="btn btn-danger"
                                                data-toggle="tooltip" title="Hapus data" data-id="{{$item->id}}"><i
                                                class="zmdi zmdi-delete"></i></button>
                                        <form id="delete-form-{{$item->id}}"
                                              action="{{ route('umkm.produk.delete',['id' => $item->id])}}"
                                              method="POST"
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
                <div class="card">
                    <div class="body">
                        <ul class="pagination pagination-primary m-b-0">
                            {{ $product->links() }}
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    @else
        <div class="row clearfix">
            <div class="col-lg-12">
                <div class="alert alert-warning" role="alert">
                    <div class="container">
                        <div class="alert-icon">
                            <i class="zmdi zmdi-alert-circle-o"></i>
                        </div>
                        <strong>Pemberitahuan Penting!!</strong> Status UMKM anda sedang diverifikasi oleh pihak Dinas Kota Madiun
                    </div>
                </div>
            </div>
        </div>
    @endif
@endsection
@push('script')
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
