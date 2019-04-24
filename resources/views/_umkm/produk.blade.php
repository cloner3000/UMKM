@extends('layouts.dashboard')
@section('title','Product List')
@section('title_page')
    <h2>Daftar Produk Anda
    </h2>
@endsection
@section('content')

    <div class="row clearfix">
        <div class="col-lg-4">
            <a href="{{route('umkm.produk.tambah')}}">
                <button type="button" data-color="light-blue" class="btn bg-indigo waves-effect">
                    <span class="zmdi zmdi-format-playlist-add"></span>
                    <b>Tambah Produk</b>
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
                                       class="btn btn-default waves-effect waves-float waves-green"
                                       data-toggle="tooltip" title="edit data"><i class="zmdi zmdi-edit"></i></a>
                                    <button onclick="return dele({{$item->id}})"
                                            class="btn btn-default waves-effect waves-float waves-red delete"
                                            data-toggle="tooltip" title="Hapus data" data-id="{{$item->id}}"><i
                                            class="zmdi zmdi-delete"></i></button>
                                    <form id="delete-form-{{$item->id}}"
                                          action="{{ route('umkm.produk.delete',['id' => $item->id])}}" method="POST"
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

@endsection
@push('script')
    <script>
        @if(Session::has('success'))
        swal({
            title: 'Data Produk',
            text: '{{Session('success')}}',
            type: 'success',
            timer: '3500'
        })
        @elseif(Session::has('error'))
        swal({
            title: 'Oops!!',
            text: 'Terjadi Kesalahan, Silahkan Coba Lagi',
            type: 'error',
            timer: '3500'
        })
        @endif

        function dele(id) {
           if(confirm('Apakah Anda Yakin??') == true){
               event.preventDefault();
               document.getElementById('delete-form-'+id).submit()
           }else{
               swal({
                   title: "Dibatalkan",
                   type: "error",
                   text: "Data anda sekarang aman :) ",
               })
           }
        }
    </script>
@endpush
