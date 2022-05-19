<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <meta name="description" content="">
  <meta name="author" content="">
  <title>@yield('title') | SCOCS LMS</title>
  @include('admins.layout.partials.header')
  @yield('css')
</head>

<body>

<div class="wrapper">
       
      <!-- Sidebar -->
      @include('admins.layout.partials.sidebar')

      <div id="content-o">

          @include('admins.layout.partials.topbar')

          @yield('content')

          <div style="height: 50px;"></div>
      </div>
</div>

@include('admins.layout.partials.footer')
@yield('scripts')
</body>
</html>