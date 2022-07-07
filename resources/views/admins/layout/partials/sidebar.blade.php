<nav id="sidebar-o">
    <div class="sidebar-o-header">
        <img src="{{ asset('frontend_assets/auth_assets/images/logo.png') }}">
    </div>

    <ul class="list-unstyled components">
        <li class="active"> <a href="{{ route('admin.dashboard') }}"><i
                    class="icon-home"></i>&nbsp;Dashboard <i class="icon-chevron-right pull-right"></i></a> </li>
        <li class="">
            <a href="{{ route('classes.index') }}"><i class="icon-building"></i> Classes <i
                    class="icon-chevron-right pull-right"></i></a>
        </li>
        <li class="">
            <a href="{{ route('students.index') }}"><i class="icon-group"></i> Students <i
                    class="icon-chevron-right pull-right"></i></a>
        </li>
        <li class="">
            <a href="{{ route('courses.index') }}"><i class="icon-book"></i> Courses <i
                    class="icon-chevron-right pull-right"></i></a>
        </li>
        <li class="">
            <a href="{{ route('teachers.index') }}"><i class="icon-group"></i> Teachers <i
                    class="icon-chevron-right pull-right"></i></a>
        </li>
    </ul>

</nav>
