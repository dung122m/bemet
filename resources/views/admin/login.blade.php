<!DOCTYPE html>
<html>
<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <title>Admin | Log in</title>
  <base href="/">
  <!-- Tell the browser to be responsive to screen width -->
  <meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">
  <!-- Bootstrap 3.3.6 -->
  <link rel="stylesheet" href="admin_assets/bootstrap/css/bootstrap.min.css">
  <!-- Font Awesome -->
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.5.0/css/font-awesome.min.css">
  <!-- Ionicons -->
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/ionicons/2.0.1/css/ionicons.min.css">
  <!-- Theme style -->
  <link rel="stylesheet" href="admin_assets/dist/css/AdminLTE.min.css">
  <!-- AdminLTE Skins. Choose a skin from the css/skins
       folder instead of downloading all of them to reduce the load. -->
  <link rel="stylesheet" href="admin_assets/dist/css/skins/_all-skins.min.css">

     <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/jquery-toast-plugin/1.3.2/jquery.toast.min.css" />
  
  <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
  <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
  <!--[if lt IE 9]>
  <script src="https://oss.maxcdn.com/html5shiv/3.7.3/html5shiv.min.js"></script>
  <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
  <![endif]-->
</head>
<body class="hold-transition login-page">
<div class="login-box">
  <div class="login-logo">
    <b>Login</b>
  </div>
  <!-- /.login-logo -->
  <div class="login-box-body">
    
    <form action="{{ route("admin.check_login") }}" method="post">
        @csrf
      <div class="form-group has-feedback">
        <input type="email" class="form-control" placeholder="Email" name="email">
        <span class="glyphicon glyphicon-envelope form-control-feedback"></span>
      </div>
      <div class="form-group has-feedback">
        <input type="password" class="form-control" placeholder="Password" name="password">
        <span class="glyphicon glyphicon-lock form-control-feedback"></span>
      </div>
     <div class="row">
       
        <!-- /.col -->
        <div class="col-xs-12">
          <button type="submit" class="btn btn-primary btn-block btn-flat">Sign In</button>
        </div>
        
        <!-- /.col -->
      </div>
    </form>
    <a href="">Forgot password</a> <br>

    
  </div>
  <!-- /.login-box-body -->
</div>
<!-- /.login-box -->

<!-- jQuery 2.2.0 -->
<script src="/admin_assets/plugins/jQuery/jQuery-2.2.0.min.js"></script>
<!-- Bootstrap 3.3.6 -->
<script src="/admin_assets/bootstrap/js/bootstrap.min.js"></script>
<!-- SlimScroll -->
<script src="/admin_assets/plugins/slimScroll/jquery.slimscroll.min.js"></script>
<!-- FastClick -->
<script src="/admin_assets/plugins/fastclick/fastclick.js"></script>
<!-- AdminLTE App -->
<script src="/admin_assets/dist/js/app.min.js"></script>
<!-- AdminLTE for demo purposes -->
<script src="/admin_assets/dist/js/demo.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery-toast-plugin/1.3.2/jquery.toast.min.js"></script>


@if(Session::has('success'))
                <script>
                        $.toast({
                        heading: 'Notification',
                        text: "{{ Session::get('success') }}",
                        showHideTransition: 'slide',
                        icon: 'success',
                        position:'top-center',
                        hideAfter: 5000



                        })
                </script>
@endif
@if(Session::has('error'))
                <script>
                        $.toast({
                        heading: 'Notification',
                        text: "{{ Session::get('error') }}",
                        showHideTransition: 'slide',
                        icon: 'error',
                        position:'top-center',
                        hideAfter: 5000



                        })
                </script>
@endif
@if ($errors->any())
    @foreach ($errors->all() as $error)
        <script>
            $.toast({
                heading: 'Error',
                text: "{{ $error }}",
                showHideTransition: 'slide',
                icon: 'error',
                position: 'top-center',
                hideAfter: 5000
            });
        </script>
    @endforeach
@endif
</body>








</html>
<!-- jQuery 2.2.0 -->


