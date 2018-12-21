@include('admin.includes.header')
    <div class="container-fluid display-table">
        <div class="row display-table-row">
            
            @include('admin.includes.sidebar')
            
            <div class="col-md-10 col-sm-11 display-table-cell v-align">
                <!--<button type="button" class="slide-toggle">Slide Toggle</button> -->
                <div class="row">
                     @include('admin.includes.inner-header')
                </div>
                <div class="user-dashboard">
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
            </div>
                @include('admin.includes.inner-footer')
        </div>
    </div>

   @include('admin.includes.popup.add-page-popup')
   @include('admin.includes.popup.feedback-popup')
     
@include('admin.includes.inner-footer')