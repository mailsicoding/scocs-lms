<div class="navbar" style="
    padding: 15px 10px;
    background: #fff;
    border: none;
    border-radius: 0;
    margin-bottom: 40px;
    box-shadow: 1px 1px 3px rgba(0, 0, 0, 0.1);">
                <button type="button" id="sidebarCollapse" class="btn btn-info">
                    <i class="icon-align-left"></i>
                    <span>Menu</span>
                </button>
                <ul class="nav pull-right">
                    <li class="dropdown">
                        <a href="#" role="button" class="dropdown-toggle" data-toggle="dropdown"
                            style="padding:10px;position:relative;bottom:10px;background-color:#fff"><img
                                class="img-circle"
                                src="{{ asset('frontend_assets/auth_assets/images/logo.png') }}"
                                style="display: inline-block;height:40px;width:40px;padding-right:10px"><b>Admin</b> <i
                                class="caret" style="position:relative;top:10px;"></i>

                        </a>
                        <ul class="dropdown-menu">
                            <li>
                                <a tabindex="-1" href="#">Profile</a>
                            </li>
                            <li class="divider"></li>
                            <li>
                                <a tabindex="-1" href="#" onclick="document.querySelector('#logout-form').submit()"><i class="icon-signout"></i>&nbsp;Logout</a>
                                <form action="{{ route('teacher.logout') }}" id="logout-form" method="post">@csrf</form>
                            </li>
                        </ul>
                    </li>
                </ul>
            </div>