@include('inc.header');
<section id="inner-headline">
  <div class="container">
    <div class="row">
      <div class="col-lg-12">
        <ul class="breadcrumb">
          <li><a href="#"><i class="fa fa-home"></i></a><i class="icon-angle-right"></i></li>
          <li class="active">Contact</li>
        </ul>
      </div>
    </div>
  </div>
</section>
<section id="content">
  <div class="map">
    <iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d22864.11283411948!2d-73.96468908098944!3d40.630720240038435!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x89c24fa5d33f083b%3A0xc80b8f06e177fe62!2sNew+York%2C+NY%2C+USA!5e0!3m2!1sen!2sbg!4v1540447494452" width="100%" height="380" frameborder="0" style="border:0" allowfullscreen></iframe>
  </div>
  <div class="container">
    <div class="row">
      @if(Session::has('success'))
      <div class="alert alert-success">
        {{ Session::get('success') }}
      </div>
      @endif
      <div class="col-md-8 col-md-offset-2">
        <h2>Contact us <small>get in touch with us by filling form below</small></h2>
        <hr class="colorgraph">
        <div id="sendmessage">Your message has been sent. Thank you!</div>
        <div id="errormessage"></div>
        {!! Form::open(['route'=>'contactus.store']) !!}
        <div class="form-group {{ $errors->has('name') ? 'has-error' : '' }}">
          <!-- {!! Form::label('Name:') !!} -->
          {!! Form::text('name', old('name'), ['class'=>'form-control', 'placeholder'=>'Enter Name']) !!}
          <span class="text-danger">{{ $errors->first('name') }}</span>
        </div>

        <div class="form-group {{ $errors->has('email') ? 'has-error' : '' }}">
          <!-- {!! Form::label('Email:') !!} -->
          {!! Form::text('email', old('email'), ['class'=>'form-control', 'placeholder'=>'Enter Email']) !!}
          <span class="text-danger">{{ $errors->first('email') }}</span>
        </div>

        <div class="form-group {{ $errors->has('message') ? 'has-error' : '' }}">
          <!-- {!! Form::label('Message:') !!} -->
          {!! Form::textarea('message', old('message'), ['class'=>'form-control', 'placeholder'=>'Enter Message']) !!}
          <span class="text-danger">{{ $errors->first('message') }}</span>
        </div>

        <div class="form-group">
          <button class="btn btn-primary">Contact US!</button>
        </div>

        {!! Form::close() !!}
        <hr class="colorgraph">

      </div>
    </div>
  </div>
</section>
@include('inc.footer');