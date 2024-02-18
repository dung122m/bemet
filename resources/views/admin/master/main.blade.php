<!DOCTYPE html>
<html>
<head>
  <base href="/">
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <title> @yield('title') </title>

  <meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">

    @include("admin.master.style")

</head>
<body class="hold-transition skin-blue sidebar-mini">
<!-- Site wrapper -->
<div class="wrapper">

@include('admin.master.header')

  <!-- =============================================== -->

  <!-- Left side column. contains the sidebar -->

  @include('admin.master.left-aside')

  <!-- =============================================== -->

  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <section class="content-header">
      <h1>
        @yield('title')
       
      </h1>
      <ol class="breadcrumb">
        <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
        
        <li class="active">@yield('title')</li>
      </ol>
    </section>
    <section class="content">

      <!-- Default box -->
      @yield('content')
      <!-- /.box -->

    </section>


  </div>
    
    <!-- Main content -->
    
    <!-- /.content -->
  <!-- /.content-wrapper -->

@include('admin.master.footer')

  <!-- Control Sidebar -->
 
  <!-- /.control-sidebar -->
  <!-- Add the sidebar's background. This div must be placed
       immediately after the control sidebar -->
  <div class="control-sidebar-bg"></div>
</div>
<!-- ./wrapper -->

@include('admin.master.script')
</body>
</html>
