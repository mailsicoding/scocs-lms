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
  @toastr_css
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

<!-- delete modal -->
<div id="class_delete" class="modal hide fade" tabindex="-1" role="dialog" aria-labelledby="myModalLabel"
    aria-hidden="true">
    <form action="" method="post" id="delete-form">
        @csrf
        @method('delete')
    <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-hidden="true">x</button>
        <h3 id="delete-title"></h3>
    </div>
    <div class="modal-body">
        <div class="alert alert-danger">
            <p>Are you sure you want to delete the <span id="delete-text"></span> ?</p>
        </div>
    </div>
    <div class="modal-footer">
        <button class="btn" data-dismiss="modal" aria-hidden="true"><i class="icon-remove icon-large"></i>Close</button>
        <button class="btn btn-danger" type="submit" id="delete-btn"><i class="icon-check icon-large"></i> Yes</b   utton>
    </div>
    </form>
</div>

@include('admins.layout.partials.footer')
@yield('scripts')
@toastr_js
@toastr_render
<script>
    function delete_record(link,title,text)
    {
        $('#delete-form').attr('action',link);
        $('#delete-title').html(title);
        $('#delete-text').html(text);
    }
</script>
</body>
</html>