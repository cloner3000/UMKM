@extends('layouts.dashboard')
@section('title','Setting Account')
@section('title_page')
    <h2>Setting Akun
        <small>sunting informasi Umkm</small>
    </h2>
@endsection
@push('css')
    <style>
        #map {
            height: 1000px;
            width: 100%;
        }
    </style>
@endpush
@section('content')

    <div class="row clearfix">
        <?php
        $umkm = App\Model\Umkm::where('user_id', Auth::user()->id)->first();
        $notif = \App\Model\VerifyUmkm::where('umkm_id', $umkm->id)->where('status', 'nonvalid')->first();
        ?>
        @if(!is_null($notif))
            <div class="col-xl-6 col-lg-7 col-md-12">
                <div class="card profile-header">
                    <div class="header">
                        <h2><strong>Pemberitahuan</strong> dari Dinas Koperasi Kota Maidun</h2>
                    </div>
                    <div class="body">
                        <div class="row">
                            <div class="col-lg-12 col-md-4 col-12">
                                <blockquote class="blockquote blockquote-primary">
                                    {!! $notif->note !!}
                                </blockquote>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        @endif
        <div class="col-xl-6 col-lg-5 col-md-12">
            <div role="tabpanel" class="tab-pane">
                <div class="card">
                    <div class="header">
                        <h2><strong>Sunting</strong> Akun</h2>
                    </div>
                    <div class="body">
                        <form method="post" action="{{route('user.update')}}">
                            {{csrf_field()}}
                            <div class="form-group">
                                <input type="text" value="{{\Illuminate\Support\Facades\Auth::user()->username}}"
                                       class="form-control"
                                       placeholder="Username" name="username" required>
                                <input type="hidden" name="umkm"
                                       value="{{\App\Model\Umkm::where('user_id',\Illuminate\Support\Facades\Auth::user()->id)->first()->id}}">
                            </div>
                            <div class="form-group">
                                <input type="password" class="form-control" placeholder="Password Lama" name="old_pass"
                                       required>
                            </div>
                            <div class="form-group">
                                <input type="password" class="form-control" placeholder="Password Baru" name="new_pass"
                                       required>
                            </div>
                            <div class="form-group">
                                <input type="password" class="form-control" placeholder="Ketik Ulang Password Baru"
                                       name="confirm_pass" required>
                            </div>
                            <button type="submit" class="btn btn-primary btn-round">Simpan</button>
                        </form>
                    </div>
                </div>

            </div>
        </div>
    </div>
    <div class="row clearfix">
        <div class="col-lg-12 col-md-12">
            <div class="card">
                <ul class="nav nav-tabs">
                    <li class="nav-item"><a class="nav-link active" data-toggle="tab" href="#mypost">Data Umum</a></li>
                    <li class="nav-item"><a class="nav-link" data-toggle="tab" href="#usersettings">Data Perizinan</a>
                    </li>
                </ul>
            </div>
            <div class="tab-content">
                <div role="tabpanel" class="tab-pane active" id="mypost">
                    <div class="card">
                        <div class="header">
                            <h2><strong>Data</strong> umum</h2>
                        </div>
                        <div class="body">
                            <form id="form_validation" action="{{route('umkm.general.update')}}" method="post"
                                  enctype="multipart/form-data">
                                @csrf
                                <div class="row">
                                    <div class="col-lg-6">
                                        <div class="form-group">
                                            <label>Pemilik Umkm</label>
                                            <input type="text" class="form-control" placeholder="Nama Lengkap Pemilik"
                                                   name="nama_pemilik" value="{{$umkm->nama_pemilik}}" required>
                                        </div>
                                    </div>
                                    <div class="col-lg-6">
                                        <div class="form-group">
                                            <label>NIK Pemilik UMKM</label>
                                            <input type="text" class="form-control" name="nik_pemilik"
                                                   placeholder="Pastikan 16 Digit Angka" minlength="16"
                                                   onkeypress="return isNumberKey(event)" value="{{$umkm->nik_pemilik}}"
                                                   required>
                                        </div>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label>Logo UMKM
                                        <small>.Jpg .Png .Jpeg Maks 2Mb</small>
                                    </label>
                                    <div class="row">
                                        <div class="col-md-11">
                                            <input type="file" class="form-control" name="new_logo">
                                            <input type="hidden" name="avatar" value="{{$umkm->avatar}}" id="">
                                        </div>
                                        <div class="col-md-1">
                                            <button class="btn btn-warning btn-icon btn-round" data-toggle="tooltip"
                                                    type="button"
                                                    title="Lihat Gambar"
                                                    onclick="modal('{{asset($umkm->avatar)}}','Logo Saat ini')">
                                                <i class="zmdi zmdi-image"></i>
                                            </button>
                                        </div>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <div class="row">
                                        <div class="col-lg-8">
                                            <label for="">Jenis UMKM</label>
                                            <select class="form-control show-tick z-index" name="jenis_id[]" multiple
                                                    data-live-search="true" required>
                                                @foreach($umkm->jenis_id as $data)
                                                    <option value="{{$data}}"
                                                            selected>{{\App\Model\JenisUmkm::find($data)->name}}</option>
                                                @endforeach
                                                @foreach($jenis_all as $item)
                                                    <option value="{{$item->id}}">{{$item->name}}</option>
                                                @endforeach
                                            </select>
                                        </div>
                                        <div class="col-lg-4">
                                            <label for="">Tanggal berdiri UMKM</label>
                                            <input type="date" class="form-control" name="tgl_berdiri" id=""
                                                   value="{{$umkm->tgl_berdiri}}" required>
                                        </div>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label for="">Alamat UMKM</label>
                                    <input type="text" class="form-control" placeholder="Alamat Umkm"
                                           aria-label="Username"
                                           name="alamat" id="pac-input"
                                           aria-describedby="basic-addon1" value="{{$umkm->alamat}}" required>
                                    <input type="radio" name="type" id="changetype-all" checked="checked" hidden>
                                    <div class="row">
                                        <div class="col-md-12">
                                            <div id="map"></div>
                                        </div>
                                    </div>
                                </div>

                                <div class="form-group">
                                    <label for="">Deskripsi UMKM</label>
                                    <textarea name="desc" id="" cols="30" rows="5" placeholder="Description"
                                              class="form-control no-resize tiny"
                                              required> {!! $umkm->desc !!}</textarea>
                                </div>
                                <button class="btn btn-primary btn-round">Simpan</button>
                            </form>
                        </div>
                    </div>
                </div>

                <div role="tabpanel" class="tab-pane" id="usersettings">
                    <div class="card">
                        <div class="header">
                            <h2><strong>Data </strong> Perizinan Umkm</h2>
                        </div>
                        <form action="{{route('umkm.izin.update')}}" method="post" enctype="multipart/form-data">
                            @csrf
                            <div class="body">
                                <div class="row">
                                    <div class="col-lg-6">
                                        <div class="form-group">
                                            <label>Aset (Rupiah)</label>
                                            <input type="text" class="form-control" name="aset"
                                                   placeholder="Aset Milik Umkm" minlength="16" id=""
                                                   onkeypress="return isNumberKey(event)"
                                                   value="{{$umkm->aset}}"
                                                   required>
                                        </div>
                                    </div>
                                    <div class="col-lg-6">
                                        <div class="form-group">
                                            <label>Omset (Rupiah)</label>
                                            <input type="text" class="form-control" name="omset"
                                                   placeholder="Omset Umkm" minlength="16"
                                                   onkeypress="return isNumberKey(event)"
                                                   value="{{$umkm->omset}}"
                                                   required>
                                        </div>
                                    </div>
                                </div>

                                <div class="row">
                                    <div class="col-lg-12">
                                        <div class="form-group">
                                            <label>No. Siup</label>
                                            <input type="text" class="form-control" placeholder="Nomor Siup"
                                                   name="no_siup" value="{{$umkm->no_siup}}" required>
                                        </div>
                                    </div>
                                </div>

                                <div class="row">
                                    <div class="col-lg-6">
                                        <div class="form-group">
                                            <label for="">Tanggal Siup</label>
                                            <input type="date" class="form-control" name="tgl_siup" id=""
                                                   value="{{$umkm->tgl_siup}}" required>
                                        </div>
                                    </div>
                                    <div class="col-lg-6">
                                        <div class="form-group">
                                            <label for="">Tanggal Berakhir Siup</label>
                                            <input type="date" class="form-control" name="tgl_siup_exp" id=""
                                                   value="{{$umkm->tgl_siup_exp}}" required>
                                        </div>
                                    </div>
                                </div>

                                <div class="row">
                                    <div class="col-lg-12">
                                        <div class="form-group">
                                            <label>NPWP</label>
                                            <input type="text" class="form-control" placeholder="NPWP"
                                                   name="npwp" value="{{$umkm->npwp}}" required>
                                        </div>
                                    </div>
                                </div>

                                <div class="row">
                                    <div class="col-lg-12">
                                        <div class="form-group">
                                            <label>Tanda Daftar Perusahaan ( TDP )</label>
                                            <input type="text" class="form-control" placeholder="tdp"
                                                   name="tdp" value="{{$umkm->tdp}}" required>
                                        </div>
                                    </div>
                                </div>

                                <div class="row">
                                    <div class="col-lg-6">
                                        <div class="form-group">
                                            <label for="">Tanggal TDP</label>
                                            <input type="date" class="form-control" name="tgl_tdp" id=""
                                                   value="{{$umkm->tgl_tdp}}" required>
                                        </div>
                                    </div>
                                    <div class="col-lg-6">
                                        <div class="form-group">
                                            <label for="">Tanggal Berakhir TDP</label>
                                            <input type="date" class="form-control" name="tgl_tdp_exp" id=""
                                                   value="{{$umkm->tgl_tdp_exp}}" required>
                                        </div>
                                    </div>
                                </div>

                                <div class="row">
                                    <div class="col-lg-6">
                                        <div class="form-group">
                                            <label for="">Izin Gangguan</label>
                                            <input type="text" class="form-control" name="izin_ganguan" id=""
                                                   value="{{$umkm->izin_ganguan}}" required>
                                        </div>
                                    </div>
                                    <div class="col-lg-6">
                                        <div class="form-group">
                                            <label for="">Tanggal Izin Gangguan</label>
                                            <input type="date" class="form-control" name="tgl_izin_ganguan" id=""
                                                   value="{{$umkm->tgl_izin_ganguan}}" required>
                                        </div>
                                    </div>
                                </div>

                                <div class="form-group">
                                    <label>File Akta Notaris
                                        <small>.Jpg .Png .Jpeg Maks 2Mb</small>
                                    </label>
                                    <div class="row">
                                        <div class="col-md-11">
                                            <input type="file" class="form-control" name="new_akta">
                                            <input type="hidden" name="akta_notaris" value="{{$umkm->akta_notaris}}"
                                                   id="">
                                        </div>
                                        <div class="col-md-1">
                                            <button class="btn btn-warning btn-icon btn-round" data-toggle="tooltip"
                                                    type="button"
                                                    title="Lihat Gambar"
                                                    onclick="modal('{{asset($umkm->akta_notaris)}}','File Akta Notaris')">
                                                <i class="zmdi zmdi-image"></i>
                                            </button>
                                        </div>
                                    </div>
                                </div>

                                <button class="btn btn-info btn-round" type="submit">Simpan</button>
                            </div>
                        </form>
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
                <div class="modal-header">
                    <h4 class="title" id="largeModalLabel"></h4>
                </div>
                <div class="modal-body">
                    <img src="" alt="" id="imageRender" height="50%" width="50%">

                </div>
                <input type="hidden" id="idumkm" name="umkm_id">
                <div class="modal-footer">
                    <button type="button" class="btn btn-danger waves-effect" data-dismiss="modal">Tutup</button>
                </div>

            </div>
        </div>
    </div>
