@extends('layouts.dashboard')
@section('title','Sunting Produk')
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
                                    <input type="radio" name="po" id="male" class="with-gap" value="0" checked>
                                    <label for="male">Siap Jual</label>
                                </div>
                                <div class="radio inlineblock">
                                    <input type="radio" name="po" id="Female" class="with-gap" value="1">
                                    <label for="Female">Purchase Order ( PO )</label>
                                </div>
                            </div>
                        @else
                            <div class="form-group">
                                <label>Ketersediaan Produk</label> <br>
                                <div class="radio inlineblock m-r-20">
                                    <input type="radio" name="po" id="ready" class="with-gap" value="0">
                                    <label for="ready">Siap Jual</label>
                                </div>
                                <div class="radio inlineblock">
                                    <input type="radio" name="po" id="po" class="with-gap" value="1" checked>
                                    <label for="po">Purchase Order ( PO )</label>
                                </div>
                            </div>
                        @endif

                        <div class="form-group form-float" id="stock">
                            <label>Jumlah Produk Siap Jual</label>
                            <input type="text" class="form-control" placeholder="Dalam jumlah pcs" name="stock"
                                   value="{{$data->persediaan}}" onkeypress="return isNumberKey(event)">
                        </div>

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
                            <input type="file" class="form-control" name="photos[]" multiple accept='.jpg, .jpeg, .png'/>
                            <input type="hidden" name="foto" id="" value="">
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
                            <select class="form-control show-tick z-index" multiple
                                    data-placeholder="Kategori Produk Anda"
                                    name="kategori[]" data-live-search="true">
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
                        @if($data->isDiscount == true)
                            <div class="checkbox">
                                <input id="diskon_cb" type="checkbox" onchange="shoi()" name="isDiscount" checked>
                                <label for="diskon_cb">
                                    Diskon Produk
                                    <small>( optional )</small>
                                </label>
                            </div>
                        @else
                            <div class="checkbox">
                                <input id="diskon_cb" type="checkbox" onchange="shoi()" name="isDiscount" >
                                <label for="diskon_cb">
                                    Diskon Produk
                                    <small>( optional )</small>
                                </label>
                            </div>
                        @endif

                        <div class="form-group form-float" id="diskon_input">
                            <label>Diskon Produk</label>
                            <input type="text" class="form-control" placeholder="Diskon Dalam Persen" name="discount" id="dis"
                                   onkeypress="return isNumberKey(event)" value="{{$data->discount}}">
                        </div>

                        <div class="form-group form-float">
                            <label>Keyword</label>
                            <input type="text" class="form-control" placeholder="Untuk mempermudah pencarian oleh user"
                                   name="key" value="{{$data->keyword}}" required>
                        </div>

                        <div class="form-group">
                            <div class="row">
                                <div class="col-lg-6">
                                    <label>Link BukaLapak
                                        <small>bila ada</small>
                                    </label>
                                    <div class="input-group">
                                        <span class="input-group-addon">
                                           <img src="{{asset('images/bl.png')}}" alt="" style="width: 32px; height: 32px">
                                        </span>
                                        <input type="text" class="form-control" placeholder="https://www.bukalapak.com/......" name="bukalapak_link"
                                               value="{{$data->bukalapak_link}}">
                                    </div>
                                </div>
                                <div class="col-lg-6">
                                    <label>Link Tokopedia
                                        <small>bila ada</small>
                                    </label>
                                    <div class="input-group">
                                        <span class="input-group-addon">
                                           <img src="{{asset('images/tokped.png')}}" alt="" style="width: 32px; height: 32px">
                                        </span>
                                        <input type="text" class="form-control" placeholder="https://www.tokopedia.com/......" name="tokped_link"
                                               value="{{$data->tokped_link}}">
                                    </div>
                                </div>
                            </div>

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
        $(document).ready(function () {
            $('#ready').change(function () {
                if ($(this).prop("checked", true)) {
                    $('#stock').show("slow");
                }
            });
            $('#po').change(function () {
                if ($(this).prop("checked", true)) {
                    $('#stock').hide("slow");

                }
            });
            @if($data->persediaan == null)
            $("#stock").hide();
            @else
            $("#stock").show();
            @endif

            @if($data->isDiscount == true)
            $('#diskon_input').show();
            @else
            $('#diskon_input').hide();
            @endif
        });

        function shoi() {
            if ($('#diskon_cb').is(':checked')) {
                $('#diskon_input').show("slow");
            } else {
                $('#diskon_input').hide("slow");
                $('#dis').val("0");
            }
        }

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
