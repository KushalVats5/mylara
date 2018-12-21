<div class="col-md-2 col-sm-1 hidden-xs display-table-cell v-align box" id="navigation">
    <div class="logo">
        <a hef="home.html">
        <img src="{{URL::asset('/images/circled-user-male.png')}}" alt="profile Pic" class="hidden-xs hidden-sm">
        <img src="{{URL::asset('/images/circled-user-male.png')}}" alt="profile Pic" class="visible-xs visible-sm circle-logo">
        <!-- <img src="http://jskrishna.com/work/merkury/images/logo.png" alt="merkery_logo" class="hidden-xs hidden-sm">
            <img src="http://jskrishna.com/work/merkury/images/circle-logo.png" alt="merkery_logo" class="visible-xs visible-sm circle-logo"> -->
        </a>
    </div>
    <div class="navi nav-side-menu">
        <ul>
            <li class="active">
                <a href="{{ url('auth/admin') }}">
                    <i class="fa fa-home" aria-hidden="true"></i>
                    <span class="hidden-xs hidden-sm">Dashboard</span>
                </a>
                </li>
            <li>
                <a href="#">
                    <i class="fa fa-tasks" aria-hidden="true"></i>
                    <span class="hidden-xs hidden-sm">Workflow</span>
                </a>
            </li>
            <li>
                <a href="#">
                    <i class="fa fa-bar-chart" aria-hidden="true"></i>
                    <span class="hidden-xs hidden-sm">Statistics</span>
                </a>
            </li>
            <li>
                <a href="#">
                    <i class="fa fa-calendar" aria-hidden="true"></i>
                    <span class="hidden-xs hidden-sm">Calender</span>
                </a>
            </li>
            <li>
                <a href="{{ url('auth/admin/users') }}">
                    <i class="fa fa-group" aria-hidden="true"></i>
                    <span class="hidden-xs hidden-sm">Users</span>
                </a>
            </li>
            <li>
                <a href="{{ url('auth/admin/adduser') }}">
                    <i class="fa fa-user" aria-hidden="true"></i>
                    <span class="hidden-xs hidden-sm">Add User</span>
                </a>
            </li>
            <li>
                <a href="#">
                    <i class="fa fa-cog" aria-hidden="true"></i>
                    <span class="hidden-xs hidden-sm">Setting</span>
                </a>
            </li>
            <li  data-toggle="collapse" data-target="#products" class="collapsed active">
                  <a href="#"><i class="fa fa-gift fa-lg"></i> UI Elements <span class="arrow"></span></a>
                </li>
                <ul class="sub-menu collapse" id="products">
                    <li class="active"><a href="#">CSS3 Animation</a></li>
                    <li><a href="#">General</a></li>
                    <li><a href="#">Buttons</a></li>
                    <li><a href="#">Tabs & Accordions</a></li>
                    <li><a href="#">Typography</a></li>
                    <li><a href="#">FontAwesome</a></li>
                    <li><a href="#">Slider</a></li>
                    <li><a href="#">Panels</a></li>
                    <li><a href="#">Widgets</a></li>
                    <li><a href="#">Bootstrap Model</a></li>
                </ul>
        </ul>
    </div>
</div>