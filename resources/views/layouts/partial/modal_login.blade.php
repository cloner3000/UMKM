
<div class="modal fade login" id="loginModal">
    <div class="modal-dialog login animated">
        <div class="modal-content">
            <div class="modal-header">
                <h4 class="modal-title">Masuk</h4>
                <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
            </div>
            <div class="modal-body">
                <div class="box">
                    <div class="content">
                        <div class="social">
                            <a class="circle github" href="/auth/github">
                                <i class="fa fa-github fa-fw"></i>
                            </a>
                            <a id="google_login" class="circle google" href="/auth/google_oauth2">
                                <i class="fa fa-google"></i>
                            </a>
                            <a id="facebook_login" class="circle facebook" href="/auth/facebook">
                                <i class="fa fa-facebook fa-fw"></i>
                            </a>
                        </div>
                        <div class="division">
                            <div class="line l"></div>
                            <span>or</span>
                            <div class="line r"></div>
                        </div>
                        <div class="error"></div>
                        <div class="form loginBox">
                            <form method="POST" action="{{ route('login') }}" accept-charset="UTF-8">
                                @csrf
                                <input id="email" class="form-control" type="text" placeholder="Email" name="email" required>
                                <input id="password" class="form-control" type="password" placeholder="Password"
                                       name="password" required>
                                <input class="btn btn-default btn-login" type="submit" value="Login">
                            </form>
                        </div>
                    </div>
                </div>

                <div class="box">
                    <div class="content registerBox" style="display:none;">
                        <div class="errorRegister"></div>
                        <div class="form">
                            <form method="post" data-remote="true" action="{{route('auth.guest')}}">
                                @csrf
                                <input id="email" class="form-control" type="text" placeholder="Username" name="username">
                                <input id="email" class="form-control" type="text" placeholder="Email" name="email">
                                <input id="password" class="form-control" type="password" placeholder="Password"
                                       name="password">
                                <input type="hidden" name="isGuest" value="true">
                                <input id="password_confirmation" class="form-control" type="password"
                                       placeholder="Repeat Password" name="password_confirmation">
                                <input class="btn btn-default btn-register" type="submit" value="Create account"
                                       name="commit">
                            </form>
                        </div>
                    </div>
                </div>
            </div>
            <div class="modal-footer">
                <div class="forgot login-footer">
                            <span>Looking to
                                 <a href="javascript: showRegisterForm();">create an account</a>
                            ?</span>
                </div>
                <div class="forgot register-footer" style="display:none">
                    <span>Already have an account?</span>
                    <a href="javascript: showLoginForm();">Login</a>
                </div>
            </div>
        </div>
    </div>
</div>

