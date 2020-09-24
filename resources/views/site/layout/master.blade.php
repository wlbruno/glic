<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta http-equiv="x-ua-compatible" content="ie=edge">
      <title>@yield('title')</title>

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
            <span class="brand-text font-weight-light"></span>
          </a>
          
          <button class="navbar-toggler order-1" type="button" data-toggle="collapse" data-target="#navbarCollapse" aria-controls="navbarCollapse" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
          </button>

          <div class="collapse navbar-collapse order-3" id="navbarCollapse">
            <!-- Left navbar links -->
            <ul class="navbar-nav">
              <li class="nav-item">
                <a href="/home" class="nav-link">Home</a>
              </li>
              <li class="nav-item">
                <a href="/contato" class="nav-link">Contato</a>
              </li>
            @can('orgao_orgao')
              <li>
                <a href="{{ route('orgao.index') }}" class="nav-link">Órgão</a>
              </li>
              @endcan
            
          @can('admin')
              <li class="nav-item">
                <a href="{{ route('admin.home') }}" class="nav-link">Painel de Controle</a>
              </li>
              @endcan
        
         
        </ul>
      
    
      <!-- Right navbar links -->
      <ul class="navbar-nav ml-auto">
      @guest
      
      <li class="nav-item dropdown">
         <a href="/login" class="btn btn-sn btn-info"><i class="fas fa-sign-in-alt"></i> Entrar</a>
              
      </li>
      @endguest
      </li>
          @if(!is_null(auth()->user()))
      <li class="nav-item dropdown">
        <a class="nav-link" data-toggle="dropdown" href="#">
        <i class="fas fa-user-alt"></i> {{auth()->user()->name}}
        </a>
        <div class="dropdown-menu dropdown-menu-lg dropdown-menu-right">
          <div class="dropdown-divider"></div>
          <a href="{{ route('user.perfil') }}"class="dropdown-item">
          <i class="far fa-id-badge"></i> Perfil
          </a>
          <div class="dropdown-divider"></div>
          <a href="{{ route('user.historico') }}" class="dropdown-item">
            <i class="fas fa-file mr-2"></i> Atas Solicitadas
          </a>
          <div class="dropdown-divider"></div>
          <a href="{{url('/sair')}}"  class="dropdown-item dropdown-footer"><i class="fas fa-sign-out-alt"></i>Sair</a>
        </div>
      </li>
      @endif
    
         </div>
    </div>
  </nav>
  <!-- /.navbar -->

  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <div class="content-header">
      <div class="container">
            @yield('content_header')
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
<!-- Icon -->
<script src="{{ asset('adminLTE/layout/js/all.js') }}"></script>
<!-- AdminLTE for demo purposes -->
<script src="{{ asset('adminLTE/layout/js/demo.js') }}"></script>

@yield('js')
</body>
</html>
