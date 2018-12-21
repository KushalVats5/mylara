<link href="//maxcdn.bootstrapcdn.com/bootstrap/4.1.1/css/bootstrap.min.css" rel="stylesheet" id="bootstrap-css">
<script src="//maxcdn.bootstrapcdn.com/bootstrap/4.1.1/js/bootstrap.min.js"></script>
<script src="//cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
<!------ Include the above in your HEAD tag ---------->
<div class="container clearfix"> 
     <h1 id="logo"> Quixotic Design </h1> 
     <nav> 
      <a href="">Lorem</a> 
      <a href="">Ipsum</a> 
       @if(isset(Auth::user()->email))
        <a href="{{ url('auth/logout') }}"><span class="glyphicon glyphicon-log-out"></span> Logout</a>
        @else
        <a href="#"><span class="glyphicon glyphicon-log-in"></span> Login</a>
        @endif
     </nav> 
    </div> 