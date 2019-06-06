@extends('layouts.dashboard')
@section('title','Detail Umkm')
@section('title_page')
    <h2>{{$data->nama}}
        <small>Detail {{$data->nama}}</small>
    </h2>
@endsection
@section('content')
    <div class="row clearfix">
        <div class="col-lg-12">
            <div class="card">
                <ul class="nav nav-tabs">
                    <li class="nav-item"><a class="nav-link active" data-toggle="tab" href="#mypost">Data Umkm</a></li>
                    <li class="nav-item"><a class="nav-link" data-toggle="tab" href="#timeline">Perizinan Umkm</a></li>

                </ul>
            </div>
            <div class="tab-content">
                <div role="tabpanel" class="tab-pane active" id="mypost">
                    <div class="card">
                        <div class="body">
                            <div class="row">
                                <div class="col-lg-6">
                                    <div class="card profile-header">
                                        <div class="body">
                                            <div class="row">
                                                <div class="col-lg-4 col-md-4 col-12">
                                                    <div class="profile-image float-md-right">
                                                        <img
                                                            src="{{asset( $data->avatar)}}" class="img-circle"
                                                            alt=""></div>
                                                </div>
                                                <div class="col-lg-8 col-md-8 col-12">
                                                    <h4 class="m-t-0 m-b-0"><strong> {{ $data->nama }} </strong></h4>
                                                    <span class="job_post">{{$data->nama_pemilik}}</span> <br>
                                                    <span class="job_post">{{$data->alamat}}</span>
                                                    <br>
                                                    <p>@foreach($data->jenis_id as $item)
                                                            <span class="badge badge-info">{{\App\Model\JenisUmkm::find($item)->name}}</span>
                                                        @endforeach
                                                    </p>
                                                    <div>
                                                        @if($data->is_verified == true)
                                                            <button class="btn btn-primary btn-round" readonly><i
                                                                    class="zmdi zmdi-check-all"></i>Umkm telah terverifikasi
                                                            </button>
                                                        @else
                                                            <button class="btn btn-danger btn-round" readonly><span
                                                                    class="zmdi zmdi-close"></span> Umkm belum terverifikasi
                                                            </button>
                                                        @endif
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-lg-6">
                                    <div id="map" style="min-height: 250px;width: 100%" class="img-raised"></div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-lg-12">
                                    <div class="form-group row mb-0">
                                        <label class="col-lg-2"><b>Nama Pemilik</b></label>
                                        <div class="col-lg-8">
                                            <p>{{$data->nama_pemilik}}</p>
                                        </div>
                                    </div>
                                    <div class="form-group row mb-0">
                                        <label class="col-lg-2"><b>NIK Pemilik</b></label>
                                        <div class="col-lg-8">
                                            <p>{{$data->nik_pemilik}}</p>
                                        </div>
                                    </div>
                                    <div class="form-group row mb-0">
                                        <label class="col-lg-2"><b>Tanggal Didirikan</b></label>
                                        <div class="col-lg-8">
                                            <?php \Carbon\Carbon::setLocale('ID')?>
                                            <p>{{\Carbon\Carbon::parse($data->tgl_berdiri)->format('d-M-Y')}}</p>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-lg-12">
                                    <label for=""><b>Tentang Umkm</b> </label>
                                    {!! $data->desc !!}
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                <div role="tabpanel" class="tab-pane" id="timeline">
                    <div class="card">
                        <div class="body">

                        </div>
                    </div>
                </div>

            </div>
        </div>
    </div>
@endsection

@push('script')
    <script>
        var map;
        function init() {
            map = new google.maps.Map(document.getElementById('map'), {
                center: {lat: {{$data->lat}}, lng: {{$data->long}}},
                zoom: 12
            });
            var marker = new google.maps.Marker({
                position: {lat: {{$data->lat}}, lng: {{$data->long}}},
                map: map});
        }
    </script>
    <script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyBIljHbKjgtTrpZhEiHum734tF1tolxI68&libraries=places&callback=init"
            async defer></script>

@endpush
