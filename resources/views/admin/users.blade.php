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
  <div class="row">
    <div class="col-md-12 col-sm-12 col-xs-12 gutter">
      <div class="container-inner">
        <div class="row">
          <div class="col-md-12">
            <div class="panel panel-default panel-table">
              <div class="panel-heading">
                <div class="row">
                  <div class="col col-xs-6">
                  <h3 class="panel-title"><i class="fa fa-group" aria-hidden="true"></i> Users</h3>
                  </div>
                  <div class="col col-xs-6 text-right">
                    <button type="button" class="btn btn-sm btn-primary btn-create">Create New</button>
                  </div>
                </div>
              </div>
              <div class="panel-body table-responsive">
                <table class="table table-striped table-bordered table-list">
                  <thead>
                    <tr>
                      <th><em class="fa fa-cog"></em></th>
                      <th>Username</th>
                      <th>E-Mail</th>
                      <th class="hidden-xs">ID</th>
                      <th>Role</th>
                      <th>DOB</th>
                      <th>Country</th>
                      <th>Active</th>
                    </tr> 
                  </thead>
                  <tbody id="myTable">
                    @foreach($users as $key => $user)
                    <tr>
                      <td align="center">
                        <a href="{{ url('auth/admin/user/edit/'.$user->id) }}" class="btn btn-default"><em class="fa fa-pencil"></em></a>
                        <a href="{{ url('auth/admin/user/del/'.$user->id) }}"class="btn btn-danger"><em class="fa fa-trash"></em></a>
                      </td>
                      <td>{{$user->name}}</td>
                      <td>{{$user->email}}</td>
                      <td class="hidden-xs">8010631469</td>
                      <td>{{$user->user_type}}</td>
                      <td>{{$user->dob}}</td>
                      <td>{{$user->country}}</td>
                      <td>
                        <div class="input-group">
                       
                        <div class="material-switch pull-right">
                            <input id="status{{$key}}" name="status{{$key}}" class="chkSelect" type="checkbox" data-id="{{$user->id}}" data-value="{{ $user->is_active == 1 ? 0 : 1 }}" {{ $user->is_active == 1 ? 'checked' : '' }}/>
                            <label for="status{{$key}}" class="label-primary"></label>
                        </div>
                      </div>
                      <!-- {{ $user->is_active == 1 ? 'Yes' : 'No' }}  -->
                      </td>
                    </tr>
                    @endforeach
                  </tbody>
                </table>
              </div>
              <div class="panel-footer">
                <div class="row">
                  <div class="col col-xs-4">Page 1 of 5
                  </div>
                  <div class="col col-xs-8">
                    <ul class="pagination hidden-xs pull-right" id="myPager">
                    </ul>
                    <ul class="pagination visible-xs pull-right">
                      <li><a href="#">«</a></li>
                      <li><a href="#">»</a></li>
                    </ul>
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
</div>
@endsection