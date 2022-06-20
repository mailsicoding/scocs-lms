<nav id="sidebar-o">
    <div class="sidebar-o-header">
        <img src="{{ asset('frontend_assets/auth_assets/images/logo.png') }}">
    </div>

    <ul class="list-unstyled components">
        <li class="active"> <a href="{{ route('teacher.dashboard') }}"><i
                    class="icon-home"></i>&nbsp;Dashboard <i class="icon-chevron-right pull-right"></i></a> </li>
        <li class=""> <a href="{{ route('teacher.courses.current') }}"><i
                    class="icon-home"></i>&nbsp;Current Courses <i class="icon-chevron-right pull-right"></i></a> </li>
        <li class=""> <a href="{{ route('teacher.courses.meterial') }}"><i
                    class="icon-home"></i>&nbsp;Course Meterial<i class="icon-chevron-right pull-right"></i></a> </li>
        <li class=""> <a href="{{ route('teacher.courses.meterial.upload') }}"><i
                    class="icon-home"></i>&nbsp;Upload Course Meterial <i class="icon-chevron-right pull-right"></i></a> </li>
        
        <li class=""> <a href="{{ route('teacher.courses.attendance') }}"><i
                    class="icon-home"></i>&nbsp;Upload Course Meterial <i class="icon-chevron-right pull-right"></i></a> </li>
        
    </ul>

</nav>
