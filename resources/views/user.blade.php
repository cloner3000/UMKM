@extends('layouts.dashboard')
@section('title','Product List')
@section('title_page')
    <h2>Setting Akun
    </h2>
@endsection
@section('content')



@endsection
@push('script')
    <script>
        $(document).on('click', '.delete', function (e) {
            e.preventDefault();
            var id = $(this).data('id');
            swal({
                    title: "Apakah Anda Yakin?",
                    type: "warning",
                    text: "Data yang dihapus akan bersifat Permanen",
                    showCancelButton: true,
                    confirmButtonColor: '#F44336',
                    cancelButtonColor: 'btn btn-danger',
                    confirmButtonText: 'Ya, Saya Yakin!!'
                },
                function () {
                    $.ajax({
                        type: "POST",
                        url: "",
                        data: {id: id},
                        success: function (data) {
                            //
                        }
                    });
                });
        });
    </script>
@endpush