@endsection
@push('script')
    <script>

        function modal(source, nama) {
            $("#largeModalLabel").text(nama);
            $('#imageRender').attr('src', source);
            $("#largeModal").modal('show');
        }

        $(function () {
            $('#form_validation').validate({
                rules: {
                    'checkbox': {
                        required: true
                    },
                    'gender': {
                        required: true
                    }
                },
                highlight: function (input) {
                    $(input).parents('.form-line').addClass('error');
                },
                unhighlight: function (input) {
                    $(input).parents('.form-line').removeClass('error');
                },
                errorPlacement: function (error, element) {
                    $(element).parents('.form-group').append(error);
                }
            });

            //Advanced Form Validation
            $('#form_advanced_validation').validate({
                rules: {
                    'date': {
                        customdate: true
                    },
                    'creditcard': {
                        creditcard: true
                    }
                },
                highlight: function (input) {
                    $(input).parents('.form-line').addClass('error');
                },
                unhighlight: function (input) {
                    $(input).parents('.form-line').removeClass('error');
                },
                errorPlacement: function (error, element) {
                    $(element).parents('.form-group').append(error);
                }
            });

            //Custom Validations ===============================================================================
            //Date
            $.validator.addMethod('customdate', function (value, element) {
                    return value.match(/^\d\d\d\d?-\d\d?-\d\d$/);
                },
                'Please enter a date in the format YYYY-MM-DD.'
            );

            //Credit card
            $.validator.addMethod('creditcard', function (value, element) {
                    return value.match(/^\d\d\d\d?-\d\d\d\d?-\d\d\d\d?-\d\d\d\d$/);
                },
                'Please enter a credit card in the format XXXX-XXXX-XXXX-XXXX.'
            );
            //==================================================================================================
        });
    </script>
    <script>
        // This example requires the Places library. Include the libraries=places
        // parameter when you first load the API. For example:
        // <script src="https://maps.googleapis.com/maps/api/js?key=YOUR_API_KEY&libraries=places">

        function initMap() {
            var map = new google.maps.Map(document.getElementById('map'), {
                center: {lat: {{$umkm->lat}}, lng: {{$umkm->long}}},
                zoom: 13
            });
            var card = document.getElementById('pac-card');
            var input = document.getElementById('pac-input');
            var types = document.getElementById('type-selector');
            var strictBounds = document.getElementById('strict-bounds-selector');

            map.controls[google.maps.ControlPosition.TOP_RIGHT].push(card);

            var autocomplete = new google.maps.places.Autocomplete(input);

            // Bind the map's bounds (viewport) property to the autocomplete object,
            // so that the autocomplete requests use the current map bounds for the
            // bounds option in the request.
            autocomplete.bindTo('bounds', map);

            // Set the data fields to return when the user selects a place.
            autocomplete.setFields(
                ['address_components', 'geometry', 'icon', 'name']);

            var infowindow = new google.maps.InfoWindow();
            var infowindowContent = document.getElementById('infowindow-content');
            infowindow.setContent(infowindowContent);
            var marker = new google.maps.Marker({
                position: {lat: {{$umkm->lat}}, lng: {{$umkm->long}}},
                map: map,
                anchorPoint: new google.maps.Point(0, -29)
            });

            autocomplete.addListener('place_changed', function () {
                infowindow.close();
                marker.setVisible(false);
                var place = autocomplete.getPlace();
                if (!place.geometry) {
                    // User entered the name of a Place that was not suggested and
                    // pressed the Enter key, or the Place Details request failed.
                    window.alert("No details available for input: '" + place.name + "'");
                    return;
                }

                // If the place has a geometry, then present it on a map.
                if (place.geometry.viewport) {
                    map.fitBounds(place.geometry.viewport);
                } else {
                    map.setCenter(place.geometry.location);
                    map.setZoom(17);  // Why 17? Because it looks good.
                }
                marker.setPosition(place.geometry.location);
                marker.setVisible(true);

                var address = '';
                if (place.address_components) {
                    address = [
                        (place.address_components[0] && place.address_components[0].short_name || ''),
                        (place.address_components[1] && place.address_components[1].short_name || ''),
                        (place.address_components[2] && place.address_components[2].short_name || '')
                    ].join(' ');
                }

                infowindowContent.children['place-icon'].src = place.icon;
                infowindowContent.children['place-name'].textContent = place.name;
                infowindowContent.children['place-address'].textContent = address;
                infowindow.open(map, marker);
            });

            // Sets a listener on a radio button to change the filter type on Places
            // Autocomplete.
            function setupClickListener(id, types) {
                var radioButton = document.getElementById(id);
                radioButton.addEventListener('click', function () {
                    autocomplete.setTypes(types);
                });
            }

            setupClickListener('changetype-all', []);
            setupClickListener('changetype-address', ['address']);
            setupClickListener('changetype-establishment', ['establishment']);
            setupClickListener('changetype-geocode', ['geocode']);

            document.getElementById('use-strict-bounds')
                .addEventListener('click', function () {
                    console.log('Checkbox clicked! New state=' + this.checked);
                    autocomplete.setOptions({strictBounds: this.checked});
                });
        }
    </script>
    <script
        src="https://maps.googleapis.com/maps/api/js?key=AIzaSyBIljHbKjgtTrpZhEiHum734tF1tolxI68&libraries=places&callback=initMap"
        async defer></script>
    <script>
        @if(Session::has('success'))
        swal({
            title: 'Success',
            text: '{{Session('success')}}',
            type: 'success',
            timer: '3500'
        })
        @elseif(Session::has('error'))
        swal({
            title: 'Oops!!',
            text: '{{Session('error')}}',
            type: 'error',
            timer: '3500'
        })

        @endif
        function isNumberKey(evt) {
            var charCode = (evt.which) ? evt.which : event.keyCode
            if (charCode > 31 && (charCode < 48 || charCode > 57))
                return false;
            return true;
        }

        tinymce.init({selector: 'textarea'});


    </script>
@endpush
