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
                  <span class="caption-subject text-uppercase"><b>Add State</b></span>
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
              <div class="panel-heading">Add State</div>
              <div class="panel-body">
                <div class="row">
                  <div class="col-md-6">
                  <form class="state-form" id="state_form" action="{{route('state.store')}}" method="POST">
                    <div class="form-group {{ $errors->has('name') ? 'has-error' : '' }}">
                      <input type="text" class="form-control" name="name" placeholder="Name" value="{{old('name')}}">
                      <span class="text-danger">{{ $errors->first('name') }}</span>
                    </div>
                    <div class="form-group {{ $errors->has('country_id') ? 'has-error' : '' }}">
                     <select class="form-control" name="country_id">
                       <option value="">--Select Country--</option>
                       @foreach($countries as $key => $value)
                       <option value="{{$value['id']}}">{{$value['name']}}</option>
                       @endforeach
                     </select>
                      <span class="text-danger">{{ $errors->first('country_id') }}</span>
                    </div>

                    <div class="form-group">
                    <button class="btn btn-primary" type="submit">Add New</button>
                    </div>
                    </form>
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