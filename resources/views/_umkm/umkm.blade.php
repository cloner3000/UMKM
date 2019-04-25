@extends('layouts.dashboard')
@section('title','Setting Account')
@section('title_page')
    <h2>Setting Akun
        <small>sunting informasi Umkm</small>
    </h2>
@endsection
@section('content')

    <div class="row clearfix">
        <div class="col-xl-6 col-lg-7 col-md-12">
            <div class="card profile-header">
                <div class="body">
                    <div class="row">
                        <div class="col-lg-4 col-md-4 col-12">
                            <div class="profile-image float-md-right">
                                <img
                                    src="{{asset( App\Model\Umkm::where('user_id',Auth::user()->id)->firstOrFail()->avatar )}}"
                                    alt=""></div>
                        </div>
                        <div class="col-lg-8 col-md-8 col-12">
                            <h4 class="m-t-0 m-b-0"><strong>{{ Auth::user()->username }} </strong></h4>
                            <span class="job_post">{{$umkm->nama_pemilik }}</span>
                            <br>
                            <p><span
                                    class="badge badge-info">{{ App\Model\Role::find(Auth::user()->role_id)->role_name }}</span>
                                <span class="badge badge-info">{{$jenis->name}}</span></p>
                            <div>
                                @if(App\Model\Umkm::where('user_id',Auth::user()->id)->firstOrFail()->is_verified == true)
                                    <button class="btn btn-primary btn-round" readonly><i
                                            class="zmdi zmdi-check-all"></i>UMKM
                                        anda telah terverifikasi
                                    </button>
                                @else
                                    <button class="btn btn-danger btn-round" readonly><span
                                            class="zmdi zmdi-close"></span> UMKM
                                        anda belum terverifikasi
                                    </button>
                                @endif

                            </div>

                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-xl-6 col-lg-5 col-md-12">
            <div role="tabpanel" class="tab-pane">
                <div class="card">
                    <div class="header">
                        <h2><strong>Account</strong> Settings</h2>
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
                            <button type="submit" class="btn btn-primary btn-round">Submit</button>
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
                            <form>
                                <div class="row">
                                    <div class="col-lg-6">
                                        <div class="form-group">
                                            <label>Pemilik Umkm</label>
                                            <input type="text" class="form-control" placeholder="Nama Lengkap Pemilik"
                                                   name="nama_pemilik">
                                        </div>
                                    </div>
                                    <div class="col-lg-6">
                                        <div class="form-group">
                                            <label>NIK Pemilik UMKM</label>
                                            <input type="text" class="form-control" name="nik_pemilik"
                                                   placeholder="Pastikan 16 Digit Angka"
                                                   onkeypress="return isNumberKey(event)">
                                        </div>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label>Logo UMKM</label>
                                    <div class="row">
                                        <div class="col-md-11">
                                            <input type="file" class="form-control">
                                        </div>
                                        <div class="col-md-1">
                                            <button class="btn btn-primary btn-icon  btn-icon-mini btn-round"
                                                    onclick="return swalImage()" type="button">
                                                <i class="zmdi zmdi-image-alt"></i>
                                            </button>
                                        </div>
                                    </div>

                                </div>
                                <div class="form-group">
                                    <div class="row">
                                        <div class="col-lg-8">
                                            <label for="">Jenis UMKM</label>
                                            <select class="form-control" name="janis[]" multiple>
                                                @foreach($jenis_all as $item)
                                                    <option value="{{$item->id}}">{{$item->name}}</option>
                                                @endforeach
                                            </select>
                                        </div>
                                        <div class="col-lg-4">
                                            <label for="">Tanggal berdiri UMKM</label>
                                            <input type="date" class="form-control" name="tgl_berdiri" id="">
                                        </div>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label for="">Deskripsi UMKM</label>
                                    <textarea name="desc" id="" cols="30" rows="5" placeholder="Description"
                                              class="form-control no-resize tiny"  required></textarea>
                                </div>
                                <button class="btn btn-primary btn-round">Save Changes</button>
                            </form>
                        </div>
                    </div>
                </div>

                <div role="tabpanel" class="tab-pane" id="usersettings">
                    <div class="card">
                        <div class="header">
                            <h2><strong>Security</strong> Settings</h2>
                        </div>
                        <div class="body">
                            <div class="form-group">
                                <input type="text" class="form-control" placeholder="Username">
                            </div>
                            <div class="form-group">
                                <input type="password" class="form-control" placeholder="Current Password">
                            </div>
                            <div class="form-group">
                                <input type="password" class="form-control" placeholder="New Password">
                            </div>
                            <button class="btn btn-info btn-round">Save Changes</button>
                        </div>
                    </div>
                    <div class="card">
                        <div class="header">
                            <h2><strong>Account</strong> Settings</h2>
                        </div>
                        <div class="body">
                            <div class="row clearfix">
                                <div class="col-lg-6 col-md-12">
                                    <div class="form-group">
                                        <input type="text" class="form-control" placeholder="First Name">
                                    </div>
                                </div>
                                <div class="col-lg-6 col-md-12">
                                    <div class="form-group">
                                        <input type="text" class="form-control" placeholder="Last Name">
                                    </div>
                                </div>
                                <div class="col-lg-4 col-md-12">
                                    <div class="form-group">
                                        <input type="text" class="form-control" placeholder="City">
                                    </div>
                                </div>
                                <div class="col-lg-4 col-md-12">
                                    <div class="form-group">
                                        <input type="text" class="form-control" placeholder="E-mail">
                                    </div>
                                </div>
                                <div class="col-lg-4 col-md-12">
                                    <div class="form-group">
                                        <input type="text" class="form-control" placeholder="Country">
                                    </div>
                                </div>
                                <div class="col-md-12">
                                    <div class="form-group">
                                        <textarea rows="4" class="form-control no-resize"
                                                  placeholder="Address Line 1"></textarea>
                                    </div>
                                </div>
                                <div class="col-md-12">
                                    <div class="checkbox">
                                        <input id="procheck1" type="checkbox">
                                        <label for="procheck1">Profile Visibility For Everyone</label>
                                    </div>
                                    <div class="checkbox">
                                        <input id="procheck2" type="checkbox">
                                        <label for="procheck2">New task notifications</label>
                                    </div>
                                    <div class="checkbox">
                                        <input id="procheck3" type="checkbox">
                                        <label for="procheck3">New friend request notifications</label>
                                    </div>
                                </div>
                                <div class="col-md-12">
                                    <button class="btn btn-primary btn-round">Save Changes</button>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

    </div>
@endsection
@push('script')
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
        $(document).ready(function () {
            $('.select2').select2();
        });

        function swalImage() {
            swal({
                title: 'Logo UMKM saat ini',
                imageUrl: '{{asset($umkm->avatar)}}',
            })
        }
    </script>
@endpush
