@extends('layouts.dashboard')
@section('title','Product List')
@section('title_page')
    <h2>Daftar Produk Anda
    </h2>
@endsection
@section('content')


        <div class="row clearfix">
            <div class="col-lg-12">
                <div class="alert alert-danger" role="alert">
                    <div class="container">
                        <div class="alert-icon">
                            <i class="zmdi zmdi-alert-circle-o"></i>
                        </div>
                        <strong>Pemberitahuan Penting!!</strong> Status UMKM anda sedang diverifikasi oleh pihak Dinas Kota Madiun
                    </div>
                </div>
            </div>
        </div>

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
