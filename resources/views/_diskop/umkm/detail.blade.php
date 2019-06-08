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
                                        <label class="col-lg-3"><b>Nama Pemilik</b></label>
                                        <div class="col-lg-8">
                                            <p>{{$data->nama_pemilik}}</p>
                                        </div>
                                    </div>
                                    <div class="form-group row mb-0">
                                        <label class="col-lg-3"><b>NIK Pemilik</b></label>
                                        <div class="col-lg-8">
                                            <p>{{$data->nik_pemilik}}</p>
                                        </div>
                                    </div>
                                    <div class="form-group row mb-0">
                                        <label class="col-lg-3"><b>Tanggal Didirikan</b></label>
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
                            <div class="row">
                                <div class="col-lg-12">
                                    <div class="form-group row mb-0">
                                        <label class="col-lg-3"><b>Jumlah Aset</b></label>
                                        <div class="col-lg-8">
                                            <p>Rp. {{$data->aset}}</p>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-lg-12">
                                    <div class="form-group row mb-0">
                                        <label class="col-lg-3"><b>Omset Umkm</b></label>
                                        <div class="col-lg-8">
                                            <p>Rp. {{$data->omset}}</p>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-lg-12">
                                    <div class="form-group row mb-0">
                                        <label class="col-lg-3"><b>Nomor SIUP</b></label>
                                        <div class="col-lg-8">
                                            <p>{{$data->siup}}</p>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-lg-12">
                                    <div class="form-group row mb-0">
                                        <label class="col-lg-3"><b>Tanggal SIUP keluarkan</b></label>
                                        <div class="col-lg-8">
                                            <p>{{\Carbon\Carbon::parse($data->tgl_siup)->format('d-M-Y') }}</p>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-lg-12">
                                    <div class="form-group row mb-0">
                                        <label class="col-lg-3"><b>Tanggal SIUP berakhir</b></label>
                                        <div class="col-lg-8">
                                            <p>{{\Carbon\Carbon::parse($data->tgl_siup_exp)->format('d-M-Y')}}</p>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-lg-12">
                                    <div class="form-group row mb-0">
                                        <label class="col-lg-3"><b>NPWP</b></label>
                                        <div class="col-lg-8">
                                            <p>{{$data->npwp}}</p>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-lg-12">
                                    <div class="form-group row mb-0">
                                        <label class="col-lg-3"><b>TDP</b></label>
                                        <div class="col-lg-8">
                                            <p>{{$data->tdp}}</p>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-lg-12">
                                    <div class="form-group row mb-0">
                                        <label class="col-lg-3"><b>Tanggal TDP keluarkan</b></label>
                                        <div class="col-lg-8">
                                            <p>{{\Carbon\Carbon::parse($data->tgl_tdp)->format('d-M-Y') }}</p>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-lg-12">
                                    <div class="form-group row mb-0">
                                        <label class="col-lg-3"><b>Tanggal TDP berakhir</b></label>
                                        <div class="col-lg-8">
                                            <p>{{\Carbon\Carbon::parse($data->tgl_tdp_exp)->format('d-M-Y') }}</p>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-lg-12">
                                    <div class="form-group row mb-0">
                                        <label class="col-lg-3"><b>Izin Gangguan</b></label>
                                        <div class="col-lg-8">
                                            <p>{{$data->izin_ganguan }}</p>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-lg-12">
                                    <div class="form-group row mb-0">
                                        <label class="col-lg-3"><b>Tanggal Izin Ganguuan</b></label>
                                        <div class="col-lg-8">
                                            <p>{{\Carbon\Carbon::parse($data->tgl_izin_ganguan)->format('d-M-Y') }}</p>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-lg-12">
                                    <div class="form-group row mb-0">
                                        <label class="col-lg-3"><b>Akta Notaris</b></label>
                                        <div class="col-lg-8">
                                            <button class="btn btn-warning btn-icon btn-round" data-toggle="tooltip"
                                                    type="button"
                                                    title="Lihat Gambar"
                                                    onclick="modal('{{asset($data->akta_notaris)}}','File Akta Notaris')">
                                                <i class="zmdi zmdi-image"></i>
                                            </button>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
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
                    <h5 class="title" id="largeModalLabel"></h5>
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

        var map;
        function init() {
            map = new google.maps.Map(document.getElementById('map'), {
                center: {lat: {{$data->lat}}, lng: {{$data->long}}},
                zoom: 12
            });
            var marker = new google.maps.Markeur({
                position: {lat: {{$data->lat}}, lng: {{$data->long}}},
                map: map});
        }
    </script>
    <script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyBIljHbKjgtTrpZhEiHum734tF1tolxI68&libraries=places&callback=init"
            async defer></script>

@endpush
