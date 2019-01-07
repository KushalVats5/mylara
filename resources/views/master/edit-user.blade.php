@extends('master.master')
@section('content')
<div class="product-sales-area mg-tb-30">
  <div class="container-fluid">
    <div class="row">
      <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
        <div class="product-sales-chart">
          <div class="portlet-title">
            <div class="row">
              <div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
                <div class="caption pro-sl-hd">
                  <span class="caption-subject text-uppercase"><b>Edit User</b></span>
                </div>
              </div>
            </div>
          </div>
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
          <form method ="post" action="{{ url('auth/admin/updateuser') }}" class="registerform form-horizontal" enctype="multipart/form-data">
            {{ csrf_field() }}
             <input type="hidden" placeholder="Enter Name" name="edit_id" value="{{ $user->id }}" required>
            <div class="panel-body">  
               <div class="panel-body text-center">
                  @if($user->avatar)
                   <!-- <img src="{{asset('admin/avatars/thumb/'.$user->avatar) }}" class="img-circle post-featured-image file-input profile-avatar" alt="User avatar" title="Change Pic"/> -->
                   <img src="{{asset('admin/avatars/thumb/'.$user->avatar) }}" class="img-circle post-featured-image file-input" alt="User featured_image" title="Change Pic">
                   @else

                    <img src="https://bootdey.com/img/Content/avatar/avatar6.png" class="img-circle post-featured-image file-input" alt="User avatar">
                    @endif
                    <input id="featured_image" name="avatar" type="file" class="file-loading" style="margin-left: 15%; display: none;">
                  </div> 
              <div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
                <div class="panel panel-default">
                  <div class="panel-heading">
                    <h4 class="panel-title">User Info</h4>
                  </div>
                  <div class="panel-body">
                    <div class="review-content-section">
                      <div class="input-group mg-b-pro-edt {{ $errors->has('name') ? 'has-error' : '' }}">
                        <span class="input-group-addon"><i class="fa fa-user" aria-hidden="true"></i></span>
                        <input type="text" class="form-control" name="name" value="{{ $user->name }}" placeholder="Display Name" /> 
                      </div>
                      <div class="input-group mg-b-pro-edt">
                        <span class="input-group-addon"><i class="fa fa-user" aria-hidden="true"></i></span>
                        <input type="text" class="form-control" name="first_name" value="{{  $user->first_name }}" placeholder="First Name" />
                      </div>
                      <div class="input-group mg-b-pro-edt">
                        <span class="input-group-addon"><i class="fa fa-user" aria-hidden="true"></i></span>
                        <input type="text" class="form-control" name="middle_name" value="{{  $user->middle_name }}" placeholder="Middle Name" /> 
                      </div>
                      <div class="input-group mg-b-pro-edt">
                        <span class="input-group-addon"><i class="fa fa-user" aria-hidden="true"></i></span>
                        <input type="text" class="form-control" name="last_name" value="{{  $user->last_name }}" placeholder="Last Name" /> 
                      </div>
                      <div class="input-group mg-b-pro-edt {{ $errors->has('email') ? 'has-error' : '' }}">
                        <span class="input-group-addon"><i class="fa fa-envelope" aria-hidden="true"></i></span>
                        <input type="text" class="form-control" name="email" value="{{  $user->email }}" placeholder="Email" />
                      </div>
                      <div class="input-group mg-b-pro-edt">
                        <span class="input-group-addon"><i class="fa fa-calendar" aria-hidden="true"></i></span>
                        <input type="text" class="form-control" name="dob" value="{{ $user->dob }}" placeholder="Date Of Birth" />
                      </div>
                      <div class="input-group mg-b-pro-edt {{ $errors->has('user_type') ? 'has-error' : '' }}">
                        <span class="input-group-addon"><i class="fa fa-qrcode" aria-hidden="true"></i></span>
                        <select class="form-control" name="user_type">
                        <option value="">--select--</option>
                        <option value="admin" {{ $user->user_type == 'admin' ? 'selected' : '' }}>Admin</option>
                        <option value="subscriber" {{ $user->user_type == 'subscriber' ? 'selected' : '' }}>Subscriber</option>
                      </select>
                      </div>
                    </div>
                  </div>
                </div>
              </div>
              <div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
                <div class="panel panel-default">
                  <div class="panel-heading">
                    <h4 class="panel-title">Address info</h4>
                  </div>
                  <div class="panel-body">
                    <div class="review-content-section">
                      <div class="input-group mg-b-pro-edt">
                        <span class="input-group-addon"><i class="fa fa-home" aria-hidden="true"></i></span>
                        <input type="text" class="form-control" name="housenumber" value="{{ $user->housenumber }}" placeholder="House No." />
                      </div>
                      <div class="input-group mg-b-pro-edt">
                        <span class="input-group-addon"><i class="fa fa-location-arrow" aria-hidden="true"></i></span>
                        <input type="text" class="form-control" name="addressline1" value="{{ $user->addressline1 }}" placeholder="Address line 1" />
                      </div>
                      <div class="input-group mg-b-pro-edt">
                        <span class="input-group-addon"><i class="fa fa-location-arrow" aria-hidden="true"></i></span>
                        <input type="text" class="form-control" name="addressline2" value="{{ $user->addressline2 }}" placeholder="Address line 2" />
                      </div>
                      <div class="input-group mg-b-pro-edt">
                        <span class="input-group-addon"><i class="fa fa-sticky-note-o" aria-hidden="true"></i></span>
                        <input type="text" class="form-control" name="zipcode" value="{{ $user->zipcode }}" placeholder="Zipcode/Postal Code" />
                      </div>
                      <div class="input-group mg-b-pro-edt">
                        <span class="input-group-addon"><i class="fa fa-sticky-note-o" aria-hidden="true"></i></span>
                        <input type="text" class="form-control" name="state" value="{{ $user->state }}" placeholder="State" />
                      </div>
                      <div class="input-group mg-b-pro-edt">
                        <span class="input-group-addon"><i class="fa fa-sticky-note-o" aria-hidden="true"></i></span>
                        <input type="text" class="form-control" name="city" value="{{ $user->city }}" placeholder="City" />
                      </div>
                      <div class="input-group mg-b-pro-edt">
                        <span class="input-group-addon"><i class="fa fa-street-view" aria-hidden="true"></i></span>
                        <input type="text" class="form-control" name="country" value="{{ $user->country }}" placeholder="Country" />
                      </div>
                    </div>
                  </div>
                </div>
              </div>
              <div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
                <div class="panel panel-default">
                  <div class="panel-heading">
                    <h4 class="panel-title">Contact info</h4>
                  </div>
                  <div class="panel-body">
                    <div class="review-content-section">
                      <div class="input-group mg-b-pro-edt">
                        <span class="input-group-addon"><i class="fa fa-phone" aria-hidden="true"></i></span>
                        <input type="tel" class="form-control" name="work_number" value="{{ $user->work_number }}" placeholder="Work Number" />
                      </div>
                      <div class="input-group mg-b-pro-edt">
                        <span class="input-group-addon"><i class="fa fa-mobile" aria-hidden="true"></i></span>
                        <input type="tel" class="form-control" name="mobile_number" value="{{ $user->mobile_number }}" placeholder="Mobile Number" />
                      </div>
                      <div class="input-group mg-b-pro-edt">
                        <span class="input-group-addon"><i class="fa fa-fax" aria-hidden="true"></i></span>
                        <input type="tel" class="form-control" name="fax_number" value="{{ $user->fax_number }}" placeholder="Fax Number" />
                      </div>
                    </div>
                  </div>
                </div>
              </div>
              <div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
                <div class="panel panel-default">
                  <div class="panel-heading">
                    <h4 class="panel-title">Generate Password</h4>
                  </div>
                  <div class="panel-body">
                    <div class="review-content-section">
                      <div class="input-group mg-b-pro-edt {{ $errors->has('psw') ? 'has-error' : '' }}">
                        <span class="input-group-addon"><i class="fa fa-key" aria-hidden="true"></i></span>
                        <input type="password" class="form-control" name="psw" placeholder="Password">
                      </div>
                      <div class="input-group mg-b-pro-edt {{ $errors->has('repsw') ? 'has-error' : '' }}">
                        <span class="input-group-addon"><i class="fa fa-key" aria-hidden="true"></i></span>
                        <input type="password" class="form-control" name="repsw" placeholder="New Password">
                      </div>  
                      <div class="input-group mg-b-pro-edt">
                        <span class="input-group-addon"><i class="fa fa-qrcode" aria-hidden="true"></i></span>
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
                  </div>
                </div>
              </div>
              <div class="form-group review-pro-edt pull-right">
               <button type="submit" class="btn btn-primary">Update</button>
               <!-- <button type="reset" class="btn btn-primary">Cancel</button> -->
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
@endsection