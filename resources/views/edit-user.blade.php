<script src="//code.jquery.com/jquery-1.11.1.min.js"></script>
<link href="//maxcdn.bootstrapcdn.com/bootstrap/3.3.0/css/bootstrap.min.css" rel="stylesheet" id="bootstrap-css">
<script src="//maxcdn.bootstrapcdn.com/bootstrap/3.3.0/js/bootstrap.min.js"></script>
<link href="https://maxcdn.bootstrapcdn.com/font-awesome/4.3.0/css/font-awesome.min.css" rel="stylesheet">
<!------ Include the above in your HEAD tag ---------->

<nav class="navbar navbar-default navbar-static-top">
  <div class="container-fluid">
    <!-- Brand and toggle get grouped for better mobile display -->
    <div class="navbar-header">
      <button type="button" class="navbar-toggle navbar-toggle-sidebar collapsed">
        MENU
      </button>
      <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1">
        <span class="sr-only">Toggle navigation</span>
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>
      </button>
      <a class="navbar-brand" href="#">
        Administrator
      </a>
    </div>

    <!-- Collect the nav links, forms, and other content for toggling -->
    <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">      
      <form class="navbar-form navbar-left" method="GET" role="search">
        <div class="form-group">
          <input type="text" name="q" class="form-control" placeholder="Search">
        </div>
        <button type="submit" class="btn btn-default"><i class="glyphicon glyphicon-search"></i></button>
      </form>
      <ul class="nav navbar-nav navbar-right">
        <li><a href="#" target="_blank">
          @if(isset(Auth::user()->name))
            {{ Auth::user()->name }}
          @else
          {{ Auth::user()->email }}
          @endif
        </a></li>
        <li class="dropdown ">
          <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-expanded="false">
            Account
            <span class="caret"></span></a>
            <ul class="dropdown-menu" role="menu">
              <li class="dropdown-header">SETTINGS</li>
              <li class=""><a href="#">Other Link</a></li>
              <li class=""><a href="#">Other Link</a></li>
              <li class=""><a href="#">Other Link</a></li>
              <li class="divider"></li>
              <li><a href="{{ url('auth/logout') }}" class="">Logout</a></li>
            </ul>
          </li>
        </ul>
      </div><!-- /.navbar-collapse -->
    </div><!-- /.container-fluid -->
  </nav>    
  <div class="container-fluid main-container">
  <div class="col-md-2 sidebar">
    <div class="row">
      <!-- uncomment code for absolute positioning tweek see top comment in css -->
      <div class="absolute-wrapper"> </div>
      <!-- Menu -->
      <div class="side-menu">
        <nav class="navbar navbar-default" role="navigation">
          <!-- Main Menu -->
          <div class="side-menu-container">
            <ul class="nav navbar-nav">
              <li class="active"><a href="#"><span class="glyphicon glyphicon-dashboard"></span> Dashboard</a></li>
              <li><a href="#"><span class="glyphicon glyphicon-plane"></span> Active Link</a></li>
              <li><a href="#"><span class="glyphicon glyphicon-cloud"></span> Link</a></li>

              <!-- Dropdown-->
              <li class="panel panel-default" id="dropdown">
                <a data-toggle="collapse" href="#dropdown-lvl1">
                  <span class="glyphicon glyphicon-user"></span> Sub Level <span class="caret"></span>
                </a>

                <!-- Dropdown level 1 -->
                <div id="dropdown-lvl1" class="panel-collapse collapse">
                  <div class="panel-body">
                    <ul class="nav navbar-nav">
                      <li><a href="#">Link</a></li>
                      <li><a href="#">Link</a></li>
                      <li><a href="#">Link</a></li>

                      <!-- Dropdown level 2 -->
                      <li class="panel panel-default" id="dropdown">
                        <a data-toggle="collapse" href="#dropdown-lvl2">
                          <span class="glyphicon glyphicon-off"></span> Sub Level <span class="caret"></span>
                        </a>
                        <div id="dropdown-lvl2" class="panel-collapse collapse">
                          <div class="panel-body">
                            <ul class="nav navbar-nav">
                              <li><a href="#">Link</a></li>
                              <li><a href="#">Link</a></li>
                              <li><a href="#">Link</a></li>
                            </ul>
                          </div>
                        </div>
                      </li>
                    </ul>
                  </div>
                </div>
              </li>

              <li><a href="#"><span class="glyphicon glyphicon-signal"></span> Link</a></li>

            </ul>
          </div><!-- /.navbar-collapse -->
        </nav>

      </div>
    </div>      </div>
    <div class="col-md-10 content">
      <div class="panel panel-default">
        <div class="panel-heading">
          Dashboard
        </div>
        <div class="panel-body">
          @if (count($errors) > 0)
          <div class="alert alert-danger">
            <strong>Whoops!</strong> There were some problems with your input.<br><br>
            <ul>
              @foreach ($errors->all() as $error)
                  <li>{{ $error }}</li>
              @endforeach
            </ul>
          </div>
          @endif

          @if(session()->has('message'))
              <div class="alert alert-success alert-dismissible">
                <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
                <strong>Success!</strong> {{ session()->get('message') }}
              </div>
          @endif
          <div class="container bootstrap snippets">
          <div class="row">
            <div class="col-xs-12 col-sm-9">
              <!-- <form class="form-horizontal"> -->
                <form method ="post" action="{{ url('user/update') }}" class="registerform form-horizontal" enctype="multipart/form-data">
                  <input type="hidden" placeholder="Enter Name" name="edit_id" value="{{ $user->id }}" required>
                  <div class="panel panel-default">
                    <!-- start of foto -->
                      <div class="form-group{{ $errors->has('avatar') ? ' has-error' : '' }}">

                          <!-- <label class="col-md-4 control-label">F o t o</label> -->

                          <div class="col-md-6">
                          <?php 
                              
                          ?>
                          <!-- <img src="http://localhost/test-lara/public/storage/app/15_avatar1544179556.png"></img> -->
                              <div id="kv-avatar-errors" class="center-block" style="width:800px;display:none">
                              </div>

                              <div class="kv-avatar" style="width:200px">
                                  <!-- <input id="avatar" name="avatar" type="file" class="file-loading"> -->
                              </div>

                          </div>

                      </div>
                  <!-- end of foto -->
                  <!-- {{ asset('storage/profiles/1_avatar1544549177.jpeg') }} -->
                   @if(isset(Auth::user()->avatar))                    
                    @php $avatar = asset('storage/profiles/'.Auth::user()->avatar); @endphp
                  @else
                    @php $avatar = 'https://bootdey.com/img/Content/avatar/avatar6.png'; @endphp
                  @endif
                    <div class="panel-body text-center">
                     <img src="{{$avatar}}" class="img-circle profile-avatar" alt="User avatar">
                     <input id="avatar" name="avatar" type="file" class="file-loading" style="margin-left: 40%;">
                    </div>
                  </div>
                <div class="panel panel-default">
                  <div class="panel-heading">
                  <h4 class="panel-title">User info</h4>
                  </div>
                  <div class="panel-body">                   
                    <div class="form-group">
                      <label class="col-sm-2 control-label">Name</label>
                      <div class="col-sm-10">
                        <input type="text" class="form-control" name="name" value="{{ $user->name }}"  />                        
                      </div>
                    </div>
                    <div class="form-group">
                      <label class="col-sm-2 control-label">E-mail address</label>
                      <div class="col-sm-10">
                        <input type="text" class="form-control" name="email" value="{{ $user->email }}"  />                        
                      </div>
                    </div>
                     <div class="form-group">
                      <label class="col-sm-2 control-label">User Type</label>
                      <div class="col-sm-10">
                        <select class="form-control" name="user_type">                          
                          <!-- <option selected="">Select country</option> -->
                          <!-- <option value="admin" {{Auth::user()->user_type == 'admin' ? 'selected' : '' }} >Admin</option> -->
                          <option value="subscriber" {{Auth::user()->user_type == 'subscriber' ? 'selected' : '' }} >Subscriber</option>
                        </select>
                      </div>
                    </div>
                  </div>
                </div>

                <div class="panel panel-default">
                  <div class="panel-heading">
                  <h4 class="panel-title">Contact info</h4>
                  </div>
                  <div class="panel-body">
                    <div class="form-group">
                      <label class="col-sm-2 control-label">Work number</label>
                      <div class="col-sm-10">
                        <input type="tel" class="form-control">
                      </div>
                    </div>
                    <div class="form-group">
                      <label class="col-sm-2 control-label">Mobile number</label>
                      <div class="col-sm-10">
                        <input type="tel" class="form-control">
                      </div>
                    </div>
                   <!--  <div class="form-group">
                      <label class="col-sm-2 control-label">E-mail address</label>
                      <div class="col-sm-10">
                        <input type="email" class="form-control">
                      </div>
                    </div> -->
                    <div class="form-group">
                      <label class="col-sm-2 control-label">Work address</label>
                      <div class="col-sm-10">
                        <textarea rows="3" class="form-control"></textarea>
                      </div>
                    </div>
                  </div>
                </div>

                <div class="panel panel-default">
                  <div class="panel-heading">
                  <h4 class="panel-title">Security</h4>
                  </div>
                  <div class="panel-body">
                    <div class="form-group">
                      <label class="col-sm-2 control-label">Current password</label>
                      <div class="col-sm-10">
                        <input type="password" class="form-control">
                      </div>
                    </div>
                    <div class="form-group">
                      <label class="col-sm-2 control-label">New password</label>
                      <div class="col-sm-10">
                        <input type="password" class="form-control">
                      </div>
                    </div>
                    <div class="form-group">
                      <div class="col-sm-10 col-sm-offset-2">
                        <div class="checkbox">
                          <input type="checkbox" id="checkbox_1">
                          <label for="checkbox_1">Make this account public</label>
                        </div>
                      </div>
                    </div>                     
                    <div class="form-group">
                      <div class="col-sm-10 col-sm-offset-2">
                        <button type="submit" class="btn btn-primary">Update</button>
                        <button type="reset" class="btn btn-default">Cancel</button>
                      </div>
                    </div>
                  </div>
                </div>
              </form>
            </div>
          </div>
          </div>
        </div>
        
      </div>
    </div>
    <footer class="pull-left footer">
      <p class="col-md-12">
        <hr class="divider">
        Copyright &COPY; 2015 <a href="http://www.pingpong-labs.com">Gravitano</a>
      </p>
    </footer>
  </div>
