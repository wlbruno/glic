
<!DOCTYPE html>
<!--
This is a starter template page. Use this page to start your new project from
scratch. This page gets rid of all links and provides the needed markup only.
-->
<html lang="en">
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <meta http-equiv="x-ua-compatible" content="ie=edge">

  <title>GLIC</title>

  <!-- Font Awesome Icons -->
  <link rel="stylesheet" href="{{ asset('adminLTE/layout/css/all.min.css') }}">
  <!-- Theme style -->
  <link rel="stylesheet" href="{{ asset('adminLTE/layout/css/adminlte.min.css')}}">
  <!-- Google Font: Source Sans Pro -->
  <link href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700" rel="stylesheet">
</head>
<body class="hold-transition layout-top-nav">
<div class="wrapper">

  <!-- Navbar -->
  <nav class="main-header navbar navbar-expand-md navbar-light navbar-white">
    <div class="container">
      <a href="/home" class="navbar-brand">
         <img src="{{asset('/img/logo-nova.png')}}" alt="AdminLTE Logo" class="brand-image  elevation-3"
             style="opacity: .8">
        
      </a>
      
      <button class="navbar-toggler order-1" type="button" data-toggle="collapse" data-target="#navbarCollapse" aria-controls="navbarCollapse" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
      </button>

     <ul class="order-1 order-md-3 navbar-nav navbar-no-expand ml-auto">
      
        <li class="nav-item dropdown">
           <a href="/home" class="btn btn-sn btn-dark" >HOME</a>
                
        </li>
         


        <li class="nav-item dropdown">
           <a href="/login" class="btn btn-sn btn-dark" style="position: absolute;  left: 20px ;">LOGIN</a>
                
        </li>
          @if(!is_null(auth()->user()))
         <li class="nav-item dropdown">
           <a href="{{url('/sair')}}" class="btn btn-sn btn-danger"  style="position: absolute;  left: 20px ;">Sair</a>
                
        </li>
          @endif
      </ul>
    
    </div>
  </nav>
  <!-- /.navbar -->

  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <div class="content-header">
      <div class="container">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1 class="m-0 text-dark">  <small></small></h1>
          </div><!-- /.col -->
        </div><!-- /.row -->
      </div><!-- /.container-fluid -->
    </div>
    <!-- /.content-header -->

    <!-- Main content -->
    <div class="content">
      <div class="container">
          @yield('content')
        <!-- /.row -->
      </div><!-- /.container-fluid -->
    </div>
    <!-- /.content -->
  </div>
  <!-- /.content-wrapper -->

  <!-- Control Sidebar -->
  <aside class="control-sidebar control-sidebar-dark">
    <!-- Control sidebar content goes here -->
    <div class="p-3">
      <h5>Title</h5>
      <p>Sidebar content</p>
    </div>
  </aside>
  <!-- /.control-sidebar -->

  <!-- Main Footer -->
<footer class="main-footer">
    <strong><a href="http://portal.saude.pe.gov.br/">Secretaria de Saúde do Estado de Pernambuco</a>.</strong>
  </footer>
</div>
<!-- ./wrapper -->

<!-- REQUIRED SCRIPTS -->

<!-- jQuery -->
<script src="{{ asset('adminLTE/layout/js/jquery.min.js') }}"></script>
<!-- Bootstrap 4 -->
<script src="{{ asset('adminLTE/layout/js/bootstrap.bundle.min.js') }}"></script>
<!-- AdminLTE App -->
<script src="{{ asset('adminLTE/layout/js/adminlte.min.js')}}"></script>
</body>
</html>
