@extends('master.master')
@section('content')
<!-- Static Table Start -->
<div class="data-table-area mg-tb-15">
  <div class="container-fluid">
    <div class="row">
      <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
        <div class="sparkline13-list">
          <div class="sparkline13-hd">
            <div class="main-sparkline13-hd">
              <h1>Products <span class="table-project-n">Data</span> Table</h1>
            </div>
          </div>
          <div class="sparkline13-graph">
            <div class="datatable-dashv1-list custom-datatable-overright">
              <div id="toolbar">
                <select class="form-control">
                  <option value="">Export Basic</option>
                  <option value="all">Export All</option>
                  <option value="selected">Export Selected</option>
                </select>
              </div>
              <div class="add-product">
                  <a href="{{ url('auth/admin/adduser') }}">Add User</a>
              </div>
              <table id="table" data-toggle="table" data-pagination="true" data-search="true" data-show-columns="true" data-show-pagination-switch="true" data-show-refresh="true" data-key-events="true" data-show-toggle="true" data-resizable="true" data-cookie="true"
              data-cookie-id-table="saveId" data-show-export="true" data-click-to-select="true" data-toolbar="#toolbar">
              <thead>
                <tr>
                  <th data-field="state" data-checkbox="true"></th>
                  <th data-field="id">#</th>
                  <th data-field="name" data-editable="false">Display Name</th>
                  <th data-field="email" data-editable="false">E-Mail</th>
                  <th data-field="mobile" data-editable="false">Mobile</th>
                  <th data-field="role" data-editable="false">Role</th>
                  <th data-field="dob" data-editable="false">DOB</th>
                  <th data-field="country" data-editable="false">Country</th>
                  <th data-field="status" data-editable="false">Status</th>
                  <th data-field="action">Action</th>
                </tr>
              </thead>
              <tbody>                
                @php $pos=1 @endphp 
                @foreach($users as $key => $user)
                  <tr>
                  <td></td>
                  <td>{{$pos}}</td>
                  <td>{{$user->name}}</td>
                  <td>{{$user->email}}</td>
                  <td>{{$user->mobile_number}}</td>
                  <td>{{$user->user_type}}</td>
                  <td>{{$user->dob}}</td>                   
                  <td>{{$user->country}}</td>
                    <td> 
                  <div class="material-switch pull-right">
                            <input id="status{{$key}}" name="status{{$key}}" class="chkSelect" type="checkbox" data-id="{{$user->id}}" data-url="{{ url('auth/admin/user/isactive') }}" data-value="{{ $user->is_active == 1 ? 0 : 1 }}" {{ $user->is_active == 1 ? 'checked' : '' }}/>
                            <label for="status{{$key}}" class="label-primary"></label>
                        </div>  
                  </td>
                  <td>
                    <button data-toggle="tooltip" title="" class="pd-setting-ed" data-original-title="Edit"><a href="{{ url('auth/admin/user/edit/'.$user->id) }}" class=""><i class="fa fa-pencil-square-o" aria-hidden="true"></i></a></button>
                    <button data-toggle="tooltip" title="" class="pd-setting-ed" data-original-title="Trash"><a href="{{ url('auth/admin/user/del/'.$user->id) }}"class=""><i class="fa fa-trash-o" aria-hidden="true"></i></a></button>
                </td>
                
                </tr>   
                @php $pos++ @endphp 
                 @endforeach
              </tbody>
            </table>
          </div>
        </div>
      </div>
    </div>
  </div>
</div>
</div>
@endsection