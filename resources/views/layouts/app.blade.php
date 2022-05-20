<!DOCTYPE html>
<html class="hide-sidebar ls-bottom-footer" lang="en">

<meta http-equiv="content-type" content="text/html;charset=UTF-8" />

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="">
    <title>@yield('title') | SCOCS LMS</title>
    <link href="{{ asset('frontend_assets/auth_assets/images/logo.png') }}" rel="icon" type="image">
    <link href="{{ asset('frontend_assets/auth_assets/plugins/bootstrap/css/bootstrap.min.css') }}" rel="stylesheet">
    <link href="{{ asset('frontend_assets/auth_assets/css/vendor/all.css') }}" rel="stylesheet">
    <link href="{{ asset('frontend_assets/auth_assets/css/app/app.css') }}" rel="stylesheet">
    @toastr_css
</head>

<body class="login">

    <div id="content">
        <div class="container-fluid">
            <div class="lock-container">
                @yield('content')
            </div>
        </div>
    </div>


    <!-- Footer -->
    <!-- <footer class="footer">
        <strong>SCOCS LMS</strong> &copy; Copyright {{ date('Y') }}
    </footer> -->
    <!-- // Footer -->

    </div>
    <!-- /st-container -->

    <!-- Inline Script for colors and config objects; used by various external scripts; -->
    <script>
        var colors = {
            "danger-color": "#e74c3c",
            "success-color": "#81b53e",
            "warning-color": "#f0ad4e",
            "inverse-color": "#2c3e50",
            "info-color": "#2d7cb5",
            "default-color": "#6e7882",
            "default-light-color": "#cfd9db",
            "purple-color": "#9D8AC7",
            "mustard-color": "#d4d171",
            "lightred-color": "#e15258",
            "body-bg": "#f6f6f6"
        };
        var config = {
            theme: "html",
            skins: {
                "default": {
                    "primary-color": "#42a5f5"
                }
            }
        };

    </script>

    <script src="{{ asset('frontend_assets/auth_assets/js/vendor/all.js') }}"></script>

    <script src="{{ asset('frontend_assets/auth_assets/js/app/app.js') }}"></script>
    
    @jquery
    @toastr_js
    @toastr_render
</body>

</html>
