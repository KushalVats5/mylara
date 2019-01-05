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
        @if($message = Session::get('error'))
        <div>{{ $message }}</div>
        @endif

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
                <form role="form" method ="post" action="{{ url('store') }}" class="registerform register-form">
                    {{ csrf_field() }}
                    <h2>Please Sign Up <small>It's free and always will be.</small></h2>
                    <hr class="colorgraph">
                    <div class="row">
                        <div class="col-xs-12 col-sm-6 col-md-6">
                            <div class="form-group {{ $errors->has('first_name') ? 'has-error' : '' }}">
                                <input type="text" name="first_name" id="first_name" class="form-control input-lg" placeholder="First Name" tabindex="1" value="{{ old('first_name') }}">
                                <span class="text-danger">{{ $errors->first('first_name') }}</span>
                            </div>
                        </div>
                        <div class="col-xs-12 col-sm-6 col-md-6">
                            <div class="form-group {{ $errors->has('middle_name') ? 'has-error' : '' }}">
                                <input type="text" name="middle_name" id="middle_name" class="form-control input-lg" placeholder="Middle Name" tabindex="2" value="{{ old('middle_name') }}">
                                <span class="text-danger">{{ $errors->first('middle_name') }}</span>
                            </div>
                        </div>
                    </div>

                    <div class="row">
                        <div class="col-xs-12 col-sm-6 col-md-6">
                            <div class="form-group {{ $errors->has('last_name') ? 'has-error' : '' }}">
                                <input type="text" name="last_name" id="last_name" class="form-control input-lg" placeholder="Last Name" tabindex="2" value="{{ old('last_name') }}">
                                <span class="text-danger">{{ $errors->first('last_name') }}</span>
                            </div>
                        </div>
                        <div class="col-xs-12 col-sm-6 col-md-6">
                            <div class="form-group {{ $errors->has('name') ? 'has-error' : '' }}">
                                <input type="text" name="name" id="display_name" class="form-control input-lg" placeholder="Display Name" tabindex="3" value="{{ old('name') }}">
                                <span class="text-danger">{{ $errors->first('name') }}</span>
                            </div>
                        </div>
                    </div>
                    <div class="form-group {{ $errors->has('email') ? 'has-error' : '' }}">
                        <input type="email" name="email" id="email" class="form-control input-lg" placeholder="Email Address" tabindex="4" value="{{ old('email') }}">
                        <span class="text-danger">{{ $errors->first('email') }}</span>
                    </div>
                    <div class="row">
                        <div class="col-xs-12 col-sm-6 col-md-6">
                            <div class="form-group {{ $errors->has('psw') ? 'has-error' : '' }}">
                                <input type="password" name="psw" id="password" class="form-control input-lg" placeholder="Password" tabindex="5">
                                <span class="text-danger">{{ $errors->first('psw') }}</span>
                            </div>
                        </div>
                        <div class="col-xs-12 col-sm-6 col-md-6">
                            <div class="form-group {{ $errors->has('repeatpsw') ? 'has-error' : '' }}">
                                <input type="password" name="repeatpsw" id="password_confirmation" class="form-control input-lg" placeholder="Confirm Password" tabindex="6">
                                <span class="text-danger">{{ $errors->first('repeatpsw') }}</span>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-xs-4 col-sm-3 col-md-3">
                            <span class="button-checkbox">
                                <button type="button" class="btn" data-color="info" tabindex="7">Remember me</button>
                                <input type="checkbox" name="remember" id="t_and_c" class="hidden" value="">
                            </span>
                        </div>
                        <div class="col-xs-8 col-sm-9 col-md-9">
                        <strong class="label label-primary">Note</strong>, When register you agree to the <a href="#" data-toggle="modal" data-target="#t_and_c_m">Terms and Conditions</a> set out by this site, including our Cookie Use.
                        </div>
                    </div>

                    <hr class="colorgraph">
                    <div class="row">
                        <div class="col-xs-12 col-md-6"><input type="submit" value="Register" class="btn btn-theme btn-block btn-lg" tabindex="7"></div>
                        <div class="col-xs-12 col-md-6">Already have an account? <a href="{{ url('auth/login') }}">Sign In</a></div>
                    </div>
                </form>
            </div>
        </div>
        <!-- Modal -->
        <div class="modal fade" id="t_and_c_m" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
            <div class="modal-dialog modal-lg">
                <div class="modal-content">
                    <div class="modal-header">
                        <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
                        <h4 class="modal-title" id="myModalLabel">Terms & Conditions</h4>
                    </div>
                    <div class="modal-body">
                        <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Similique, itaque, modi, aliquam nostrum at sapiente consequuntur natus odio reiciendis perferendis rem nisi tempore possimus ipsa porro delectus quidem dolorem ad.</p>
                        <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Similique, itaque, modi, aliquam nostrum at sapiente consequuntur natus odio reiciendis perferendis rem nisi tempore possimus ipsa porro delectus quidem dolorem ad.</p>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-primary" data-dismiss="modal">I Agree</button>
                    </div>
                </div>
                <!-- /.modal-content -->
            </div>
            <!-- /.modal-dialog -->
        </div>
        <!-- /.modal -->
    </div>
</section>

@include('inc.footer');