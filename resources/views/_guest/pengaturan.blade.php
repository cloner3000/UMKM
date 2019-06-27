@extends('layouts.main')
@push('main_css')
    <link rel="stylesheet" type="text/css" href="{{asset('onetech/styles/cart_responsive.css')}}">
    <link rel="stylesheet" type="text/css" href="{{asset('onetech/styles/cart_styles.css')}}">
    <style>
        #file_target img {
            width: 100%;
            height: 450px;
            object-fit: cover;
        }

        #venue_target img {
            width: 100%;
            height: 200px;
            object-fit: cover;
        }

        .input-group-addon > .material-icons {
            font-size: 1.3rem;
        }

        #venue_map {
            width: 100%;
            height: 200px;
            background-color: lavender;
            border-radius: 4px;
        }
    </style>
@endpush
@section('main_title','Pengaturan Akun')
@section('main_content')

    <div class="cart_section">
        <div class="container">
            <div class="row">
                <div class="col-lg-11 offset-lg-1">
                    <div class="cart_container">
                        <div class="cart_title"><span class="fa fa-user"></span> Data
                            Diri {{\Illuminate\Support\Facades\Auth::user()->username}}</div>
                        <div class="cart_items">
                            <div class="row">
                                <div class="col-lg-4">
                                    <div class="card" style=" box-shadow: 0px 5px 5px rgba(0,0,0,0.1);">
                                        <img class="card-img-top" id="blah"
                                             src="{{asset('images/Flat Blue-900x900.jpg')}}" alt="Card image cap">
                                        <div class="card-body">
                                            <h5 class="card-title">{{\Illuminate\Support\Facades\Auth::user()->username}}</h5>
                                            <div class="input-group mb-3">
                                                <input type="file" class="form-control test"
                                                       placeholder="Recipient's username"
                                                       aria-label="Recipient's username" aria-describedby="basic-addon2"
                                                       id="imgInp" lang="id" accept='.jpg, .jpeg, .png'
                                                >
                                                <div class="input-group-append">
                                                    <button class="btn btn-outline-secondary" type="button">upload
                                                    </button>
                                                </div>
                                            </div>

                                            <p class="card-text">Maksimum foto dengan ukuran 2Mb, dengan format .Png
                                                .Jpg . Jpeg</p>
                                        </div>
                                        <div class="card-footer">
                                            <small class="text-muted">Last updated 3 mins ago</small>
                                        </div>
                                    </div>
                                    <br>
                                    <div class="card">
                                        <div class="card-body">
                                            <button type="button" class="btn btn-primary btn-lg btn-block"
                                                    onclick="openModal()">
                                                <span class="fa fa-key"></span> Ubah kata sandi
                                            </button>
                                        </div>
                                    </div>
                                </div>


                                <div class="col-lg-7">
                                    <form>
                                        <div class='col-sm-12'>
                                            <div class='card'>
                                                <div class='card-header '>
                                                    <span class="fa fa-cogs"> Sunting Data Diri</span>
                                                </div>
                                                <div class='card-body'>
                                                    <div class='form-group'>
                                                        <label for='event_name'>Name</label>
                                                        <input class='form-control' id='event_name' type='text'>
                                                        <small class='form-text text-muted' id='emailHelp'>
                                                            6 characters minimum.
                                                        </small>
                                                    </div>
                                                    <div class='form-row'>
                                                        <div class='col-sm-6'>
                                                            <div class='form-group'>
                                                                <label for='event_startdate'>Starts at</label>
                                                                <input class='form-control' id='event_category'
                                                                       type='text'>
                                                            </div>
                                                        </div>
                                                        <div class='col-sm-6'>
                                                            <div class='form-group'>
                                                                <label for='event_enddate'>Ends at</label>
                                                                <input class='form-control' id='event_tags' type='text'>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class='form-group'>
                                                        <label for='event_name'>Gender</label>
                                                        <br>
                                                        <div class="row">
                                                            <div class="col-sm-2">
                                                            <label class="radio-inline">
                                                                <input type="radio" name="optradio">  Pria
                                                            </label>
                                                            </div>
                                                            <div class="col-sm-2">
                                                            <label class="radio-inline">
                                                                <input type="radio" name="optradio">  Wanita
                                                            </label>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class='form-group'>
                                                        <label for='event_description'>Description</label>
                                                        <textarea class='form-control' id='event_description'
                                                                  placeholder='Write something about your event'
                                                                  rows='4'></textarea>
                                                    </div>
                                                    <div class='form-group'>
                                                        <label class='col-form-label' for='venue_address'>Alamat tinggal
                                                            saat ini </label>
                                                        <input class='form-control' id='pac-input' name='alamat'
                                                               placeholder='Jl. Aji Baskoro.....' type='text'>
                                                        <input type="radio" name="type" id="changetype-all" checked="checked" hidden>
                                                    </div>
                                                    <div class='form-row'>
                                                        <div class='form-group col-md-12'>
                                                            <label>Tampak Map</label>
                                                            <div id='venue_map'></div>
                                                        </div>
                                                        <input accept='.jpg, .jpeg, .png' class='form-control'
                                                               id='venue_image' type='file'>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>

                                        <div class='form-group d-flex justify-content-end mt-3'>
                                            <button type="submit"
                                                    class='btn btn-primary d-flex align-items-center float-right'>
                                                Simpan
                                            </button>
                                        </div>
                                    </form>
                                </div>
                            </div>

                        </div>
                        <!-- Order Total -->

                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- Modal Password -->
    <div class="modal fade" id="passModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle"
         aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered" role="document">
            <form action="{{route('user.update')}}" method="post">
                @csrf
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="exampleModalLongTitle">Ubah Password</h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <div class="modal-body">
                        <div class="form-group">
                            <label for="exampleInputEmail1">Kata sandi lama</label>
                            <input type="password" class="form-control" id="exampleInputEmail1" name="old_pass"
                                   aria-describedby="emailHelp" placeholder="Kata sandi lama anda" required>
                        </div>
                        <div class="form-group">
                            <label for="exampleInputPassword1">Kata sandi baru</label>
                            <input type="password" class="form-control" id="exampleInputPassword1"
                                   placeholder="Kata sandi baru" name="new_pass" required>
                            <small id="emailHelp" class="form-text text-muted">Minimum menggunakan 8 karakter
                            </small>
                        </div>

                        <div class="form-group">
                            <label for="exampleInputPassword1">Ketik ulang kata sandi baru</label>
                            <input type="password" class="form-control" id="exampleInputPassword1" name="confirm_pass"
                                   placeholder="ketik lagi sandi baru anda" required>
                        </div>


                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-danger" data-dismiss="modal">Tutup</button>
                        <button type="submit" class="btn btn-primary">Simpan</button>
                    </div>
                </div>
            </form>
        </div>
    </div>

@endsection
@push('main_scipt')
    <script>
        // This example requires the Places library. Include the libraries=places
        // parameter when you first load the API. For example:
        // <script src="https://maps.googleapis.com/maps/api/js?key=YOUR_API_KEY&libraries=places">

        function initMap() {
            var map = new google.maps.Map(document.getElementById('venue_map'), {
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
                   swal('Oops!!',"Maaf sistem tidak menemukan alamat : '" + place.name + "'",'error');
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
    <script src="{{asset('onetech/js/cart_custom.js')}}"></script>

    <script>

        function openModal() {
            $("#passModal").modal('show');
        }

        function readURL(input) {
            if (input.files && input.files[0]) {
                var reader = new FileReader();

                reader.onload = function (e) {
                    $('#blah').attr('src', e.target.result);
                }

                reader.readAsDataURL(input.files[0]);
            }
        }

        $("#imgInp").change(function () {
            readURL(this);
        });
    </script>
@endpush
