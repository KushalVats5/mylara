<!DOCTYPE html>
<html>
<head>
	<script type="text/javascript" src="{{ URL::asset('admin/js/jquery-1.11.1.min.js') }}"></script>
	<script src="{{ URL::asset('admin/js/bootstrap.min.js') }}"></script>
    <script type="text/javascript" src="{{ URL::asset('admin/js/admin-script.js') }}"></script>
    <script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/jqueryui/1.12.1/jquery-ui.js"></script>
	<!-- <script type="text/javascript" src="http://ajax.googleapis.com/ajax/libs/jqueryui/1.10.3/jquery-ui.min.js"></script> -->
    <script src="{{ asset('vendor/unisharp/laravel-ckeditor/ckeditor.js') }}"></script>
	<!-- Include the above in your HEAD tag -->
        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.6.3/css/font-awesome.min.css" />
    <link href="{{ URL::asset('admin/css/bootstrap.min.css') }}" rel="stylesheet" id="bootstrap-css">
	<link href="https://cdnjs.cloudflare.com/ajax/libs/jqueryui/1.12.1/jquery-ui.css" rel="stylesheet" id="bootstrap-css">
	<link href="https://maxcdn.bootstrapcdn.com/font-awesome/4.6.3/css/font-awesome.min.css" rel="stylesheet" integrity="sha384-T8Gy5hrqNKT+hzMclPo118YTQO6cYprQmhrYwIiQ/3axmI1hQomh7Ud2hPOy8SP1" crossorigin="anonymous">
	<link href="{{ URL::asset('admin/css/admin-style.css') }}" rel="stylesheet" type="text/css" >
    
	<title>Dashboard</title>
	</head>
	<body class="home">
	    <div class="container-fluid display-table">
        <div class="row display-table-row">
            
            @include('admin.includes.sidebar')
            
            <div class="col-md-10 col-sm-11 display-table-cell v-align">
                <!--<button type="button" class="slide-toggle">Slide Toggle</button> -->
                <div class="row">
                     @include('admin.includes.inner-header')
                </div>
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