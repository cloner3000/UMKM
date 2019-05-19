<script>
    $(function() {
        @if(session('error_login'))
            $("#loginModal").modal('show');
            shakeModal();
            @elseif(session('error_register'))
            $('.loginBox').fadeOut('fast',function(){
                $('.registerBox').fadeIn('fast');
                $('.login-footer').fadeOut('fast',function(){
                    $('.register-footer').fadeIn('fast');
                });
                $('.modal-title').html('Register with');
            });
        $('.errorRegister').addClass('alert alert-danger').html('{{session('error_register')}}');
            setTimeout(function(){
                $('#loginModal').modal('show');
            }, 230);
        @endif
    });

    /*
     *
     * login-register modal
     * Autor: Creative Tim
     * Web-autor: creative.tim
     * Web script: http://creative-tim.com
     *
     */
    function showRegisterForm(){
        $('.loginBox').fadeOut('fast',function(){
            $('.registerBox').fadeIn('fast');
            $('.login-footer').fadeOut('fast',function(){
                $('.register-footer').fadeIn('fast');
            });
            $('.modal-title').html('Register with');
        });
        $('.error').removeClass('alert alert-danger').html('');

    }
    function showLoginForm(){
        $('#loginModal .registerBox').fadeOut('fast',function(){
            $('.loginBox').fadeIn('fast');
            $('.register-footer').fadeOut('fast',function(){
                $('.login-footer').fadeIn('fast');
            });

            $('.modal-title').html('Login with');
        });
        $('.error').removeClass('alert alert-danger').html('');
    }

    function openLoginModal(){
        showLoginForm();
        setTimeout(function(){
            $('#loginModal').modal('show');
        }, 230);

    }
    function openRegisterModal(){
        showRegisterForm();
        setTimeout(function(){
            $('#loginModal').modal('show');
        }, 230);
    }

    function loginAjax(){
        /*   Remove this comments when moving to server
        $.post( "/login", function( data ) {
                if(data == 1){
                    window.location.replace("/home");
                } else {
                     shakeModal();
                }
            });
        */

        /*   Simulate error message from the server   */
        shakeModal();
    }

    function shakeModal(){
        $('#loginModal .modal-dialog').addClass('shake');
        $('.error').addClass('alert alert-danger').html("Kombinasi email dan password salah");
        $('input[type="password"]').val('');
        setTimeout( function(){
            $('#loginModal .modal-dialog').removeClass('shake');
        }, 1000 );
    }


</script>
