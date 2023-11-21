<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>Secretdhorloger MS</title>

  <!-- Google Font: Source Sans Pro -->
  <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700&display=fallback">
  <!-- Font Awesome -->
  <link rel="stylesheet" href="{{asset('backend')}}/plugins/fontawesome-free/css/all.min.css">
  <!-- Ionicons -->
  <link rel="stylesheet" href="https://code.ionicframework.com/ionicons/2.0.1/css/ionicons.min.css">
  <!-- Tempusdominus Bootstrap 4 -->
  <link rel="stylesheet" href="{{asset('backend')}}/plugins/tempusdominus-bootstrap-4/css/tempusdominus-bootstrap-4.min.css">
  <!-- iCheck -->
  <link rel="stylesheet" href="{{asset('backend')}}/plugins/icheck-bootstrap/icheck-bootstrap.min.css">
  <!-- Theme style -->
  <link rel="stylesheet" href="{{asset('backend')}}/dist/css/adminlte.min.css">
  <style>
    .card{
        max-width: 500px;
        width: 100%;
        position: relative;
        background-color: #837878c7;
        color: white;
    }
    .card .form-control {
        background: transparent;
        border: 0;
        border-bottom: 1px solid white;
        border-radius: 0;
        color: white;
        font-weight: 600;
    }
    .card .btn-link{
        color: white;
    }
    .card .btn-primary{
        background-color: #12271a;
        border-color: #12271a;
    }
  </style>
</head>
<body class="" style="height: 100vh !important; background: url({{asset('define_img/admin_bg.jpg')}})">
<div class="wrapper d-flex">

  @yield('content')

</div>


</body>
</html>
