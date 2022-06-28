<nav id="sidebar-o">
    <div class="sidebar-o-header">
        <img src="{{ asset('frontend_assets/auth_assets/images/logo.png') }}">
    </div>

    <ul class="list-unstyled components">
        <li class="active"> <a href="{{ route('student.dashboard') }}"><i
                    class="icon-home"></i>&nbsp;Dashboard <i class="icon-chevron-right pull-right"></i></a> </li>
        <li class="">
            <a href="{{ route('student.courses.offered') }}"><i class="icon-building"></i> Offered Courses <i
                    class="icon-chevron-right pull-right"></i></a>
        </li>
        <li class="">
            <a href="{{ route('student.courses.current') }}"><i class="icon-building"></i> Current Courses <i
                    class="icon-chevron-right pull-right"></i></a>
        </li>
        <li class="">
            <a href="{{ route('student.courses.meterial') }}"><i class="icon-building"></i> Course Meterial <i
                    class="icon-chevron-right pull-right"></i></a>
        </li>
        <li class="">
            <a href="{{ route('student.courses.results') }}"><i class="icon-building"></i> View Results <i
                    class="icon-chevron-right pull-right"></i></a>
        </li>
        <li class="">
            <a href="{{ route('student.messages') }}"><i class="icon-building"></i> Messages <i
                    class="icon-chevron-right pull-right"></i></a>
        </li>
    </ul>

</nav>
