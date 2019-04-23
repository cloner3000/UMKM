@extends('layouts.dashboard')
@section('title','Product List')
@push('css')

@endpush
@section('title_page')
    <h2>Sunting Produk
    </h2>
@endsection
@section('content')

    <div class="row clearfix">
        <div class="col-lg-12 col-md-12 col-sm-12">
            <div class="card">
                <div class="header">
                    <h2><strong>Form</strong> Sunting Produk</h2>

                </div>
                <div class="body">
                    <form action="{{route('umkm.produk.update')}}" id="form_validation" method="POST"
                          enctype="multipart/form-data">
                        {{ csrf_field() }}
                        <div class="form-group form-float">
                            <label>Nama Produk</label>
                            <input type="text" value="{{$data->nama}}" class="form-control" placeholder="Nama Produk"
                                   name="nama" required>
                            <input name="id" value="{{$data->id}}" type="hidden">
                        </div>

                        <div class="form-group form-float">
                            <label>Deskripsi Singkat produk</label>
                            <input type="text" value="{{$data->short_desc}}" class="form-control"
                                   placeholder="Deskripsi Singkat" name="short_desc" required>
                        </div>

                        @if($data->purchase_order == false)
                            <div class="form-group">
                                <label>Ketersediaan Produk</label> <br>
                                <div class="radio inlineblock m-r-20">
                                    <input type="radio" name="po" id="male" class="with-gap" value="false" checked>
                                    <label for="male">Siap Jual</label>
                                </div>
                                <div class="radio inlineblock">
                                    <input type="radio" name="po" id="Female" class="with-gap" value="true">
                                    <label for="Female">Purchase Order ( PO )</label>
                                </div>
                            </div>
                            @else
                            <div class="form-group">
                                <label>Ketersediaan Produk</label> <br>
                                <div class="radio inlineblock m-r-20">
                                    <input type="radio" name="po" id="male" class="with-gap" value="false">
                                    <label for="male">Siap Jual</label>
                                </div>
                                <div class="radio inlineblock">
                                    <input type="radio" name="po" id="Female" class="with-gap" value="true" checked>
                                    <label for="Female">Purchase Order ( PO )</label>
                                </div>
                            </div>
                        @endif

                        <div class="form-group">
                            <div class="row">
                                @foreach($data->pic1 as $key=>$value)
                                    <div class="col">
                                        <img src="{{asset('upload/product/'.$value)}}" class="img-thumbnail"/>
                                        <input id="c{{$key}}" type="checkbox" class="checkbox" name="temp_photos[]"
                                               value="{{$value}}"
                                               multiple/>
                                        <label for="c{{$key}}">Hapus Gambar</label>
                                    </div>
                                @endforeach
                            </div>
                        </div>

                        <div class="form-group form-float">
                            <label><b>Tambah </b> Gambar Produk <sub>Bisa lebih dari satu</sub></label>
                            <input type="file" class="form-control" name="photos[]" multiple/>
                        </div>

                        <div class="form-group form-float">
                            <label>Harga Produk</label>
                            <div class="input-group">
                                    <span class="input-group-addon">
                                        Rp.
                                    </span>
                                <input type="text" class="form-control" name="harga" value="{{$data->harga}}"
                                       onkeypress="return isNumberKey(event)"/>
                            </div>
                        </div>

                        <div class="form-group">
                            <label>Kategori produk <sub>Bisa lebih dari satu</sub></label>
                            <select class="form-control" multiple data-placeholder="Kategori Produk Anda"
                                    name="kategori[]">
                                @foreach($data->kategori_ids as $item)
                                    <option value="{{$item}}"
                                            selected>{{App\Model\Kategori::find($item)->name}}</option>
                                @endforeach
                                @foreach($kategori as $cath)
                                    <option value="{{$cath->id}}">{{$cath->name}}</option>
                                @endforeach
                            </select>
                        </div>
                        <div class="form-group form-float">
                            <label>Deskripsi Produk </label>
                            <textarea name="description" cols="30" rows="5" placeholder="Description"
                                      class="form-control no-resize tiny" required> {!! $data->long_desc !!} </textarea>
                        </div>
                        <div class="form-group form-float">
                            <label>Keyword</label>
                            <input type="text" class="form-control" placeholder="Untuk mempermudah pencarian oleh user"
                                   name="key" value="{{$data->keyword}}" required>
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
