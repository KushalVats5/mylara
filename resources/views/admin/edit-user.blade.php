@extends('admin.master')
@section('content')
<div class="user-dashboard users">
  <h1>
    Hello, 
    @if(isset(Auth::user()->name))
    {{ Auth::user()->name }}
    @else
    {{ Auth::user()->email }}
    @endif
  </h1>
  @yield('content')
  <!-- {!! Helper::generateRandomString(10) !!} -->
@if(count($errors))
    <div class="form-group">
        <div class="alert alert-danger">
            <ul>
                @foreach($errors->all() as $error)
                    <li>{{$error}}</li>
                @endforeach
            </ul>
        </div>
    </div>
@endif
  <div class="row">
    <div class="col-md-12 col-sm-12 col-xs-12 gutter">
      <div class="container-inner">
        <div class="row">
          <div class="col-xs-12 col-sm-12">
            <form method ="post" action="{{ url('auth/admin/updateuser') }}" class="registerform form-horizontal" enctype="multipart/form-data">
             <input type="hidden" placeholder="Enter Name" name="edit_id" value="{{ $user->id }}" required>
              <div class="panel panel-default">
                <div class="panel-heading">
                  <h4 class="panel-title">User info</h4>
                </div>
                <div class="panel-body">  
                <div class="form-group">
                  <div class="col-md-6">
                    <?php 

                    ?>
                    <div id="kv-avatar-errors" class="center-block" style="width:800px;display:none">
                    </div>
                  </div>

                  <div class="panel-body text-center">
                  @if($user->avatar)
                   <!-- <img src="{{asset('admin/avatars/thumb/'.$user->avatar) }}" class="img-circle post-featured-image file-input profile-avatar" alt="User avatar" title="Change Pic"/> -->
                   <img src="{{asset('admin/avatars/thumb/'.$user->avatar) }}" class="img-circle post-featured-image file-input" alt="User featured_image" title="Change Pic">
                   @else

                    <img src="https://bootdey.com/img/Content/avatar/avatar6.png" class="img-circle post-featured-image file-input" alt="User avatar">
                    @endif
                    <input id="featured_image" name="avatar" type="file" class="file-loading" style="margin-left: 15%; display: none;">
                  </div>                 
                </div>
                  <div class="form-group">
                    <label class="col-sm-2 control-label">Display Name</label>
                    <div class="col-sm-10">
                      <input type="text" class="form-control" name="name" value="{{ $user->name }}" placeholder="Name" /> 
                      @if ($errors->has('name'))
                      <span style="color:red;">{{ $errors->first('name') }}</span>
                      @endif                   
                    </div>
                  </div>
                  <div class="form-group">
                    <label class="col-sm-2 control-label">First Name</label>
                    <div class="col-sm-10">
                      <input type="text" class="form-control" name="first_name" value="{{ $user->first_name }}" placeholder="First Name" /> 
                      @if ($errors->has('first_name'))
                      <span style="color:red;">{{ $errors->first('first_name') }}</span>
                      @endif                   
                    </div>
                  </div>
                  <div class="form-group">
                    <label class="col-sm-2 control-label">Middle Name</label>
                    <div class="col-sm-10">
                      <input type="text" class="form-control" name="middle_name" value="{{ $user->middle_name }}" placeholder="Middle Name" /> 
                      @if ($errors->has('middle_name'))
                      <span style="color:red;">{{ $errors->first('middle_name') }}</span>
                      @endif                   
                    </div>
                  </div>
                  <div class="form-group">
                    <label class="col-sm-2 control-label">Last Name</label>
                    <div class="col-sm-10">
                      <input type="text" class="form-control" name="last_name" value="{{ $user->last_name }}" placeholder="Last Name" /> 
                      @if ($errors->has('last_name'))
                      <span style="color:red;">{{ $errors->first('last_name') }}</span>
                      @endif                   
                    </div>
                  </div>
                  <div class="form-group">
                    <label class="col-sm-2 control-label">E-mail address</label>
                    <div class="col-sm-10">
                      <input type="text" class="form-control" name="email" value="{{ $user->email }}" placeholder="Email" />
                      @if ($errors->has('email'))
                      <span style="color:red;">{{ $errors->first('email') }}</span>
                      @endif
                    </div>
                  </div>
                  <div class="form-group">
                    <label class="col-sm-2 control-label">Date Of Birth</label>
                    <div class="col-sm-10" id="sandbox-container">
                      <input type="text" class="form-control" name="dob" value="{{ $user->dob }}" placeholder="Email" />
                      @if ($errors->has('dob'))
                      <span style="color:red;">{{ $errors->first('dob') }}</span>
                      @endif
                    </div>
                  </div>
                  <div class="form-group">
                    <label class="col-sm-2 control-label">User Type</label>
                    <div class="col-sm-10">
                      <select class="form-control" name="user_type">
                        <option value="">--select--</option>
                        <option value="admin" {{ $user->user_type == 'admin' ? 'selected' : '' }}>Admin</option>
                        <option value="subscriber" {{ $user->user_type == 'subscriber' ? 'selected' : '' }}>Subscriber</option>
                      </select>
                      @if ($errors->has('user_type'))
                      <span style="color:red;">{{ $errors->first('user_type') }}</span>
                      @endif
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
                    <label class="col-sm-2 control-label">Work Number</label>
                    <div class="col-sm-10">
                      <input type="tel" class="form-control" name="work_number" value="{{ $user->work_number }}" placeholder="Work Number" />
                    </div>
                  </div>
                  <div class="form-group">
                    <label class="col-sm-2 control-label">Mobile Number</label>
                    <div class="col-sm-10">
                      <input type="tel" class="form-control" name="mobile_number" value="{{ $user->mobile_number }}" placeholder="Mobile Number" />
                    </div>
                  </div>
                  <div class="form-group">
                    <label class="col-sm-2 control-label">Fax Number</label>
                    <div class="col-sm-10">
                      <input type="tel" class="form-control" name="fax_number" value="{{ $user->fax_number }}" placeholder="Fax Number" />
                    </div>
                  </div>
                </div>
              </div>

              <div class="panel panel-default">
                <div class="panel-heading">
                  <h4 class="panel-title">Address info</h4>
                </div>
                <div class="panel-body">
                  <div class="form-group">
                    <label class="col-sm-2 control-label">House No.</label>
                    <div class="col-sm-10">
                      <input type="text" class="form-control" name="housenumber" value="{{ $user->housenumber }}" placeholder="House No." />
                    </div>
                  </div>
                  <div class="form-group">
                    <label class="col-sm-2 control-label">Address line 1</label>
                    <div class="col-sm-10">
                      <input type="text" class="form-control" name="addressline1" value="{{ $user->addressline1 }}" placeholder="Address line 1" />
                    </div>
                  </div>
                  <div class="form-group">
                    <label class="col-sm-2 control-label">Address line 2</label>
                    <div class="col-sm-10">
                      <input type="text" class="form-control" name="addressline2" value="{{ $user->addressline2 }}" placeholder="Address line 2" />
                    </div>
                  </div>
                  <div class="form-group">
                    <label class="col-sm-2 control-label">Zipcode/Postal Code</label>
                    <div class="col-sm-10">
                      <input type="text" class="form-control" name="zipcode" value="{{ $user->zipcode }}" placeholder="Zipcode/Postal Code" />
                    </div>
                  </div>
                  <div class="form-group">
                    <label class="col-sm-2 control-label">State</label>
                    <div class="col-sm-10">
                      <input type="text" class="form-control" name="state" value="{{ $user->state }}" placeholder="State" />
                    </div>
                  </div>
                  <div class="form-group">
                    <label class="col-sm-2 control-label">City</label>
                    <div class="col-sm-10">
                      <input type="text" class="form-control" name="city" value="{{ $user->city }}" placeholder="City" />
                    </div>
                  </div>
                  <div class="form-group">
                    <label class="col-sm-2 control-label">Country</label>
                    <div class="col-sm-10">
                      <input type="text" class="form-control" name="country" value="{{ $user->country }}" placeholder="Country" />
                    </div>
                  </div>
                </div>
              </div>

              <div class="panel panel-default">
                <div class="panel-heading">
                  <h4 class="panel-title">Security</h4>
                </div>
                <div class="panel-body">
                  <!-- <div class="form-group">
                    <label class="col-sm-2 control-label">Password</label>
                    <div class="col-sm-10">
                      <input type="password" class="form-control" name="psw" placeholder="Password">
                      @if ($errors->has('psw'))
                      <span style="color:red;">{{ $errors->first('psw') }}</span>
                      @endif
                    </div>
                  </div>
                  <div class="form-group">
                    <label class="col-sm-2 control-label">Password Confirmation</label>
                    <div class="col-sm-10">
                      <input type="password" class="form-control" name="repsw" placeholder="New Password">
                      @if ($errors->has('repsw'))
                      <span style="color:red;">{{ $errors->first('repsw') }}</span>
                      @endif

                    </div>
                  </div> -->
                  <div class="form-group">
                    <label class="col-sm-2 control-label">Status</label>
                    <div class="col-sm-10">
                      <select class="form-control" name="status">
                        <option value="">--select--</option>
                        <option value="1" {{ $user->is_active == 1 ? 'selected' : '' }}>Active</option>
                        <option value="0" {{ $user->is_active == 0 ? 'selected' : '' }}>Inactive</option>
                      </select>
                      @if ($errors->has('status'))
                      <span style="color:red;">{{ $errors->first('status') }}</span>
                      @endif
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
@endsection