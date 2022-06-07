<nav id="sidebar-o">
    <div class="sidebar-o-header">
        <img src="{{ asset('frontend_assets/auth_assets/images/logo.png') }}">
    </div>

    <ul class="list-unstyled components">
        <!-- <li class="active">
                <a href="#homeSubmenu" data-toggle="collapse" aria-expanded="false" class="dropdown-toggle w-100">Home<i class="icon-angle-down pull-right"></i></a>
                <ul class="collapse list-unstyled" id="homeSubmenu">
                    <li>
                        <a href="#">Home 1</a>
                    </li>
                    <li>
                        <a href="#">Home 2</a>
                    </li>
                    <li>
                        <a href="#">Home 3</a>
                    </li>
                </ul>
            </li> -->
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
        <li class="">
            <a href="#"><i class="icon-user"></i> Admin Users <i class="icon-chevron-right pull-right"></i></a>
        </li>
        <li class="">
            <a href="#"><i class="icon-download"></i> Course Material <i class="icon-chevron-right pull-right"></i></a>
        </li>
        <li class="">
            <a href="#"><i class="icon-upload"></i> Uploaded Assignments <i
                    class="icon-chevron-right pull-right"></i></a>
        </li>
        <li class="">
            <a href="#"><i class="icon-file"></i> Results <i class="icon-chevron-right pull-right"></i></a>
        </li>
        <li class="">
            <a href="#"><i class="icon-file"></i> User Log <i class="icon-chevron-right pull-right"></i></a>
        </li>
        <li class="">
            <a href="#"><i class="icon-file"></i> Activity Log <i class="icon-chevron-right pull-right"></i></a>
        </li>
        <!--li class="">
                    <a href="school_year.php"><i class="icon-calendar"></i> School Year <i
                            class="icon-chevron-right pull-right"></i></a>
                </li-->
        <li class="">
            <a href="#"><i class="icon-calendar"></i>Calendar of Events <i
                    class="icon-chevron-right pull-right"></i></a>
        </li>
    </ul>

</nav>
