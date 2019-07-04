<!doctype html>
<html lang="en">
<head>
    <meta charset="utf-8"/>
    <link rel="apple-touch-icon" sizes="76x76" href="assets/img/apple-icon.png">
    <link rel="icon" href="{{asset('images/shop.ico')}}">
    <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1"/>
    <title>Registrasi UMKM</title>

    <meta content='width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=0' name='viewport'/>
    <meta name="viewport" content="width=device-width"/>

    <!--     Fonts and icons     -->
    <link href="http://netdna.bootstrapcdn.com/font-awesome/4.4.0/css/font-awesome.css" rel="stylesheet">
    <link rel="stylesheet" href="{{asset('js/bootstrap-select/css/bootstrap-select.min.css')}}">
    <!-- CSS Files -->
    <link href="{{asset('wizard/css/bootstrap.min.css')}}" rel="stylesheet"/>
    <link href="{{asset('wizard/css/gsdk-bootstrap-wizard.css')}}" rel="stylesheet"/>

    <style>
        /* Always set the map height explicitly to define the size of the div
         * element that contains the map. */
        #map {
            height: 300px;
        }
        html, body {
            height: 100%;
            margin: 0;
            padding: 0;
        }
        #description {
            font-family: Roboto;
            font-size: 15px;
            font-weight: 300;
        }

        #infowindow-content .title {
            font-weight: bold;
        }

        #infowindow-content {
            display: none;
        }

        #map #infowindow-content {
            display: inline;
        }

        .pac-card {
            margin: 10px 10px 0 0;
            border-radius: 2px 0 0 2px;
            box-sizing: border-box;
            -moz-box-sizing: border-box;
            outline: none;
            box-shadow: 0 2px 6px rgba(0, 0, 0, 0.3);
            background-color: #fff;
            font-family: Roboto;
        }

        #pac-container {
            padding-bottom: 12px;
            margin-right: 12px;
        }

        .pac-controls {
            display: inline-block;
            padding: 5px 11px;
        }

        .pac-controls label {
            font-family: Roboto;
            font-size: 13px;
            font-weight: 300;
        }

        #pac-input {
            background-color: #fff;
            font-family: Roboto;
            font-size: 15px;
            font-weight: 300;

            padding: 0 11px 0 13px;
            text-overflow: ellipsis;

        }

        #pac-input:focus {
            border-color: #4d90fe;
        }

        #title {
            color: #fff;
            background-color: #4d90fe;
            font-size: 25px;
            font-weight: 500;
            padding: 6px 12px;
        }
    </style>
    <!-- Sweet Alert v2 -->
    <script src="{{ asset('js/sweetalert/sweetalert.min.js') }}"></script>

</head>

