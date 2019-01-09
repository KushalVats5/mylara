<div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
    @if (Session::has('error'))
           <div class="alert alert-danger alert-dismissible">
            <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
            <strong>Failed!</strong> {{ Session::get('error') }}
            </div>
    @endif
     @if (Session::has('success'))
           <div class="alert alert-success alert-dismissible">
            <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
            <strong>Success!</strong> {{ Session::get('success') }}
            </div>
    @endif
    @if($errors->all())
        <div class="alert alert-danger alert-dismissible">
        <ul>
            @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
            @endforeach
        </ul>
        </div>
    @endif
</div>