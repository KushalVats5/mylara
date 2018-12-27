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
            <form method ="post" action="{{ url('auth/admin/post/store') }}" class="registerform form-horizontal" enctype="multipart/form-data">
              {{ csrf_field() }}
              <div class="panel panel-default">
                <div class="panel-heading">
                  <h4 class="panel-title">Create Post</h4>
                </div>
                <div class="panel-body">
                  <div class="col-md-8">
                  <div class="form-group col-md-12">
                      <div class="col-sm-12">
                      <label class="control-label">Title</label>
                        <input type="text" class="form-control" name="title" value="{{ old('title') }}" placeholder="Title" /> 
                        @if ($errors->has('name'))
                        <span style="color:red;">{{ $errors->first('name') }}</span>
                        @endif                   
                      </div>
                    </div>
                    <div class="form-group col-md-12">
                      <div class="col-sm-12">
                      <label class="control-label">Content</label>
                        <textarea class="form-control" name="content" id="post-content" placeholder="Content" >{{ old('content') }}</textarea> 
                        @if ($errors->has('content'))
                        <span style="color:red;">{{ $errors->first('content') }}</span>
                        @endif                   
                      </div>
                    </div>
                    <div class="form-group col-md-12">
                      <div class="col-sm-12">
                      <label class="control-label">Excerpt</label>
                        <textarea class="form-control" name="excerpt" id="post-excerpt" placeholder="Excerpt" >{{ old('excerpt') }}</textarea> 
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
                        <img src="https://bootdey.com/img/Content/avatar/avatar6.png" class="img-circle profile-avatar" alt="User avatar">
                        <input id="avatar" name="avatar" type="file" class="file-loading" style="margin-left: 40%;">
                      </div>                 

                      <div class="form-group col-md-12">
                        <div class="col-sm-12">
                        <label class="control-label">Description</label>
                          <input type="text" class="form-control" name="description" value="{{ old('description') }}" placeholder="Description" /> 
                          @if ($errors->has('name'))
                          <span style="color:red;">{{ $errors->first('description') }}</span>
                          @endif                   
                        </div>
                      </div>
                      <div class="form-group col-md-12">
                        <div class="col-sm-12">
                        <label class="control-label">Keywords</label>
                          <input type="text" class="form-control" name="keywords" value="{{ old('keywords') }}" placeholder="keywords" /> 
                          @if ($errors->has('name'))
                          <span style="color:red;">{{ $errors->first('keywords') }}</span>
                          @endif                   
                        </div>
                      </div>
                      <!-- <div class="form-group col-md-12">
                        <label class="col-sm-2 control-label">Author</label>
                        <div class="col-sm-10">
                          <input type="text" class="form-control" name="author" value="{{ old('author') }}" placeholder="Title" /> 
                          @if ($errors->has('name'))
                          <span style="color:red;">{{ $errors->first('author') }}</span>
                          @endif                   
                        </div>
                      </div> -->

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