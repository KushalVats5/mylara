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

  <div class="row">
    <div class="col-md-12 col-sm-12 col-xs-12 gutter">
      <div class="container-inner">
        <div class="row">
          <div class="col-xs-12 col-sm-12">
            <form method ="post" action="{{ url('auth/admin/post/'.$action) }}" class="postform form-horizontal" enctype="multipart/form-data">
              {{ csrf_field() }}
              <input type="hidden" name="post_type" value="{{$data['type']}}">
              <input type="hidden" name="slug"value="{{ $data['postData']['slug'] ? $data['postData']['slug'] : false }}"">
              <div class="panel panel-default">
                <div class="panel-heading">
                  <h4 class="panel-title">Create {{ucwords($data['type'])}}</h4>
                </div>
                <div class="panel-body">
                  <div class="col-md-8">
                  <div class="form-group col-md-12">
                      <div class="col-sm-12">
                      <label class="control-label">Title</label>
                        <input type="text" class="form-control" name="title" value="{{ $data['postData']['title'] ? $data['postData']['title'] : old('title') }}" placeholder="Title" /> 
                        @if ($errors->has('title'))
                        <span style="color:red;">{{ $errors->first('title') }}</span>
                        @endif                   
                      </div>
                    </div>
                    <div class="form-group col-md-12">
                      <div class="col-sm-12">
                      <label class="control-label">Content</label>
                        <textarea class="form-control" name="content" id="post-content" placeholder="Content" >{{ $data['postData']['content'] ? $data['postData']['content'] : old('content') }}</textarea> 
                        @if ($errors->has('content'))
                        <span style="color:red;">{{ $errors->first('content') }}</span>
                        @endif                   
                      </div>
                    </div>
                    <div class="form-group col-md-12">
                      <div class="col-sm-12">
                      <label class="control-label">Excerpt</label>
                        <textarea class="form-control" name="excerpt" id="post-excerpt" placeholder="Excerpt" >{{ $data['postData']['excerpt'] ? $data['postData']['excerpt'] : old('excerpt') }}</textarea> 
                        @if ($errors->has('excerpt'))
                        <span style="color:red;">{{ $errors->first('excerpt') }}</span>
                        @endif                   
                      </div>
                    </div>
                    <div class="form-group col-md-12">
                      <div class="col-sm-12">
                        <button type="submit" class="btn btn-primary pull-right add-project">Save</button>
                      </div>
                    </div>
                  </div>
                  <div class="col-md-4">
                    <div class="form-group">
                      <div class="col-md-12">
                        <?php 

                        ?>
                        <div id="kv-avatar-errors" class="center-block" style="width:800px;display:none">
                        </div>
                      </div>
                      <div class="panel-body text-center">

                         @if($data['postData']['featured_image'])                    
                          @php $featured_image = asset('featured/medium/'.$data['postData']['featured_image'])  @endphp
                        @else
                          @php $featured_image = 'https://bootdey.com/img/Content/avatar/avatar6.png'; @endphp
                        @endif
                       <img src="{{$featured_image}}" class="img-circle post-featured-image" alt="User featured_image">
                        <input id="featured_image" name="featured_image" type="file" class="file-loading" style="margin-left: 40%;">
                      </div>                 

                      <div class="form-group col-md-12">
                        <div class="col-sm-12">
                        <label class="control-label">Description</label>
                          <input type="text" class="form-control" name="description" value="{{ $data['description'] ? $data['description'] : old('description') }}" placeholder="Description" /> 
                          @if ($errors->has('name'))
                          <span style="color:red;">{{ $errors->first('description') }}</span>
                          @endif                   
                        </div>
                      </div>
                      <div class="form-group col-md-12">
                        <div class="col-sm-12">
                        <label class="control-label">Keywords</label>
                          <input type="text" class="form-control" name="keywords" value="{{ $data['keywords'] ? $data['keywords'] : old('keywords') }}" placeholder="keywords" /> 
                          @if ($errors->has('name'))
                          <span style="color:red;">{{ $errors->first('keywords') }}</span>
                          @endif                   
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
  </div>
</div>
<script>
  CKEDITOR.replace( 'post-content' );
  CKEDITOR.replace( 'post-excerpt' );
</script>
@endsection