@extends('master.master')
@section('content')
@if (!empty($data['id']))
@php $action = 'update/'.$data['id'] @endphp
@php $template = 'Edit Record' @endphp
@else
@php $action = 'store' @endphp
@php $template = 'Add Record' @endphp
@endif
<div class="product-sales-area mg-tb-30">
  <div class="container-fluid">
    <div class="row">
      <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
        <div class="product-sales-chart">
          <div class="portlet-title">
            <div class="row">
              <div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
                <div class="caption pro-sl-hd">
                  <span class="caption-subject text-uppercase"><b>{{$template}} {{ucwords($data['type'])}}</b></span>
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
          
          <form method ="post" action="{{ url('auth/admin/post/'.$action) }}" class="postform form-horizontal" enctype="multipart/form-data">
            {{ csrf_field() }}
            <input type="hidden" name="post_type" value="{{$data['type']}}">
            <input type="hidden" name="slug"value="{{ $data['postData']['slug'] ? $data['postData']['slug'] : false }}"">
            <div class="panel-body">              
              <div class="col-lg-8 col-md-8 col-sm-8 col-xs-12">
                <div class="panel panel-primary">
                  <div class="panel-heading">
                    <h4 class="panel-title">{{$template}}</h4>
                  </div>
                  <div class="panel-body">
                    <div class="review-content-section">
                      <div class="input-group mg-b-pro-edt {{ $errors->has('title') ? 'has-error' : '' }}">
                        <span class="input-group-addon"><i class="fa fa-sticky-note-o" aria-hidden="true"></i></span>
                        <input type="text" class="form-control" name="title" value="{{ $data['postData']['title'] ? $data['postData']['title'] : old('title') }}" placeholder="Title" /> 
                      </div>
                      <div class="input-group mg-b-pro-edt">
                        <textarea class="form-control" name="content" id="summernote1" placeholder="Content" >{{ $data['postData']['content'] ? $data['postData']['content'] : old('content') }}</textarea> 
                      </div>
                      <div class="input-group mg-b-pro-edt">
                        <textarea class="form-control" name="excerpt" id="summernote2" placeholder="Excerpt" >{{ $data['postData']['excerpt'] ? $data['postData']['excerpt'] : old('excerpt') }}</textarea> 
                      </div>
                    </div>
                  </div>
                </div>
              </div>
              <div class="col-lg-4 col-md-4 col-sm-4 col-xs-12">
                <div class="panel panel-primary">
                  <div class="panel-heading">
                    <h4 class="panel-title">Featured Image</h4>
                  </div>
                  <div class="panel-body">
                    <div class="review-content-section">
                      <div class="input-group mg-b-pro-edt">
                        @if($data['postData']['featured_image'])                    
                        @php $featured_image = asset('featured/medium/'.$data['postData']['featured_image'])  @endphp
                        @else
                        @php $featured_image = 'https://bootdey.com/img/Content/avatar/avatar6.png'; @endphp
                        @endif
                        
                          <img src="{{$featured_image}}" class="img-circle post-featured-image file-input" alt="User featured_image" title="Change Pic">
                          <input id="featured_image" name="featured_image" type="file" class="file-loading" style="margin-left: 15%; display: none;">
                      </div>                     
                    </div>
                  </div>
                </div>
              </div>
              <div class="col-lg-4 col-md-4 col-sm-4 col-xs-12">
                <div class="panel panel-primary">
                  <div class="panel-heading">
                    <h4 class="panel-title">Meta Info</h4>
                  </div>
                  <div class="panel-body">
                    <div class="review-content-section">
                      <div class="input-group mg-b-pro-edt">
                        <span class="input-group-addon"><i class="fa fa-sticky-note-o" aria-hidden="true"></i></span>
                        <input type="text" class="form-control" name="keywords" value="{{ $data['keywords'] ? $data['keywords'] : old('keywords') }}" placeholder="keywords" /> 
                      </div>
                      <div class="input-group mg-b-pro-edt">
                        <span class="input-group-addon"><i class="fa fa-sticky-note-o" aria-hidden="true"></i></span>
                        <input type="text" class="form-control" name="description" value="{{ $data['description'] ? $data['description'] : old('description') }}" placeholder="Description" /> 
                      </div>
                    </div>
                  </div>
                </div>
              </div>
              @if (\Route::current()->getName() != 'add-page' && \Route::current()->getName() != 'edit-page')              
            
              <div class="col-lg-4 col-md-4 col-sm-4 col-xs-12">
                <div class="panel panel-primary">
                  <div class="panel-heading">
                    <h4 class="panel-title">Categories</h4>
                  </div>
                  <div class="panel-body">
                  <!-- Get store save categries in $ cats -->
                    @php $Cats = array(); @endphp
                    @foreach($postCats as $key => $cat)
                      @php $Cats[] = $cat->category_id; @endphp 
                    @endforeach
               
                     <div id="tree1">
                      @foreach($categories as $category)
                      <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12 cat-{{$category->id}}">
                      <div class="i-checks pull-left">
                          <label>
                        <input type="checkbox" name="category[]" value="{{ $category->id }}" {{ in_array($category->id, $Cats ) ? 'checked' : '' }} > <i></i>  {{ $category->title }}
                        </label>
                        </div>
                        @if(count($category->childs))
                        @include('master/managePostChild',['childs' => $category->childs])
                        @endif
                      </div>
                      @endforeach
                    </div>
                  </div>
                </div>
              </div>
              @endif

              <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
              <div class="panel panel-primary">
                  <div class="panel-heading">
                    <h4 class="panel-title">Upload Slider Images</h4>
                  </div>
                  <div class="panel-body">
                <input type="file" id="uploadFile" name="uploadFile[]" multiple/>
                <div id="image_preview">
                  @if(!empty($data['post_slider']))
                  @foreach($data['post_slider'] as $key => $value)
                  <div class="postslide-item postslide{{ $key }}">
                    <div class="slide-img">
                      <img src="{{asset('images/sliders/'.$value)}}" alt="slide-{{ $key+1 }}" title="slide-{{ $key+1 }}">
                    </div>
                    <div class="slide-img-del">
                      <span class="delete-slider" data-url="{{ url('auth/admin/del/slide') }}" data-id="{{$key}}" post-id="{{$data['id']}}" style="cursor: pointer;">X</span>
                    </div>
                  </div>
                  @endforeach
                  @endif
                </div>
              </div>
              </div>
            <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                <div class="form-group review-pro-edt pull-right">
                  <button type="submit" class="btn btn-primary">Save</button>
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