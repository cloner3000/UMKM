<!doctype html>
<html lang="en">
<head>
    <meta charset="utf-8" />
    <link rel="apple-touch-icon" sizes="76x76" href="assets/img/apple-icon.png">
    <link rel="icon" href="{{asset('images/shop.ico')}}">
    <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1" />
    <title>Registrasi UMKM</title>

    <meta content='width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=0' name='viewport' />
    <meta name="viewport" content="width=device-width" />

    <!--     Fonts and icons     -->
    <link href="http://netdna.bootstrapcdn.com/font-awesome/4.4.0/css/font-awesome.css" rel="stylesheet">

    <!-- CSS Files -->
    <link href="{{asset('wizard/css/bootstrap.min.css')}}" rel="stylesheet" />
    <link href="{{asset('wizard/css/gsdk-bootstrap-wizard.css')}}" rel="stylesheet" />


</head>

<body>
<div class="image-container set-full-height" style="background-color: #F6F6F6">
    <!--   Creative Tim Branding   -->

    <!--  Made With Get Shit Done Kit  -->
    <a href="http://demos.creative-tim.com/get-shit-done/index.html?ref=get-shit-done-bootstrap-wizard" class="made-with-mk">
        <div class="brand">GK</div>
        <div class="made-with">Made with <strong>GSDK</strong></div>
    </a>

    <!--   Big container   -->
    <div class="container">
        <div class="row">
            <div class="col-sm-8 col-sm-offset-2">

                <!--      Wizard container        -->
                <div class="wizard-container">

                    <div class="card wizard-card" data-color="blue" id="wizardProfile">
                        <form action="" method="" enctype="multipart/form-data">
                            <!--        You can switch ' data-color="orange" '  with one of the next bright colors: "blue", "green", "orange", "red"          -->

                            <div class="wizard-header">
                                <h3>
                                    <b>Registrasi</b> UMKM  <br>
                                    <small>This information will let us know more about you.</small>
                                </h3>
                            </div>

                            {{--Tab Menu--}}
                            <div class="wizard-navigation">
                                <ul>
                                    <li><a href="#about" data-toggle="tab">Data Akun</a></li>
                                    <li><a href="#account" data-toggle="tab">Data UMKM</a></li>
                                    <li><a href="#address" data-toggle="tab">Verifikasi Akun</a></li>
                                </ul>

                            </div>

                            <div class="tab-content">
                                <div class="tab-pane" id="about">
                                    <div class="row">
                                        <h4 class="info-text"> Let's start with the basic information (with validation)</h4>
                                        <div class="col-sm-4 col-sm-offset-1">
                                            <div class="picture-container">
                                                <div class="picture">
                                                    <img src="assets/img/default-avatar.png" class="picture-src" id="wizardPicturePreview" title=""/>
                                                    <input type="file" name="avatar" id="wizard-picture">
                                                </div>
                                                <h6>Logo UMKM<small>(Bila Ada)</small></h6>
                                            </div>
                                        </div>
                                        <div class="col-sm-6">
                                            <div class="form-group">
                                                <label>Nama UMKM<small>(required)</small></label>
                                                <input name="username" type="text" class="form-control" placeholder="PT/CV..." required>
                                            </div>
                                            <div class="form-group">
                                                <label>Email <small>(required)</small></label>
                                                <input name="email" type="email" class="form-control" placeholder="email@example.com" required>
                                            </div>
                                        </div>
                                        <div class="col-sm-10 col-sm-offset-1">
                                            <div class="form-group">
                                                <label>Password <small>(required)</small></label>
                                                <input name="password" type="password" class="form-control" required>
                                            </div>
                                            <div class="form-group">
                                                <label>Konfirmasi Password <small>(required)</small></label>
                                                <input name="confirm_pass" type="password" class="form-control" required>
                                            </div>
                                            <div class="form-check">
                                                <input type="checkbox" name="term" id="term" required>
                                                <label for="term">Saya telah membaca dan menyetujui
                                                    <a href="javascript:void(0)" data-toggle="modal" data-target="#termModal" style="text-decoration: none;color: #60bafd;">
                                                        Aturan Penggunaan</a> E-UMKM</label>
                                            </div>
                                        </div>

                                    </div>
                                </div>
                                <div class="tab-pane" id="account">
                                    <h4 class="info-text"> What are you doing? (checkboxes) </h4>
                                    <div class="row">

                                        <div class="col-sm-10 col-sm-offset-1">
                                            <div class="col-sm-4">
                                                <div class="choice" data-toggle="wizard-checkbox">
                                                    <input type="checkbox" name="jobb" value="Design">
                                                    <div class="icon">
                                                        <i class="fa fa-pencil"></i>
                                                    </div>
                                                    <h6>Design</h6>
                                                </div>
                                            </div>
                                            <div class="col-sm-4">
                                                <div class="choice" data-toggle="wizard-checkbox">
                                                    <input type="checkbox" name="jobb" value="Code">
                                                    <div class="icon">
                                                        <i class="fa fa-terminal"></i>
                                                    </div>
                                                    <h6>Code</h6>
                                                </div>

                                            </div>
                                            <div class="col-sm-4">
                                                <div class="choice" data-toggle="wizard-checkbox">
                                                    <input type="checkbox" name="jobb" value="Develop">
                                                    <div class="icon">
                                                        <i class="fa fa-laptop"></i>
                                                    </div>
                                                    <h6>Develop</h6>
                                                </div>

                                            </div>
                                        </div>

                                    </div>
                                </div>
                                <div class="tab-pane" id="address">
                                    <div class="row">
                                        <div class="col-sm-12">
                                            <h4 class="info-text"> Are you living in a nice area? </h4>
                                        </div>
                                        <div class="col-sm-7 col-sm-offset-1">
                                            <div class="form-group">
                                                <label>Street Name</label>
                                                <input type="text" class="form-control" placeholder="5h Avenue">
                                            </div>
                                        </div>
                                        <div class="col-sm-3">
                                            <div class="form-group">
                                                <label>Street Number</label>
                                                <input type="text" class="form-control" placeholder="242">
                                            </div>
                                        </div>
                                        <div class="col-sm-5 col-sm-offset-1">
                                            <div class="form-group">
                                                <label>City</label>
                                                <input type="text" class="form-control" placeholder="New York...">
                                            </div>
                                        </div>
                                        <div class="col-sm-5">
                                            <div class="form-group">
                                                <label>Country</label><br>
                                                <select name="country" class="form-control">
                                                    <option value="Afghanistan"> Afghanistan </option>
                                                    <option value="Albania"> Albania </option>
                                                    <option value="Algeria"> Algeria </option>
                                                    <option value="American Samoa"> American Samoa </option>
                                                    <option value="Andorra"> Andorra </option>
                                                    <option value="Angola"> Angola </option>
                                                    <option value="Anguilla"> Anguilla </option>
                                                    <option value="Antarctica"> Antarctica </option>
                                                    <option value="...">...</option>
                                                </select>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="wizard-footer height-wizard">
                                <div class="pull-right">
                                    <input type='button' class='btn btn-next btn-fill btn-info btn-wd btn-sm' name='next' value='Next' />
                                    <input type='button' class='btn btn-finish btn-fill btn-warning btn-wd btn-sm' name='finish' value='Finish' />

                                </div>

                                <div class="pull-left">
                                    <input type='button' class='btn btn-previous btn-fill btn-default btn-wd btn-sm' name='previous' value='Previous' />
                                </div>
                                <div class="clearfix"></div>
                            </div>

                        </form>
                    </div>
                </div> <!-- wizard container -->
            </div>
        </div><!-- end row -->
    </div> <!--  big container -->

    <div class="modal fade" id="termModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLongTitle" aria-hidden="true">
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
                    <button type="button" class="btn btn-danger" data-dismiss="modal">Tutup</button>
                </div>
            </div>
        </div>
    </div>

    <div class="footer">
        <div class="container">
            Made with <i class="fa fa-heart heart"></i> by <a href="http://www.creative-tim.com">Creative Tim</a>. Free download <a href="http://www.creative-tim.com/product/bootstrap-wizard">here.</a>
        </div>
    </div>

</div>

</body>

<!--   Core JS Files   -->

<script src="{{asset('wizard/js/jquery-2.2.4.min.js')}}" type="text/javascript"></script>
<script src="{{asset('wizard/js/bootstrap.min.js')}}" type="text/javascript"></script>
<script src="{{asset('wizard/js/jquery.bootstrap.wizard.js')}}" type="text/javascript"></script>

<!--  Plugin for the Wizard -->
<script src="{{asset('wizard/js/gsdk-bootstrap-wizard.js')}}"></script>

<!--  More information about jquery.validate here: http://jqueryvalidation.org/	 -->
<script src="{{asset('wizard/js/jquery.validate.min.js')}}"></script>
<script>

</script>
</html>