<style type="text/css">
body{
    margin-top:20px;
    background:#f5f5f5;
}
/**
 * Panels
 */
/*** General styles ***/
.panel {
  box-shadow: none;
}
.panel-heading {
  border-bottom: 0;
}
.panel-title {
  font-size: 17px;
}
.panel-title > small {
  font-size: .75em;
  color: #999999;
}
.panel-body *:first-child {
  margin-top: 0;
}
.panel-footer {
  border-top: 0;
}

.panel-default > .panel-heading {
    color: #333333;
    background-color: transparent;
    border-color: rgba(0, 0, 0, 0.07);
}

form label {
    color: #999999;
    font-weight: 400;
}

.form-horizontal .form-group {
  margin-left: -15px;
  margin-right: -15px;
}
@media (min-width: 768px) {
  .form-horizontal .control-label {
    text-align: right;
    margin-bottom: 0;
    padding-top: 7px;
  }
}

.profile__contact-info-icon {
    float: left;
    font-size: 18px;
    color: #999999;
}
.profile__contact-info-body {
    overflow: hidden;
    padding-left: 20px;
    color: #999999;
}
.profile-avatar {
  width: 200px;
  position: relative;
  margin: 0px auto;
  margin-top: 196px;
  border: 4px solid #f3f3f3;
}

  h1.page-header {
    margin-top: -5px;
}

