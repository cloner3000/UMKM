@extends('layouts.dashboard')
@section('title','Product List')
@section('title_page')
    <h2>Daftar Produk Anda
    </h2>
@endsection
@section('content')

    <div class="row clearfix">
        <div class="col-lg-4">
            <button type="button" data-color="light-blue" class="btn bg-indigo waves-effect">
                <span class="zmdi zmdi-format-playlist-add"></span>
               <b>Tambah Produk</b>
            </button>
        </div>
    </div>

    <div class="row clearfix">
        <div class="col-lg-12">
            <div class="card product_item_list">
                <div class="body table-responsive">
                    <table class="table table-hover m-b-0">
                        <thead>
                        <tr>
                            <th>Gambar</th>
                            <th>Product Name</th>
                            <th data-breakpoints="sm xs">Detail</th>
                            <th data-breakpoints="xs">Amount</th>
                            <th data-breakpoints="xs md">Stock</th>
                            <th data-breakpoints="sm xs md">Action</th>
                        </tr>
                        </thead>
                        <tbody>
                        <tr>
                            <td><img src="../assets/images/ecommerce/1.png" width="48" alt="Product img"></td>
                            <td><h5>Simple Black Clock</h5></td>
                            <td><span class="text-muted">randomised words even slightly believable</span></td>
                            <td>$16.00</td>
                            <td><span class="col-green">In Stock</span></td>
                            <td>
                                <a href="javascript:void(0);" class="btn btn-default waves-effect waves-float waves-cyan"
                                   data-toggle="tooltip" title="lihat hasil"><i class="zmdi zmdi-view-web"></i></a>
                                <a href="javascript:void(0);" class="btn btn-default waves-effect waves-float waves-green"
                                   data-toggle="tooltip" title="edit data"><i class="zmdi zmdi-edit"></i></a>
                                <a href="javascript:void(0);" class="btn btn-default waves-effect waves-float waves-red"
                                   data-toggle="tooltip" title="Hapus data"><i class="zmdi zmdi-delete"></i></a>
                            </td>
                        </tr>

                        </tbody>
                    </table>
                </div>
            </div>
            <div class="card">
                <div class="body">
                    <ul class="pagination pagination-primary m-b-0">
                        <li class="page-item"><a class="page-link" href="javascript:void(0);"><i class="zmdi zmdi-arrow-left"></i></a></li>
                        <li class="page-item active"><a class="page-link" href="javascript:void(0);">1</a></li>
                        <li class="page-item"><a class="page-link" href="javascript:void(0);">2</a></li>
                        <li class="page-item"><a class="page-link" href="javascript:void(0);">3</a></li>
                        <li class="page-item"><a class="page-link" href="javascript:void(0);">4</a></li>
                        <li class="page-item"><a class="page-link" href="javascript:void(0);"><i class="zmdi zmdi-arrow-right"></i></a></li>
                    </ul>
                </div>
            </div>
        </div>
    </div>

@endsection
