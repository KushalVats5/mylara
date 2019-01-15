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
                  <span class="caption-subject text-uppercase"><b>Add City</b></span>
                </div>
              </div>
            </div>
          </div>
          @if (!empty($data['id']))
          @php $action = 'update/'.$data['id'] @endphp
          @else
          @php $action = 'store' @endphp
          @endif
          <div class="">     
            <div class="panel panel-primary">
              <div class="panel-heading">Add City</div>
              <div class="panel-body">
                <div class="row">
                  <div class="col-md-6">
                  <form class="city-form" id="city_form" action="{{route('city.store')}}" method="POST">
                    <div class="form-group {{ $errors->has('name') ? 'has-error' : '' }}">
                      <input type="text" class="form-control" name="name" placeholder="Name" value="{{old('name')}}">
                      <span class="text-danger">{{ $errors->first('name') }}</span>
                    </div>
                    <div class="form-group {{ $errors->has('country_id') ? 'has-error' : '' }}">
                     <select class="form-control" name="country_id" id="country_select">
                       <option value="">--Select Country--</option>
                       @foreach($countries as $key => $value)
                       <option value="{{$value['id']}}">{{$value['name']}}</option>
                       @endforeach
                     </select>
                      <span class="text-danger">{{ $errors->first('country_id') }}</span>
                    </div>
                    <div class="form-group {{ $errors->has('state_id') ? 'has-error' : '' }}">
                     <select class="form-control" name="state_id" id="state_select">
                       <option value="">--Select State--</option>
                       @foreach($states as $key => $value)
                       <option value="{{$value['id']}}">{{$value['name']}}</option>
                       @endforeach
                     </select>
                      <span class="text-danger">{{ $errors->first('state_id') }}</span>
                    </div>
                    <div class="form-group">
                    <button class="btn btn-primary" type="submit">Add New</button>
                    </div>
                    </form>
                  </div>
                  <div class="col-md-12">
                    <div class="table-responsive">
                      <!--Table-->
                      <table class="table table-striped">

                        <!--Table head-->
                        <thead>
                          <tr>
                            <th>#</th>
                            <th>City Name</th>
                            <th>State_Name</th>
                            <th>Country Name</th>
                            <th>Action</th>
                          </tr>
                        </thead>
                        <!--Table head-->
                        <!--Table body-->
                        <tbody>
                          <tr>
                            <th scope="row">1</th>
                            <td>Kate</td>
                            <td>Moss</td>
                            <td>USA / The United Kingdom / China / Russia </td>
                            <td>
                              <button data-toggle="tooltip" title="" class="pd-setting-ed " data-original-title="Edit"><a href="{{url('auth/admin/city/1')}}" class=""><i class="fa fa-pencil-square-o" aria-hidden="true"></i></a></button>
                              <button data-toggle="tooltip" title="" class="pd-setting-ed" data-original-title="Trash"><a href="{{ url('auth/admin/user/del/') }}"class=""><i class="fa fa-trash-o" aria-hidden="true"></i></a></button>
                            </td>
                          </tr>
                        </tbody>
                        <!--Table body-->
                      </table>
                      <!--Table-->
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
</div>
@endsection