.sidebar {
  padding-left: 0;
}

.main-container { 
  background: #FFF;
  padding-top: 15px;
  margin-top: -20px;
}

.footer {
  width: 100%;
}  

:focus {
  outline: none;
}

.side-menu {
  position: relative;
  width: 100%;
  height: 100%;
  background-color: #f8f8f8;
  border-right: 1px solid #e7e7e7;
}
.side-menu .navbar {
  border: none;
}
.side-menu .navbar-header {
  width: 100%;
  border-bottom: 1px solid #e7e7e7;
}
.side-menu .navbar-nav .active a {
  background-color: transparent;
  margin-right: -1px;
  border-right: 5px solid #e7e7e7;
}
.side-menu .navbar-nav li {
  display: block;
  width: 100%;
  border-bottom: 1px solid #e7e7e7;
}
.side-menu .navbar-nav li a {
  padding: 15px;
}
.side-menu .navbar-nav li a .glyphicon {
  padding-right: 10px;
}
.side-menu #dropdown {
  border: 0;
  margin-bottom: 0;
  border-radius: 0;
  background-color: transparent;
  box-shadow: none;
}
.side-menu #dropdown .caret {
  float: right;
  margin: 9px 5px 0;
}
.side-menu #dropdown .indicator {
  float: right;
}
.side-menu #dropdown > a {
  border-bottom: 1px solid #e7e7e7;
}
.side-menu #dropdown .panel-body {
  padding: 0;
  background-color: #f3f3f3;
}
.side-menu #dropdown .panel-body .navbar-nav {
  width: 100%;
}
.side-menu #dropdown .panel-body .navbar-nav li {
  padding-left: 15px;
  border-bottom: 1px solid #e7e7e7;
}
.side-menu #dropdown .panel-body .navbar-nav li:last-child {
  border-bottom: none;
}
.side-menu #dropdown .panel-body .panel > a {
  margin-left: -20px;
  padding-left: 35px;
}
.side-menu #dropdown .panel-body .panel-body {
  margin-left: -15px;
}
.side-menu #dropdown .panel-body .panel-body li {
  padding-left: 30px;
}
.side-menu #dropdown .panel-body .panel-body li:last-child {
  border-bottom: 1px solid #e7e7e7;
}
.side-menu #search-trigger {
  background-color: #f3f3f3;
  border: 0;
  border-radius: 0;
  position: absolute;
  top: 0;
  right: 0;
  padding: 15px 18px;
}
.side-menu .brand-name-wrapper {
  min-height: 50px;
}
.side-menu .brand-name-wrapper .navbar-brand {
  display: block;
}
.side-menu #search {
  position: relative;
  z-index: 1000;
}
.side-menu #search .panel-body {
  padding: 0;
}
.side-menu #search .panel-body .navbar-form {
  padding: 0;
  padding-right: 50px;
  width: 100%;
  margin: 0;
  position: relative;
  border-top: 1px solid #e7e7e7;
}
.side-menu #search .panel-body .navbar-form .form-group {
  width: 100%;
  position: relative;
}
.side-menu #search .panel-body .navbar-form input {
  border: 0;
  border-radius: 0;
  box-shadow: none;
  width: 100%;
  height: 50px;
}
.side-menu #search .panel-body .navbar-form .btn {
  position: absolute;
  right: 0;
  top: 0;
  border: 0;
  border-radius: 0;
  background-color: #f3f3f3;
  padding: 15px 18px;
}
/* Main body section */
.side-body {
  margin-left: 310px;
}
/* small screen */
@media (max-width: 768px) {
  .side-menu {
    position: relative;
    width: 100%;
    height: 0;
    border-right: 0;
  }

  .side-menu .navbar {
    z-index: 999;
    position: relative;
    height: 0;
    min-height: 0;
    background-color:none !important;
    border-color: none !important;
  }
  .side-menu .brand-name-wrapper .navbar-brand {
    display: inline-block;
  }
  /* Slide in animation */
  @-moz-keyframes slidein {
    0% {
      left: -300px;
    }
    100% {
      left: 10px;
    }
  }
  @-webkit-keyframes slidein {
    0% {
      left: -300px;
    }
    100% {
      left: 10px;
    }
  }
  @keyframes slidein {
    0% {
      left: -300px;
    }
    100% {
      left: 10px;
    }
  }
  @-moz-keyframes slideout {
    0% {
      left: 0;
    }
    100% {
      left: -300px;
    }
  }
  @-webkit-keyframes slideout {
    0% {
      left: 0;
    }
    100% {
      left: -300px;
    }
  }
  @keyframes slideout {
    0% {
      left: 0;
    }
    100% {
      left: -300px;
    }
  }
  /* Slide side menu*/
  /* Add .absolute-wrapper.slide-in for scrollable menu -> see top comment */
  .side-menu-container > .navbar-nav.slide-in {
    -moz-animation: slidein 300ms forwards;
    -o-animation: slidein 300ms forwards;
    -webkit-animation: slidein 300ms forwards;
    animation: slidein 300ms forwards;
    -webkit-transform-style: preserve-3d;
    transform-style: preserve-3d;
  }
  .side-menu-container > .navbar-nav {
    /* Add position:absolute for scrollable menu -> see top comment */
    position: fixed;
    left: -300px;
    width: 300px;
    top: 43px;
    height: 100%;
    border-right: 1px solid #e7e7e7;
    background-color: #f8f8f8;
    overflow: auto;
    -moz-animation: slideout 300ms forwards;
    -o-animation: slideout 300ms forwards;
    -webkit-animation: slideout 300ms forwards;
    animation: slideout 300ms forwards;
    -webkit-transform-style: preserve-3d;
    transform-style: preserve-3d;
  }
  @-moz-keyframes bodyslidein {
    0% {
      left: 0;
    }
    100% {
      left: 300px;
    }
  }
  @-webkit-keyframes bodyslidein {
    0% {
      left: 0;
    }
    100% {
      left: 300px;
    }
  }
  @keyframes bodyslidein {
    0% {
      left: 0;
    }
    100% {
      left: 300px;
    }
  }
  @-moz-keyframes bodyslideout {
    0% {
      left: 300px;
    }
    100% {
      left: 0;
    }
  }
  @-webkit-keyframes bodyslideout {
    0% {
      left: 300px;
    }
    100% {
      left: 0;
    }
  }
  @keyframes bodyslideout {
    0% {
      left: 300px;
    }
    100% {
      left: 0;
    }
  }
  /* Slide side body*/
  .side-body {
    margin-left: 5px;
    margin-top: 70px;
    position: relative;
    -moz-animation: bodyslideout 300ms forwards;
    -o-animation: bodyslideout 300ms forwards;
    -webkit-animation: bodyslideout 300ms forwards;
    animation: bodyslideout 300ms forwards;
    -webkit-transform-style: preserve-3d;
    transform-style: preserve-3d;
  }
  .body-slide-in {
    -moz-animation: bodyslidein 300ms forwards;
    -o-animation: bodyslidein 300ms forwards;
    -webkit-animation: bodyslidein 300ms forwards;
    animation: bodyslidein 300ms forwards;
    -webkit-transform-style: preserve-3d;
    transform-style: preserve-3d;
  }
  /* Hamburger */
  .navbar-toggle-sidebar {
    border: 0;
    float: left;
    padding: 18px;
    margin: 0;
    border-radius: 0;
    background-color: #f3f3f3;
  }
  /* Search */
  #search .panel-body .navbar-form {
    border-bottom: 0;
  }
  #search .panel-body .navbar-form .form-group {
    margin: 0;
  }
  .side-menu .navbar-header {
    /* this is probably redundant */
    position: fixed;
    z-index: 3;
    background-color: #f8f8f8;
  }
  /* Dropdown tweek */
  #dropdown .panel-body .navbar-nav {
    margin: 0;
  }


}
</style>  
<script type="text/javascript">
  $(function () {
    $('.navbar-toggle-sidebar').click(function () {
      $('.navbar-nav').toggleClass('slide-in');
      $('.side-body').toggleClass('body-slide-in');
      $('#search').removeClass('in').addClass('collapse').slideUp(200);
    });

    $('#search-trigger').click(function () {
      $('.navbar-nav').removeClass('slide-in');
      $('.side-body').removeClass('body-slide-in');
      $('.search-input').focus();
    });
  });
</script>