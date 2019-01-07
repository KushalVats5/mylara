<!doctype html>
<html class="no-js" lang="en">

<head>
    <meta charset="utf-8">
    <meta http-equiv="x-ua-compatible" content="ie=edge">
    <title>Dashboard V.2 | jeweler - Material Admin Template</title>
    <meta name="description" content="">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!-- favicon
        ============================================ -->
    <link rel="shortcut icon" type="image/x-icon" href="{{ URL::asset('master/img/favicon.ico') }}">
    <!-- Google Fonts
        ============================================ -->
    <link href="https://fonts.googleapis.com/css?family=Play:400,700" rel="stylesheet">
    <!-- Bootstrap CSS
        ============================================ -->
    <link rel="stylesheet" href="{{ URL::asset('master/css/bootstrap.min.css') }}">
    <!-- Bootstrap CSS
        ============================================ -->
    <link rel="stylesheet" href="{{ URL::asset('master/css/font-awesome.min.css') }}">
    <!-- owl.carousel CSS
        ============================================ -->
    <link rel="stylesheet" href="{{ URL::asset('master/css/owl.carousel.css') }}">
    <link rel="stylesheet" href="{{ URL::asset('master/css/owl.theme.css') }}">
    <link rel="stylesheet" href="{{ URL::asset('master/css/owl.transitions.css') }}">
    <!-- animate CSS
        ============================================ -->
    <link rel="stylesheet" href="{{ URL::asset('master/css/animate.css') }}">
    <!-- normalize CSS
        ============================================ -->
    <link rel="stylesheet" href="{{ URL::asset('master/css/normalize.css') }}">
    <!-- meanmenu icon CSS
        ============================================ -->
    <link rel="stylesheet" href="{{ URL::asset('master/css/meanmenu.min.css') }}">
    <!-- main CSS
        ============================================ -->
    <link rel="stylesheet" href="{{ URL::asset('master/css/main.css') }}">
    <!-- morrisjs CSS
        ============================================ -->
    <link rel="stylesheet" href="{{ URL::asset('master/css/morrisjs/morris.css') }}">
    <!-- mCustomScrollbar CSS
        ============================================ -->
    <link rel="stylesheet" href="{{ URL::asset('master/css/scrollbar/jquery.mCustomScrollbar.min.css') }}">
    <!-- metisMenu CSS
        ============================================ -->
    <link rel="stylesheet" href="{{ URL::asset('master/css/metisMenu/metisMenu.min.css') }}">
    <link rel="stylesheet" href="{{ URL::asset('master/css/metisMenu/metisMenu-vertical.css') }}">
    <!-- calendar CSS
        ============================================ -->
    <link rel="stylesheet" href="{{ URL::asset('master/css/calendar/fullcalendar.min.css') }}">
    <link rel="stylesheet" href="{{ URL::asset('master/css/calendar/fullcalendar.print.min.css') }}">
    <!-- style CSS
        ============================================ -->
    <link rel="stylesheet" href="{{ URL::asset('master/style.css') }}">
    <!-- responsive CSS
        ============================================ -->
    <link rel="stylesheet" href="{{ URL::asset('master/css/responsive.css') }}">
    <!-- modernizr JS
        ============================================ -->
    <script src="{{ URL::asset('master/js/vendor/modernizr-2.8.3.min.js') }}"></script>
</head>


