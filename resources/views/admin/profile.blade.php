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
              <!-- {{ csrf_field() }} -->
              <div class="panel panel-default">
                <div class="panel-heading">
                  <h4 class="panel-title">Profile</h4>
                </div>
                <div class="panel-body">  
                  <div class="col-md-9">  
                    <div class="emp-profile">
                      <form method ="post" action="{{ url('auth/admin/updateuser') }}" class="registerform form-horizontal" enctype="multipart/form-data">
                        <div class="row">
                          <div class="col-md-4">
                            <div class="profile-img">
                             @if(!empty(Auth::user()->avatar))
                           <img src="{{asset('admin/avatars/thumb/'.Auth::user()->avatar) }}" class="" alt="User avatar"/>
                           @else
                            <img src="https://encrypted-tbn0.gstatic.com/images?q=tbn:ANd9GcS52y5aInsxSm31CvHOFHWujqUx_wWTS9iM6s7BAm21oEN_RiGoog" alt=""/>
                            @endif
                              <!-- <div class="file btn btn-lg btn-primary">
                                Change Photo
                                <input type="file" name="file"/>
                              </div> -->
                            </div>
                          </div>
                          <div class="col-md-6">
                            <div class="profile-head">
                              <h5>
                                <strong>Name :</strong> {{!empty(Auth::user()->name) ? Auth::user()->name : 'N/A' }}
                              </h5>
                              <h6>
                                <strong>Status :</strong> {{!empty(Auth::user()->user_type) ? Auth::user()->user_type : 'N/A' }}
                              </h6>
                              <p class="proile-rating">RANKINGS : <span>8/10</span></p>
                              
                            </div>
                          </div>
                          <div class="col-md-2">
                            <a href="{{ url('auth/admin/user/edit/'.Auth::user()->id) }}" class="profile-edit-btn"> Edit Profile</a>
                          </div>
                        </div>
                        <div class="row">
                          <ul class="nav nav-tabs" id="myTab" role="tablist">
                            <li class="nav-item active">
                              <a class="nav-link active" id="home-tab" data-toggle="tab" href="#home" role="tab" aria-controls="home" aria-selected="true">User Info</a>
                            </li>
                            <li class="nav-item">
                              <a class="nav-link" id="profile-tab" data-toggle="tab" href="#profile" role="tab" aria-controls="profile" aria-selected="false">Address</a>
                            </li>
                          </ul>
                          <div class="col-md-8">
                            <div class="tab-content profile-tab" id="myTabContent">
                              <div class="tab-pane fade active in" id="home" role="tabpanel" aria-labelledby="home-tab">
                                <div class="row">
                                  <div class="col-md-6">
                                    <label>User Id</label>
                                  </div>
                                  <div class="col-md-6">
                                    <p>{{Auth::user()->id}}</p>
                                  </div>
                                </div>
                                <div class="row">
                                  <div class="col-md-6">
                                    <label>Display Name</label>
                                  </div>
                                  <div class="col-md-6">
                                    <p>{{!empty(Auth::user()->name) ? Auth::user()->name : 'N/A' }}</p>
                                  </div>
                                </div>
                                <div class="row">
                                  <div class="col-md-6">
                                    <label>First Name</label>
                                  </div>
                                  <div class="col-md-6">
                                    <p>{{!empty(Auth::user()->first_name) ? Auth::user()->first_name : 'N/A' }}</p>
                                  </div>
                                </div>
                                <div class="row">
                                  <div class="col-md-6">
                                    <label>Middel Name</label>
                                  </div>
                                  <div class="col-md-6">
                                    <p>{{!empty(Auth::user()->middle_name) ? Auth::user()->middle_name : 'N/A' }}</p>
                                  </div>
                                </div>
                                <div class="row">
                                  <div class="col-md-6">
                                    <label>Last Name</label>
                                  </div>
                                  <div class="col-md-6">
                                    <p>{{!empty(Auth::user()->last_name) ? Auth::user()->last_name : 'N/A' }}</p>
                                  </div>
                                </div>
                                <div class="row">
                                  <div class="col-md-6">
                                    <label>Email</label>
                                  </div>
                                  <div class="col-md-6">
                                    <p>{{!empty(Auth::user()->email) ? Auth::user()->email : 'N/A' }}</p>
                                  </div>
                                </div>
                                <div class="row">
                                  <div class="col-md-6">
                                    <label>Status</label>
                                  </div>
                                  <div class="col-md-6">
                                    <p>{{Auth::user()->is_active == 1 ? 'Active' : 'Inactive'}}</p>
                                  </div>
                                </div>
                              </div>
                              <div class="tab-pane fade" id="profile" role="tabpanel" aria-labelledby="profile-tab">
                                <div class="row">
                                  <div class="col-md-6">
                                    <label>House No.</label>
                                  </div>
                                  <div class="col-md-6">
                                    <p>{{!empty(Auth::user()->housenumber) ? Auth::user()->housenumber : 'N/A' }}</p>
                                  </div>
                                </div>
                                <div class="row">
                                  <div class="col-md-6">
                                    <label>Address line 1</label>
                                  </div>
                                  <div class="col-md-6">
                                    <p>{{!empty(Auth::user()->addressline1) ? Auth::user()->addressline1 : 'N/A' }}</p>
                                  </div>
                                </div>
                                <div class="row">
                                  <div class="col-md-6">
                                    <label>Address line 2</label>
                                  </div>
                                  <div class="col-md-6">
                                    <p>{{!empty(Auth::user()->addressline2) ? Auth::user()->addressline2 : 'N/A' }}</p>
                                  </div>
                                </div>
                                <div class="row">
                                  <div class="col-md-6">
                                    <label>Zipcode</label>
                                  </div>
                                  <div class="col-md-6">
                                    <p>{{!empty(Auth::user()->zipcode) ? Auth::user()->zipcode : 'N/A' }}</p>
                                  </div>
                                </div>
                                <div class="row">
                                  <div class="col-md-6">
                                    <label>State</label>
                                  </div>
                                  <div class="col-md-6">
                                    <p>{{!empty(Auth::user()->state) ? Auth::user()->state : 'N/A' }}</p>
                                  </div>
                                </div>
                                <div class="row">
                                  <div class="col-md-6">
                                    <label>City</label>
                                  </div>
                                  <div class="col-md-6">
                                    <p>{{!empty(Auth::user()->city) ? Auth::user()->city : 'N/A' }}</p>
                                  </div>
                                </div>
                                <div class="row">
                                  <div class="col-md-6">
                                    <label>Country</label>
                                  </div>
                                  <div class="col-md-6">
                                    <p>{{!empty(Auth::user()->country) ? Auth::user()->country : 'N/A' }}</p>
                                  </div>
                                </div>
                              </div>
                            </div>
                          </div>
                        </div>
                      </form>           
                    </div>
                  </div>
                </div>
              </div>
              <form method ="post" action="{{ url('auth/admin/changepassword') }}" class="registerform form-horizontal" enctype="multipart/form-data">
              <div class="panel panel-default">
                <div class="panel-heading">
                  <h4 class="panel-title">Change Password</h4>
                </div>
                <div class="panel-body">  
                  <div class="col-md-9">             
                    <label for="current-password" class="col-sm-4 control-label">Current Password</label>
                    <div class="col-sm-8">
                      <div class="form-group">
                        <input type="hidden" name="_token" value="{{ csrf_token() }}"> 
                        <input type="password" class="form-control" id="current-password" name="current_password" placeholder="Password">
                      </div>
                    </div>
                    <label for="password" class="col-sm-4 control-label">New Password</label>
                    <div class="col-sm-8">
                      <div class="form-group">
                        <input type="password" class="form-control" id="password" name="password" placeholder="Password">
                      </div>
                    </div>
                    <label for="password_confirmation" class="col-sm-4 control-label">Re-enter Password</label>
                    <div class="col-sm-8">
                      <div class="form-group">
                        <input type="password" class="form-control" id="password_confirmation" name="password_confirmation" placeholder="Re-enter Password">
                      </div>
                    </div>
                  </div>
                  <div class="form-group">
                    <div class="col-sm-offset-5 col-sm-6">
                      <button type="submit" class="btn btn-danger">Submit</button>
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