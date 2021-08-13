<!DOCTYPE html>
<html lang="en">
<head>
    <title>Login V17</title>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!--===============================================================================================-->
    <link rel="icon" type="image/png" href="{{asset('logins/images/icons/favicon.ico')}}"/>
    <!--===============================================================================================-->
    <link rel="stylesheet" type="text/css" href="{{asset('logins/vendor/bootstrap/css/bootstrap.min.css')}}">
    <!--===============================================================================================-->
    <link rel="stylesheet" type="text/css" href="{{asset('logins/fonts/font-awesome-4.7.0/css/font-awesome.min.css')}}">
    <!--===============================================================================================-->
    <link rel="stylesheet" type="text/css" href="{{asset('logins/fonts/Linearicons-Free-v1.0.0/icon-font.min.css')}}">
    <!--===============================================================================================-->
    <link rel="stylesheet" type="text/css" href="{{asset('logins/vendor/animate/animate.css')}}">
    <!--===============================================================================================-->
    <link rel="stylesheet" type="text/css" href="{{asset('logins/vendor/css-hamburgers/hamburgers.min.css')}}">
    <!--===============================================================================================-->
    <link rel="stylesheet" type="text/css" href="{{asset('logins/vendor/animsition/css/animsition.min.css')}}">
    <!--===============================================================================================-->
    <link rel="stylesheet" type="text/css" href="{{asset('logins/vendor/select2/select2.min.css')}}">
    <!--===============================================================================================-->
    <link rel="stylesheet" type="text/css" href="{{asset('logins/vendor/daterangepicker/daterangepicker.css')}}">
    <!--===============================================================================================-->
    <link rel="stylesheet" type="text/css" href="{{asset('logins/css/util.css')}}">
    <link rel="stylesheet" type="text/css" href="{{asset('logins/css/main.css')}}">
    <!--===============================================================================================-->
</head>
<body>

<div class="limiter">
    <div class="container-login100">
        <div class="wrap-login100">
            <form class="login100-form validate-form" method="POST" action="{{route('auth.login')}}">
                @csrf
					<span class="login100-form-title p-b-34">
						Silahkan Login
					</span>

                <div class="wrap-input100 rs1-wrap-input100 validate-input m-b-20" data-validate="Username tidak boleh kosong">
                    <input id="username" class="input100" type="username" name="username" placeholder="Username">
                    <span class="focus-input100"></span>
                </div>
                <div class="wrap-input100 rs2-wrap-input100 validate-input m-b-20" data-validate="Password tidak boleh kosong">
                    <input class="input100" type="password" name="password" placeholder="Password">
                    <span class="focus-input100"></span>
                </div>

                @if (session('gagal'))
                    <div class="alert alert-danger">
                        {{ session('gagal') }}
                    </div>
                @endif

                <div class="container-login100-form-btn">
                    <button class="login100-form-btn">
                        LOGIN
                    </button>
                </div>

                <div class="w-full text-center p-t-27 p-b-239">
                </div>


            </form>

            <div class="login100-more" style="background-image: url('logins/images/bg-01.jpg');"></div>
        </div>
    </div>
</div>



<div id="dropDownSelect1"></div>

<!--===============================================================================================-->
<script src="{{asset('logins/vendor/jquery/jquery-3.2.1.min.js')}}"></script>
<!--===============================================================================================-->
<script src="{{asset('logins/vendor/animsition/js/animsition.min.js')}}"></script>
<!--===============================================================================================-->
<script src="{{asset('logins/vendor/bootstrap/js/popper.js')}}"></script>
<script src="{{asset('logins/vendor/bootstrap/js/bootstrap.min.js')}}"></script>
<!--===============================================================================================-->
<script src="{{asset('logins/vendor/select2/select2.min.js')}}"></script>
<script>
    $(".selection-2").select2({
        minimumResultsForSearch: 20,
        dropdownParent: $('#dropDownSelect1')
    });
</script>
<!--===============================================================================================-->
<script src="{{asset('logins/vendor/daterangepicker/moment.min.js')}}"></script>
<script src="{{asset('logins/vendor/daterangepicker/daterangepicker.js')}}"></script>
<!--===============================================================================================-->
<script src="{{asset('logins/vendor/countdowntime/countdowntime.js')}}"></script>
<!--===============================================================================================-->
<script src="{{asset('logins/js/main.js')}}"></script>

</body>
</html>
