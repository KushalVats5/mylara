@include('admin.includes.header')
<link rel="stylesheet" href="//code.jquery.com/ui/1.12.1/themes/base/jquery-ui.css">
<div class="container-fluid display-table">
  <div class="row display-table-row">

    @include('admin.includes.sidebar')

    <div class="col-md-10 col-sm-11 display-table-cell v-align">
      <!--<button type="button" class="slide-toggle">Slide Toggle</button> -->
      <div class="row">
       @include('admin.includes.inner-header')
     </div>
     <div class="user-dashboard">
      <!-- <h1>Hello, {{$user->name}}</h1> -->
      <div class="row">
        <div class="col-md-12 col-sm-12 col-xs-12 gutter">
          <div class="sales">
            <h2>Edit User</h2>
            <div class="btn-group">
              <div class="panel-body">
                @if (count($errors) > 0)
                <div class="alert alert-danger">
                  <strong>Whoops!</strong> There were some problems with your input.<br><br>
                  <ul>
                    @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                    @endforeach
                  </ul>
                </div>
                @endif

                @if(session()->has('message'))
                <div class="alert alert-success alert-dismissible">
                  <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
                  <strong>Success!</strong> {{ session()->get('message') }}
                </div>
                @endif
                <div class="container bootstrap snippets">
                  <div class="row">
                    <div class="col-xs-12 col-sm-9 col-md-offset-1">
                    
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
@include('admin.includes.inner-footer')
</div>
</div>

@include('admin.includes.popup.add-page-popup')
@include('admin.includes.popup.feedback-popup')

@include('admin.includes.inner-footer')
<style type="text/css">
img.img-circle.profile-avatar {
  width: 20%;
}
</style>