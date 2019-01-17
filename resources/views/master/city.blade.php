@extends('master.master')
@section('content')
@php $edit_id = Request::segment(4); @endphp
<div class="product-sales-area mg-tb-30">
  <div class="container-fluid">
    <div class="row">
      <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
        <div class="product-sales-chart">
          <div class="portlet-title">
            <div class="row">
              <div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
                <div class="caption pro-sl-hd">
                  <span class="caption-subject text-uppercase"><b>{{isset($edit_id) ? 'Update' : 'Add'}} City</b></span>
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
              <div class="panel-heading">{{isset($edit_id) ? 'Update' : 'Add'}} City</div>
              <div class="panel-body">
                <div class="row">
                  <div class="col-md-6">
                  <form class="city-form" id="city_form" action="{{url('auth/admin/storecity/'.$edit_id)}}" method="POST">
                    <div class="form-group {{ $errors->has('country_id') ? 'has-error' : '' }}">
                     <select class="form-control" name="country_id" id="country_select">
                       <option value="">--Select Country--</option>
                       @foreach($countries as $key => $value)
                       <option value="{{$value['id']}}" @if (!empty($city['country_id']) && $city['country_id'] == $value['id'] )  {{'selected' }} @else {{''}} @endif>{{$value['name']}}</option>
                       @endforeach
                     </select>
                      <span class="text-danger">{{ $errors->first('country_id') }}</span>
                    </div>
                    <div class="form-group {{ $errors->has('state_id') ? 'has-error' : '' }}">
                     <select class="form-control" name="state_id" id="state_select">
                       <option value="">--Select State--</option>
                       @foreach($states as $key => $value)
                       <option value="{{$value['id']}}" @if (!empty($city['state_id']) && $city['state_id'] == $value['id'] )  {{'selected' }} @else {{''}} @endif>{{$value['name']}}</option>
                       @endforeach
                     </select>
                      <span class="text-danger">{{ $errors->first('state_id') }}</span>
                    </div>
                    <div class="form-group {{ $errors->has('name') ? 'has-error' : '' }}">
                    
                      @if(!empty($city['name']) ) 
                        @php $cityName = $city['name'];  @endphp
                      @else 
                        @php $cityName = '';  @endphp
                      @endif
                    
                      <input type="text" class="form-control" name="name" placeholder="Name" value="{{ !empty($cityName) ? $cityName : old('name') }}">
                      <span class="text-danger">{{ $errors->first('name') }}</span>
                    </div>
                    <div class="form-group">
                    <button class="btn btn-primary" type="submit">{{isset($edit_id) ? 'Update' : 'Save'}}</button>
                    </div>
                    </form>
                  </div>
                  <strong>current_page:</strong>{{$list['current_page']}}<br>
                  <strong>first_page_url:</strong>{{$list['first_page_url']}}<br>
                  <strong>last_page:</strong>{{$list['last_page']}}<br>
                  <strong>last_page_url:</strong>{{$list['last_page_url']}}<br>
                  <strong>next_page_url:</strong>{{$list['next_page_url']}}<br>
                  <strong>path:</strong>{{$list['path']}}<br>
                  <strong>per_page:</strong>{{$list['per_page']}}<br>
                  <strong>prev_page_url:</strong>{{$list['prev_page_url']}}<br>
                  <strong>to:</strong>{{$list['to']}}<br>
                  <strong>total:</strong>{{$list['total']}}<br>
                  <div class="col-md-12">
                    <div class="table-responsive">
                      <!--Table-->
                      <table class="table table-striped">

                        <!--Table head-->
                        <thead>
                          <tr>
                            <th>#</th>
                            <th>City Name</th>
                            <th>State Name</th>
                            <th>Country Name</th>
                            <th>Action</th>
                          </tr>
                        </thead>
                        <!--Table head-->
                        <!--Table body-->
                        <tbody>

                        @if( $list )
                        @php $i = 1; @endphp
                         @foreach($list['data'] as $key => $value)
                          <tr>
                            <th scope="row">{{$i++}}</th>
                            <td>{{$value['name']}}</td>
                            <td>{{$value['state']['name']}}</td>
                            <td>{{$value['country']['name']}} </td>
                            <td>
                              <button data-toggle="tooltip" title="" class="pd-setting-ed " data-original-title="Edit"><a href="{{url('auth/admin/city/'.$value['id'])}}" class=""><i class="fa fa-pencil-square-o" aria-hidden="true"></i></a></button>
                              <button data-toggle="tooltip" title="" class="pd-setting-ed" data-original-title="Trash"><a href="{{ url('auth/admin/city/del/'.$value['id']) }}"class=""><i class="fa fa-trash-o" aria-hidden="true"></i></a></button>
                            </td>
                          </tr>
                          @endforeach
                          @endif
                        </tbody>
                        <!--Table body-->
                      </table>
                      <!--Table-->
                      <nav aria-label="...">
                        <ul class="pagination">
                          <li class="page-item {{$list['current_page']==1 ? 'disabled' : ''}}">
                            <a class="page-link" href="{{$list['first_page_url']}}" tabindex="-1">First</a>
                          </li>
                          <li class="page-item {{$list['current_page']==1 ? 'disabled' : ''}}">
                            <a class="page-link" href="{{ $list['prev_page_url'] }}" tabindex="-1">Previous</a>
                          </li>
                          <li class="page-item"><a class="page-link" href="#">1</a></li>
                          <li class="page-item active">
                            <a class="page-link" href="">2 <span class="sr-only"></span></a>
                          </li>
                          <li class="page-item"><a class="page-link" href="#">3</a></li>
                          <li class="page-item {{$list['current_page']== $list['last_page'] ? 'disabled' : ''}}">
                            <a class="page-link" href="{{ $list['next_page_url'] }}">Next</a>
                          </li>
                          <li class="page-item {{$list['current_page']== $list['last_page'] ? 'disabled' : ''}}">
                            <a class="page-link" href="{{$list['last_page_url']}}">Last</a>
                          </li>
                        </ul>
                      </nav>
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