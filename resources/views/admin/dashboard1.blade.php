@extends('admin.master')
@section('content')
    <div class="admin-dashboard">
        <h1>
        Hello, 
        @if(isset(Auth::user()->name))
          {{ Auth::user()->name }}
        @else
        {{ Auth::user()->email }}
        @endif
        </h1>
        <div class="row">
            <div class="col-md-5 col-sm-5 col-xs-12 gutter">
                <div class="sales">
                    <h2>Your Sale</h2>
                    <div class="btn-group">
                        <button class="btn btn-secondary btn-lg dropdown-toggle" type="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                            <span>Period:</span> Last Year
                        </button>
                        <div class="dropdown-menu">
                            <a href="#">2012</a>
                            <a href="#">2014</a>
                            <a href="#">2015</a>
                            <a href="#">2016</a>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-md-7 col-sm-7 col-xs-12 gutter">
                <div class="sales report">
                    <h2>Report</h2>
                    <div class="btn-group">
                        <button class="btn btn-secondary btn-lg dropdown-toggle" type="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                            <span>Period:</span> Last Year
                        </button>
                        <div class="dropdown-menu">
                            <a href="#">2012</a>
                            <a href="#">2014</a>
                            <a href="#">2015</a>
                            <a href="#">2016</a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection