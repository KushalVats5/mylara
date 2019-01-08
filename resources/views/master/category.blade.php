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
                  <span class="caption-subject text-uppercase"><b>Add Category</b></span>
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
          @if (!empty($data['id']))
          @php $action = 'update/'.$data['id'] @endphp
          @else
          @php $action = 'store' @endphp
          @endif
          <div class="">     
            <div class="panel panel-primary">
              <div class="panel-heading">Manage Category</div>
              <div class="panel-body">
                <div class="row">
                  <div class="col-md-6">
                    <h3>Category List</h3>
                    <div id="tree1">
                      @foreach($categories as $category)
                      <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                      <div class="i-checks pull-left">
                          <label>
                        <input type="checkbox" name="category[]" value="{{ $category->id }}"> <i></i>  {{ $category->title }}
                        </label>
                        </div>
                        @if(count($category->childs))
                        @include('master/manageChild',['childs' => $category->childs])
                        @endif
                      </div>
                      @endforeach
                    </div>
                  </div>
                  <div class="col-md-6">
                    <h3>Add New Category</h3>

                    {!! Form::open(['route'=>'add.category']) !!}

                    <!-- @if ($message = Session::get('success'))
                    <div class="alert alert-success alert-block">
                      <button type="button" class="close" data-dismiss="alert">×</button> 
                      <strong>{{ $message }}</strong>
                    </div>
                    @endif -->

                    <div class="form-group {{ $errors->has('title') ? 'has-error' : '' }}">
                      {!! Form::label('Title:') !!}
                      {!! Form::text('title', old('title'), ['class'=>'form-control', 'placeholder'=>'Enter Title']) !!}
                      <span class="text-danger">{{ $errors->first('title') }}</span>
                    </div>

                    <div class="form-group {{ $errors->has('parent_id') ? 'has-error' : '' }}">
                      {!! Form::label('Category:') !!}
                      {!! Form::select('parent_id',$allCategories, old('parent_id'), ['class'=>'form-control', 'placeholder'=>'Select Category']) !!}
                      <span class="text-danger">{{ $errors->first('parent_id') }}</span>
                    </div>

                    <div class="form-group">
                    <button class="btn btn-primary">Add New</button>
                    </div>

                    {!! Form::close() !!}

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