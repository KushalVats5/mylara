<!DOCTYPE html>
<head>
  <meta charset="utf-8">
  <title>Sailor - Bootstrap 3 corporate template</title>
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <meta name="description" content="Bootstrap 3 template for corporate business" />
  <!-- css -->
  <link href="{{ URL::asset('template/css/bootstrap.min.css') }}" rel="stylesheet" />
  <link href="{{ URL::asset('template/plugins/flexslider/flexslider.css') }}" rel="stylesheet" media="screen" />
  <link href="{{ URL::asset('template/css/cubeportfolio.min.css') }}" rel="stylesheet" />
  <link href="{{ URL::asset('template/css/style.css') }}" rel="stylesheet" />

  <!-- Theme skin -->
  <link id="t-colors" href="{{ URL::asset('template/skins/default.css') }}" rel="stylesheet" />

  <!-- boxed bg -->
  <!-- <link href="{{ URL::asset('template/bodybg/bg1.css') }}" rel="stylesheet" type="text/css" id="bodybg"> -->
</head>

<body>
  <div id="wrapper">
    <!-- start header -->
    <header>
      <div class="top">
        <div class="container">
          <div class="row">
            <div class="col-md-6">
              <ul class="topleft-info">
                <li><i class="fa fa-phone"></i> +62 088 999 123</li>|
                 @if(isset(Auth::user()->email))
                <li><a href="{{ url('auth/logout') }}">Logout</a></li>
                @else
                <li><a href="{{ url('auth/register') }}">Register</a></li>|
                <li><a href="{{ url('auth/login') }}"> Login</a></li>
                @endif
                
              </ul>
            </div>
            <div class="col-md-6">
              <div id="sb-search" class="sb-search">
                <form>
                  <input class="sb-search-input" placeholder="Enter your search term..." type="text" value="" name="search" id="search">
                  <input class="sb-search-submit" type="submit" value="">
                  <span class="sb-icon-search" title="Click to start searching"></span>
                </form>
              </div>


            </div>
          </div>
        </div>
      </div>

      <div class="navbar navbar-default navbar-static-top">
        <div class="container">
          <div class="navbar-header">
            <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-collapse">
              <span class="icon-bar"></span>
              <span class="icon-bar"></span>
              <span class="icon-bar"></span>
            </button>
            <a class="navbar-brand" href="{{ url('/') }}  "><img src="{{ URL::asset('master/img/logo/logo.png') }}  " alt="" width="200" height="auto" /></a>
          </div>
          <div class="navbar-collapse collapse ">
            <ul class="nav navbar-nav">
              <li class="active"><a href="{{ url('/') }}">Home</a></li>
              <!-- <li class="dropdown active">
                <a href="#" class="dropdown-toggle " data-toggle="dropdown" data-hover="dropdown" data-delay="0" data-close-others="false">Home <i class="fa fa-angle-down"></i></a>
                <ul class="dropdown-menu">
                  <li><a href="index.html">Home slider 1</a></li>
                  <li><a href="index2.html">Home slider 2</a></li>

                </ul>

              </li> -->
              <li class="dropdown">
                <a href="#" class="dropdown-toggle " data-toggle="dropdown" data-hover="dropdown" data-delay="0" data-close-others="false">Features <i class="fa fa-angle-down"></i></a>
                <ul class="dropdown-menu">
                  <li><a href="typography.html">Typography</a></li>
                  <li><a href="components.html">Components</a></li>
                  <li><a href="pricing-box.html">Pricing box</a></li>
                  <li class="dropdown-submenu">
                    <a href="#" class="dropdown-toggle " data-toggle="dropdown" data-hover="dropdown">Pages</a>
                    <ul class="dropdown-menu">
                      <li><a href="fullwidth.html">Full width</a></li>
                      <li><a href="right-sidebar.html">Right sidebar</a></li>
                      <li><a href="left-sidebar.html">Left sidebar</a></li>
                      <li><a href="comingsoon.html">Coming soon</a></li>
                      <li><a href="search-result.html">Search result</a></li>
                      <li><a href="404.html">404</a></li>
                      <li><a href="register.html">Register</a></li>
                      <li><a href="login.html">Login</a></li>
                    </ul>
                  </li>
                </ul>
              </li>
              <li><a href="portfolio.html">Portfolio</a></li>
              <li class="dropdown"><a href="#" class="dropdown-toggle " data-toggle="dropdown" data-hover="dropdown" data-delay="0" data-close-others="false">Blog <i class="fa fa-angle-down"></i></a>
                <ul class="dropdown-menu">
                  <li><a href="blog-rightsidebar.html">Blog right sidebar</a></li>
                  <li><a href="blog-leftsidebar.html">Blog left sidebar</a></li>
                  <li><a href="post-rightsidebar.html">Post right sidebar</a></li>
                  <li><a href="post-leftsidebar.html">Post left sidebar</a></li>
                </ul>
              </li>
              <li><a href="{{ url('contact-us') }}">Contact</a></li>
            </ul>
          </div>
        </div>
      </div>
    </header>
    <!-- end header -->