<body class="login-body" style=" background-image: url({{ URL::asset('template/img/slides/flexslider/2.jpg') }});
    overflow: hidden;">
    <!--[if lt IE 8]>
            <p class="browserupgrade">You are using an <strong>outdated</strong> browser. Please <a href="http://browsehappy.com/">upgrade your browser</a> to improve your experience.</p>
        <![endif]-->

    <div class="color-line"></div>
    <div class="container-fluid">
        <div class="row">
            <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                <div class="back-link back-backend">
                    <a href="{{ url('/') }}" class="btn btn-primary">Back To Site</a>
                </div>
            </div>
        </div>
    </div>
    <div class="container-fluid">
        <div class="row">
            <div class="col-lg-4 col-md-4 col-sm-4 col-xs-12"></div>
            <div class="col-md-4 col-md-4 col-sm-4 col-xs-12">
                <div class="text-center m-b-md custom-login">
                    <h3 style="color: #fff;">PLEASE LOGIN TO Site Admin</h3>
                    <p><img src="{{ URL::asset('master/img/logo/vtechinfosystems-logo.png') }}" alt="" width="300" height="auto"></p>
                </div>
                <div class="hpanel">
                    <div class="panel-body">
                        <form action="{{ url('auth/adminLogin') }}" method ="post" id="loginForm">
                            <div class="form-group">
                                <label class="control-label" for="username">Username</label>
                                <input type="text" placeholder="example@gmail.com" title="Please enter you username" required="" value="{{ old('email') }}" name="email" id="username" class="form-control">
                                <span class="help-block small">Your unique email to app</span>
                            </div>
                            <div class="form-group">
                                <label class="control-label" for="password">Password</label>
                                <input type="password" title="Please enter your password" placeholder="******" required="" value="{{ old('psw') }}" name="psw" id="password" class="form-control">
                                <span class="help-block small">Yur strong password</span>
                            </div>
                            <div class="checkbox login-checkbox">
                                <label>
										<input type="checkbox" name="remember" class="i-checks"> Remember me </label>
                                <p class="help-block small">(if this is a private computer)</p>
                            </div>
                            <button class="btn btn-success btn-block loginbtn">Login</button>
                            <a class="btn btn-default btn-block" href="#">Register</a>
                        </form>
                    </div>
                </div>
            </div>
            <div class="col-lg-4 col-md-4 col-sm-4 col-xs-12"></div>
        </div>
        <div class="row">
            <div class="col-md-12 col-md-12 col-sm-12 col-xs-12 text-center">
                <p style="color: #fff;">Copyright &copy; {{date('Y')}} <a href="https://vtechinfosystems.com" style="color: #1e73be; font"600;>vtechinfosystems.com</a> All rights reserved.</p>
            </div>
        </div>
    </div>


    <!-- jquery
        ============================================ -->
    <script src="{{ URL::asset('master/js/vendor/jquery-1.11.3.min.js') }}"></script>
    <!-- bootstrap JS
        ============================================ -->
    <script src="{{ URL::asset('master/js/bootstrap.min.js') }}"></script>
    <!-- wow JS
        ============================================ -->
    <script src="{{ URL::asset('master/js/wow.min.js') }}"></script>
    <!-- price-slider JS
        ============================================ -->
    <script src="{{ URL::asset('master/js/jquery-price-slider.js') }}"></script>
    <!-- meanmenu JS
        ============================================ -->
    <script src="{{ URL::asset('master/js/jquery.meanmenu.js') }}"></script>
    <!-- owl.carousel JS
        ============================================ -->
    <script src="{{ URL::asset('master/js/owl.carousel.min.js') }}"></script>
    <!-- sticky JS
        ============================================ -->
    <script src="{{ URL::asset('master/js/jquery.sticky.js') }}"></script>
    <!-- scrollUp JS
        ============================================ -->
    <script src="{{ URL::asset('master/js/jquery.scrollUp.min.js') }}"></script>
    <!-- mCustomScrollbar JS
        ============================================ -->
    <script src="{{ URL::asset('master/js/scrollbar/jquery.mCustomScrollbar.concat.min.js') }}"></script>
    <script src="{{ URL::asset('master/js/scrollbar/mCustomScrollbar-active.js') }}"></script>
    <!-- metisMenu JS
        ============================================ -->
    <script src="{{ URL::asset('master/js/metisMenu/metisMenu.min.js') }}"></script>
    <script src="{{ URL::asset('master/js/metisMenu/metisMenu-active.js') }}"></script>
    <!-- morrisjs JS
        ============================================ -->
    <script src="{{ URL::asset('master/js/morrisjs/raphael-min.js') }}"></script>
    <script src="{{ URL::asset('master/js/morrisjs/morris.js') }}"></script>
    <script src="{{ URL::asset('master/js/morrisjs/morris-active.js') }}"></script>
    <!-- morrisjs JS
        ============================================ -->
    <script src="{{ URL::asset('master/js/sparkline/jquery.sparkline.min.js') }}"></script>
    <script src="{{ URL::asset('master/js/sparkline/jquery.charts-sparkline.js') }}"></script>
    <!-- calendar JS
        ============================================ -->
    <script src="{{ URL::asset('master/js/calendar/moment.min.js') }}"></script>
    <script src="{{ URL::asset('master/js/calendar/fullcalendar.min.js') }}"></script>
    <script src="{{ URL::asset('master/js/calendar/fullcalendar-active.js') }}"></script>
    <!-- plugins JS
        ============================================ -->
    <script src="{{ URL::asset('master/js/tab.js') }}"></script>
    <!-- icheck JS
        ============================================ -->
    <script src="{{ URL::asset('master/js/icheck/icheck.min.js') }}"></script>
    <script src="{{ URL::asset('master/js/icheck/icheck-active.js') }}"></script>

    <script src="{{ URL::asset('master/js/plugins.js') }}"></script>
    <!-- main JS
        ============================================ -->
    <script src="{{ URL::asset('master/js/main.js') }}"></script>
</body>

</html>