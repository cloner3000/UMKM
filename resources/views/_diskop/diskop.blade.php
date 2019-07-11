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
                                    src="{{asset( 'images/diskop.png')}}"
                                    alt=""></div>
                        </div>
                        <div class="col-lg-8 col-md-8 col-12">
                            <h4 class="m-t-0 m-b-0"><strong>{{ Auth::user()->username }} </strong></h4>
                            <span class="job_post">{{\Illuminate\Support\Facades\Auth::user()->email }}</span>
                            <br>
                            <p><span
                                    class="badge badge-info">{{ App\Model\Role::find(Auth::user()->role_id)->role_name }}</span>
                            </p>
                            <div>
                                @if(\Illuminate\Support\Facades\Auth::user()->role_id == 1)
                                @else
                                    @if($detail->status == 'Terverifikasi')
                                        <button class="btn btn-primary btn-round" readonly><i
                                                class="zmdi zmdi-check-all"></i>Akun
                                            anda telah terverifikasi
                                        </button>
                                    @else
                                        <button class="btn btn-danger btn-round" readonly><span
                                                class="zmdi zmdi-close"></span> Akun
                                            anda belum terverifikasi
                                        </button>
                                    @endif
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


    </script>
@endpush
