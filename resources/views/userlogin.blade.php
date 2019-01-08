@include('inc.header');
<section id="inner-headline">
    <div class="container">
        <div class="row">
            <div class="col-lg-12">
                <ul class="breadcrumb">
                    <li><a href="#"><i class="fa fa-home"></i></a><i class="icon-angle-right"></i></li>
                    <li><a href="#">Features</a><i class="icon-angle-right"></i></li>
                    <li class="active">Register</li>
                </ul>
            </div>
        </div>
    </div>
</section>
<section id="content">
    <div class="container">

        <div class="row">
            <div class="col-xs-12 col-sm-8 col-md-6 col-sm-offset-2 col-md-offset-3">
            @if($errors->all())
                <div class="alert alert-danger">
                    <ul>
                        @foreach ($errors->all() as $error)
                            <li>{{ $error }}</li>
                        @endforeach
                    </ul>
                </div>
            @endif

            @if($message = Session::get('error'))
                <div class="alert alert-danger">
                    <ul>
                        <li>{{ $message }}</li>
                    </ul>
                </div>
            @endif
                <form method ="post" action="{{ url('auth/checkauth') }}" class="loginform">
                {{ csrf_field() }}
                    <h2>Sign in <small>manage your account</small></h2>
                    <hr class="colorgraph">

                    <div class="form-group">
                        <input type="email" name="email" id="email" class="form-control input-lg" placeholder="Email Address" tabindex="4">
                    </div>
                    <div class="form-group">
                        <input type="password" name="psw" class="form-control input-lg" id="exampleInputPassword1" placeholder="Password">
                    </div>

                    <div class="row">
                        <div class="col-xs-4 col-sm-3 col-md-3">
                            <span class="button-checkbox">
                                <button type="button" class="btn" data-color="info" tabindex="7">Remember me</button>
                                <input type="checkbox" name="remember" id="t_and_c" class="hidden" value="1">
                            </span>
                        </div>
                    </div>

                    <hr class="colorgraph">
                    <div class="row">
                        <div class="col-xs-12 col-md-6"><input type="submit" value="Sign in" class="btn btn-primary btn-block btn-lg" tabindex="7"></div>
                        <div class="col-xs-12 col-md-6">Don't have an account? <a href="{{ url('auth/register') }}">Register</a></div>
                    </div>
                </form>
            </div>
        </div>

    </div>
</section>
@include('inc.footer');
