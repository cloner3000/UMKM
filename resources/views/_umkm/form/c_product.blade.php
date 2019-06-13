@extends('layouts.dashboard')
@section('title','Product List')
@push('css')

@endpush
@section('title_page')
    <h2>Tambah Produk
    </h2>
@endsection
@section('content')

    <div class="row clearfix">
        <div class="col-lg-12 col-md-12 col-sm-12">
            <div class="card">
                <div class="header">
                    <h2><strong>Form</strong> Produk</h2>

                </div>
                <div class="body">
                    <form action="{{route('umkm.produk.add')}}" id="form_validation" method="POST"
                          enctype="multipart/form-data">
                        {{ csrf_field() }}
                        <div class="form-group form-float">
                            <label>Nama Produk</label>
                            <input type="text" class="form-control" placeholder="Nama Produk" name="nama" required>
                        </div>

                        <div class="form-group form-float">
                            <label>Deskripsi Singkat produk</label>
                            <input type="text" class="form-control" placeholder="Deskripsi Singkat" name="short_desc" required>
                        </div>

                        <div class="form-group">
                            <label>Ketersediaan Produk</label> <br>
                            <div class="radio inlineblock m-r-20">
                                <input type="radio" name="po" id="male" class="with-gap" value="false">
                                <label for="male">Siap Jual</label>
                            </div>
                            <div class="radio inlineblock">
                                <input type="radio" name="po" id="Female" class="with-gap" value="true"
                                       checked="">
                                <label for="Female">Purchase Order ( PO )</label>
                            </div>
                        </div>

                        <div class="form-group form-float">
                            <label>Gambar Produk <sub>Bisa lebih dari satu</sub></label>
                            <input type="file" class="form-control" name="photos[]" multiple/>
                        </div>

                        <div class="form-group form-float">
                            <label>Harga Produk</label>
                            <div class="input-group">
                                    <span class="input-group-addon">
                                        Rp.
                                    </span>
                                <input type="text" class="form-control" name="harga" onkeypress="return isNumberKey(event)"/>
                            </div>
                        </div>

                        <div class="form-group">
                            <label>Kategori produk <sub>Bisa lebih dari satu</sub></label>
                            <select class="form-control show-tick z-index" multiple data-placeholder="Kategori Produk Anda"  data-live-search="true"
                                    name="kategori[]">
                                @foreach($kategori as $cath)
                                    <option value="{{$cath->id}}">{{$cath->name}}</option>
                                @endforeach
                            </select>
                        </div>
                        <div class="form-group form-float">
                            <label>Deskripsi Produk </label>
                            <textarea name="description" cols="30" rows="5" placeholder="Description"
                                      class="form-control no-resize tiny"  required> </textarea>
                        </div>
                        <div class="form-group form-float">
                            <label>Keyword</label>
                            <input type="text" class="form-control" placeholder="Untuk mempermudah pencarian oleh user" name="key" required>
                        </div>
                        <button class="btn btn-raised btn-primary btn-round waves-effect" type="submit">SUBMIT</button>
                    </form>
                </div>
            </div>
        </div>
    </div>

@endsection
@push('script')

    <script>
        function isNumberKey(evt) {
            var charCode = (evt.which) ? evt.which : event.keyCode
            if (charCode > 31 && (charCode < 48 || charCode > 57))
                return false;
            return true;
        }
        tinymce.init({selector: 'textarea'});
        $(document).ready(function () {
            $('.select2').select2();
        });
    </script>
@endpush
