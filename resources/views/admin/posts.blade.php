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
                      <th style="width:10%;"><em class="fa fa-cog"></em></th>
                      <th style="width:20%;">Title</th>
                      <th style="width:50%;">Excerpt</th>
                      <th style="width:10%;">Post Type</th>
                      <th style="width:10%;">Active</th>
                    </tr> 
                  </thead>
                  <tbody id="myTable">
                    @foreach($posts as $key => $post)
                    <tr>
                      <td align="center"  style="width:10%;">
                        <a href="{{ url('auth/admin/add/'.$post->post_type.'/'.$post->id) }}" class="btn btn-default"><em class="fa fa-pencil"></em></a>
                        <a href="{{ url('auth/admin/post/del/'.$post->id) }}"class="btn btn-danger"><em class="fa fa-trash"></em></a>
                      </td>
                      <td  style="width:20%;">{{$post->title}}</td>
                      <td  style="width:50%;">{!! html_entity_decode($post->excerpt) !!}</td>
                      <!-- <td  style="width:50%;">sdnfjhkjs</td> -->
                      <td  style="width:10%;">{{$post->post_type}}</td>
                      <td  style="width:10%;">
                        <div class="input-group">
                       
                        <div class="material-switch pull-right">
                            <input id="status{{$key}}" name="status{{$key}}" class="chkSelect" type="checkbox" data-id="{{$post->id}}" data-value="{{ $post->active == 1 ? 0 : 1 }}" {{ $post->active == 1 ? 'checked' : '' }}/>
                            <label for="status{{$key}}" class="label-primary"></label>
                        </div>
                      </div>
                      <!-- {{ $post->is_active == 1 ? 'Yes' : 'No' }}  -->
                      </td>
                    </tr>
                    @endforeach
                  </tbody>
                </table>
                {{ $posts->links() }}
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