<body>
<div class="image-container set-full-height" style="background-color: #F6F6F6">
    <!--   Creative Tim Branding   -->

    <!--  Made With Get Shit Done Kit  -->
    <a href="{{route('login')}}"
       class="made-with-mk">
        <div class="brand">Punya Akun?</div>
        <div class="made-with">Login Di <strong>Sini</strong></div>
    </a>

    <!--   Big container   -->
    <div class="container">
        <div class="row">
            <div class="col-sm-8 col-sm-offset-2">

                <!--      Wizard container        -->
                <div class="wizard-container">

                    <div class="card wizard-card" data-color="blue">
                        <form action="{{route('auth.umkm')}}" method="post" enctype="multipart/form-data">
                            <!--        You can switch ' data-color="orange" '  with one of the next bright colors: "blue", "green", "orange", "red"          -->
                            @csrf
                            <div class="wizard-header">
                                <h3>
                                    <b>Registrasi</b> UMKM <br>
                                    <small>This information will let us know more about you.</small>
                                </h3>
                            </div>

                            {{--Tab Menu--}}
                            <div class="wizard-navigation">
                                <ul>
                                    <li><a href="#about" data-toggle="tab">Data Akun</a></li>
                                    <li><a href="#account" data-toggle="tab">Data UMKM</a></li>
                                    <li><a href="#address" data-toggle="tab">Perizinan UMKM</a></li>
                                </ul>

                            </div>

                            <div class="tab-content">
                                <div class="tab-pane" id="about">
                                    <div class="row">
                                        @if(session('error_register'))
                                            <div class="col-sm-12">
                                                <div class="alert alert-danger" role="alert">
                                                    {{session('error_register')}}
                                                </div>
                                            </div>
                                        @endif
                                        @if ($errors->any())
                                            <div class="col-sm-12">
                                                <div class="alert alert-danger">
                                                    <ul>
                                                        @foreach ($errors->all() as $error)
                                                            <li>{{ $error }}</li>
                                                        @endforeach
                                                    </ul>
                                                </div>
                                            </div>
                                        @endif
                                        <div class="col-sm-4 col-sm-offset-1">
                                            <div class="picture-container">
                                                <div class="picture">
                                                    <img src="assets/img/default-avatar.png" class="picture-src"
                                                         name="avatar"
                                                         id="wizardPicturePreview" title=""/>
                                                    <input type="file" accept='.jpg, .jpeg, .png' name="avatar" id="wizard-picture">
                                                </div>
                                                <h6>Logo UMKM
                                                    <small>(Bila Ada)</small><br>
                                                    <small style="color: red">maksimum 2 Mb</small>
                                                </h6>

                                            </div>
                                        </div>
                                        <div class="col-sm-6">
                                            <div class="form-group">
                                                <label>Nama UMKM
                                                    <small>(required)</small>
                                                </label>
                                                <input name="username" type="text" value="{{ old('username') }}"
                                                       class="form-control"
                                                       placeholder="PT/CV..." required>
                                            </div>
                                            <div class="form-group">
                                                <label>Email
                                                    <small>(required)</small>
                                                </label>
                                                <input name="email" type="email" value="{{old('email')}}"
                                                       class="form-control"
                                                       placeholder="email@example.com" required>
                                            </div>
                                        </div>
                                        <div class="col-sm-10 col-sm-offset-1">
                                            <div class="form-group">
                                                <label>Password
                                                    <small>(required)</small>
                                                </label>
                                                <input name="password" type="password" value="" class="form-control"
                                                       required>
                                            </div>
                                            <div class="form-group">
                                                <label>Konfirmasi Password
                                                    <small>(required)</small>
                                                </label>
                                                <input name="password_confirmation" type="password" value=""
                                                       class="form-control" required>
                                            </div>
                                            <div class="form-check">
                                                <input type="checkbox" name="term" id="term" required>
                                                <label for="term">Saya telah membaca dan menyetujui
                                                    <a href="javascript:void(0)" data-toggle="modal"
                                                       data-target="#termModal"
                                                       style="text-decoration: none;color: #60bafd;">
                                                        Aturan Penggunaan</a> E-UMKM</label>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="tab-pane" id="account">
                                    <div class="row">
                                        <div class="col-sm-12">
                                            <h4 class="info-text"></h4>
                                        </div>
                                        <div class="col-sm-6 col-sm-offset-1">
                                            <div class="form-group">
                                                <label>Nama Pemilik UMKM</label>
                                                <input type="text" class="form-control" placeholder="Nama Pemilik"
                                                       value="{{old('nama_pemilik')}}"
                                                       name="nama_pemilik" required>
                                            </div>
                                        </div>
                                        <div class="col-sm-4">
                                            <div class="form-group">
                                                <label>NIK Pemilik UMKM</label>
                                                <input type="text" class="form-control" minlength="16"
                                                       name="nik_pemilik"
                                                       onkeypress="return isNumberKey(event)"
                                                       value="{{old('nik_pemilik')}}"
                                                       placeholder="1xxxxxxxxxxxxxx1" required>
                                            </div>
                                        </div>
                                        <div class="col-sm-5 col-sm-offset-1">
                                            <div class="form-group">
                                                <label>Tanggal Berdiri UMKM</label>
                                                <input type="date" class="form-control" name="tgl_berdiri"
                                                       value="{{old('tgl_berdiri')}}" required>
                                            </div>
                                        </div>
                                        <div class="col-sm-5">
                                            <div class="form-group">
                                                <label>Jenis UMKM</label><br>
                                                <select name="jenis_id" multiple class="form-control my-select"
                                                        data-live-search="true" required>
                                                    @foreach(\App\Model\JenisUmkm::all() as $item)
                                                        <option value="{{$item->id}}"> {{$item->name}} </option>
                                                    @endforeach
                                                </select>
                                            </div>
                                        </div>

                                        <div class="col-sm-10 col-sm-offset-1">
                                            <div class="form-group">
                                                <label>Alamat UMKM</label>
                                                <input type="text" class="form-control" placeholder="Alamat Umkm"
                                                      aria-label="Username"
                                                       name="alamat" id="pac-input"
                                                       aria-describedby="basic-addon1" value="{{old('alamat')}}" required>
                                                <input type="radio" name="type" id="changetype-all" checked="checked" hidden>
                                            </div>
                                        </div>


                                        <div class="col-sm-10 col-sm-offset-1">

                                            <div id="map"></div>
                                        </div>

                                        <div class="col-sm-10 col-sm-offset-1">
                                            <div class="form-group">
                                                <label>Total Aset</label>
                                                <input type="text" class="form-control" placeholder="Dalam Rupiah (IDR)"
                                                       onkeypress="return isNumberKey(event)" aria-label="Username"
                                                       name="aset"
                                                       aria-describedby="basic-addon1" value="{{old('aset')}}" required>
                                            </div>
                                        </div>

                                        <div class="col-sm-10 col-sm-offset-1">
                                            <div class="form-group">
                                                <label>Omset <sub>(per bulan)</sub></label>
                                                <input type="text" class="form-control" placeholder="Dalam Rupiah (IDR)"
                                                       onkeypress="return isNumberKey(event)" aria-label="Username"
                                                       name="omset"
                                                       aria-describedby="basic-addon1" value="{{old('omset')}}"
                                                       required>
                                            </div>
                                        </div>

                                        <div class="col-sm-10 col-sm-offset-1">
                                            <div class="form-group">
                                                <label>Nomor Telepon</label>
                                                <input type="text" class="form-control" placeholder="Nomor telepon yang dapat dihubungi"
                                                       aria-label="Username" onkeypress="return isNumberKey(event)"
                                                       name="no_telp"
                                                       aria-describedby="basic-addon1" value="{{old('no_telp')}}" required>
                                            </div>
                                        </div>

                                        <div class="col-sm-10 col-sm-offset-1">
                                            <div class="form-group">
                                                <label>Deskripsi UMKM </label>
                                                <textarea name="desc" id="" required> {{old('desc')}} </textarea>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="tab-pane" id="address">
                                    <div class="row">
                                        <div class="col-sm-12">
                                            <h4 class="info-text"> Data Perizinan Beridirinya UMKM </h4>
                                        </div>
                                        <div class="col-sm-10 col-sm-offset-1">
                                            <div class="form-group">
                                                <label>Nomor Surat Izin Usaha Perdaganagan (SIUP)</label>
                                                <input type="text" class="form-control" placeholder="5h Avenue"
                                                       name="no_siup" value="{{old('no_siup')}}" required>
                                            </div>
                                        </div>

                                        <div class="col-sm-5 col-sm-offset-1">
                                            <div class="form-group">
                                                <label>Tanggal Surat Izin Usaha Perdaganagan (SIUP)</label>
                                                <input type="date" class="form-control" name="tgl_siup"
                                                       value="{{old('tgl_siup')}}" placeholder="" required>
                                            </div>
                                        </div>

                                        <div class="col-sm-5">
                                            <div class="form-group">
                                                <label>Tanggal Berakhir Surat Izin Usaha Perdaganagan (SIUP)</label>
                                                <input type="date" class="form-control" name="tgl_siup_exp"
                                                       value="{{old('tgl_siup_exp')}}" placeholder="" required>
                                            </div>
                                        </div>

                                        <div class="col-sm-10 col-sm-offset-1">
                                            <div class="form-group">
                                                <label>NPWP</label>
                                                <input type="text" class="form-control" name="npwp"
                                                       value="{{old('npwp')}}"
                                                       placeholder="sp99.999.999.9-999.999" required>
                                            </div>
                                        </div>

                                        <div class="col-sm-10 col-sm-offset-1">
                                            <div class="form-group">
                                                <label>Tanda Daftar Perusahaan (TDP)</label>
                                                <input type="text" class="form-control" placeholder="5h Avenue"
                                                       name="tdp" value="{{old('tdp')}}" required>
                                            </div>
                                        </div>

                                        <div class="col-sm-5 col-sm-offset-1">
                                            <div class="form-group">
                                                <label>Tanggal Tanda Daftar Perusahaan (TDP)</label>
                                                <input type="date" class="form-control" placeholder=""
                                                       name="tgl_tdp" value="{{old('tgl_tdp')}}" required>
                                            </div>
                                        </div>

                                        <div class="col-sm-5">
                                            <div class="form-group">
                                                <label>Tanggal Kadaluarsa Tanda Daftar Perusahaan</label>
                                                <input type="date" class="form-control" placeholder=""
                                                       name="tgl_tdp_exp" value="{{old('tgl_tdp_exp')}}" required>
                                            </div>
                                        </div>

                                        <div class="col-sm-5 col-sm-offset-1">
                                            <div class="form-group">
                                                <label>Nomor Izin Gangguan</label>
                                                <input type="text" class="form-control" placeholder=""
                                                       name="izin_ganguan" value="{{old('izin_ganguan')}}"
                                                       required>
                                            </div>
                                        </div>

                                        <div class="col-sm-5">
                                            <div class="form-group">
                                                <label>Tanggal Izin Gangguan</label>
                                                <input type="date" class="form-control" placeholder=""
                                                       name="tgl_izin_ganguan" value="{{old('tgl_izin_ganguan')}}"
                                                       required>
                                            </div>
                                        </div>

                                        <div class="col-sm-10 col-sm-offset-1">
                                            <div class="form-group">
                                                <label>Berkas Akta Notaris(.JPG .PNG .JPEG) <small>Maksimum 2 Mb</small></label>
                                                <input type="file" name="akta_notaris" id="" class="form-control" accept='.jpg, .jpeg, .png' required>
                                            </div>
                                        </div>

                                    </div>
                                </div>
                            </div>
                            <div class="wizard-footer height-wizard">
                                <div class="pull-right">
                                    <input type='button' class='btn btn-next btn-fill btn-info btn-wd btn-sm'
                                           name='next' value='Selanjutnya'/>
                                    <input type='submit' class='btn btn-finish btn-fill btn-warning btn-wd btn-sm'
                                           name='finish' value='Selesai'/>

                                </div>

                                <div class="pull-left">
                                    <input type='button' class='btn btn-previous btn-fill btn-default btn-wd btn-sm'
                                           name='previous' value='Sebelumnya'/>
                                </div>
                                <div class="clearfix"></div>
                            </div>

                        </form>
                    </div>
                </div> <!-- wizard container -->
            </div>
        </div><!-- end row -->
    </div> <!--  big container -->

    <div class="modal fade" id="termModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLongTitle"
         aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                    <h5 class="modal-title" id="exampleModalLongTitle">Kebijakan Penggunaan</h5>

                </div>
                <div class="modal-body">
                    ...
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-next btn-fill btn-info btn-wd btn-sm" data-dismiss="modal">Tutup</button>
                </div>
            </div>
        </div>
    </div>

    <div class="footer">
        <div class="container">
            Made <i class="fa fa-heart heart"></i> by <a href="http://pttati.co.id">PT TATI</a>.
        </div>
    </div>

</div>

</body>

<!--   Core JS Files   -->

<script src="{{asset('onetech/js/jquery-3.3.1.min.js')}}" type="text/javascript"></script>
<script src="{{asset('wizard/js/bootstrap.min.js')}}" type="text/javascript"></script>
<script src="{{asset('wizard/js/jquery.bootstrap.wizard.js')}}" type="text/javascript"></script>
<script src="{{asset('js/bootstrap-select/js/bootstrap-select.min.js')}}"></script>
<!--  Plugin for the Wizard -->
<script src="{{asset('wizard/js/gsdk-bootstrap-wizard.js')}}"></script>
<script src="{{asset('template/tinymce/tinymce.js')}}"></script>
<!--  More information about jquery.validate here: http://jqueryvalidation.org/	 -->
<script src="{{asset('wizard/js/jquery.validate.min.js')}}"></script>
@include('layouts.partial.alert')
<script>
    // This example requires the Places library. Include the libraries=places
    // parameter when you first load the API. For example:
    // <script src="https://maps.googleapis.com/maps/api/js?key=YOUR_API_KEY&libraries=places">

    function initMap() {
        var map = new google.maps.Map(document.getElementById('map'), {
            center: {lat: -33.8688, lng: 151.2195},
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
            map: map,
            anchorPoint: new google.maps.Point(0, -29)
        });

        autocomplete.addListener('place_changed', function() {
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
            radioButton.addEventListener('click', function() {
                autocomplete.setTypes(types);
            });
        }

        setupClickListener('changetype-all', []);
        setupClickListener('changetype-address', ['address']);
        setupClickListener('changetype-establishment', ['establishment']);
        setupClickListener('changetype-geocode', ['geocode']);

        document.getElementById('use-strict-bounds')
            .addEventListener('click', function() {
                console.log('Checkbox clicked! New state=' + this.checked);
                autocomplete.setOptions({strictBounds: this.checked});
            });
    }
</script>
<script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyBIljHbKjgtTrpZhEiHum734tF1tolxI68&libraries=places&callback=initMap"
        async defer></script>
<script>
    $('.my-select').selectpicker();

    function isNumberKey(evt) {
        var charCode = (evt.which) ? evt.which : event.keyCode
        if (charCode > 31 && (charCode < 48 || charCode > 57))
            return false;
        return true;
    }

    tinymce.init({selector: 'textarea'});

    $(".custom-file-input").on("change", function () {
        var fileName = $(this).val().split("\\").pop();
        $(this).siblings(".custom-file-label").addClass("selected").html(fileName);
    });
</script>
</html>
