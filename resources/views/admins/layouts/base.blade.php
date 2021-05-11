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

   <title>@yield('title')</title>

  <!-- Font Awesome Icons -->
  <link rel="stylesheet" href="{{ url ('plugins/fontawesome-free/css/all.min.css') }}">
  <!-- Theme style -->
  <link rel="stylesheet" href="{{ url('dist/css/adminlte.min.css')}}">
  <!-- Google Font: Source Sans Pro -->
  <link href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700" rel="stylesheet">
</head>
<body class="hold-transition sidebar-mini">
<div class="wrapper">

  <!-- Navbar -->
  <nav class="main-header navbar navbar-expand navbar-white navbar-light">
    <!-- Left navbar links -->
    <ul class="navbar-nav">
      <li class="nav-item">
        <a class="nav-link" data-widget="pushmenu" href="#" role="button"><i class="fas fa-bars"></i></a>
      </li>
      <li class="nav-item d-none d-sm-inline-block">
        <a href="#" class="nav-link">Home</a>
      </li>
      <li class="nav-item d-none d-sm-inline-block">
        <a href="#" class="nav-link">Contact</a>
      </li>

      <li class="nav-item d-none d-sm-inline-block">
        <a href="{{route('meals')}}" class="nav-link">Admin Page</a>
      </li>

    </ul>
  </nav>
  <!-- /.navbar -->


  <!-- Main Sidebar Container -->
  <aside class="main-sidebar sidebar-dark-primary elevation-4">
    <!-- Brand Logo -->

    <!-- Sidebar -->
    <div class="sidebar">
      <!-- Sidebar user panel (optional) -->
      <div class="user-panel mt-3 pb-3 mb-3 d-flex">
        <div class="image">
          <img src="{{ asset ('upload_image/users/'.Auth::user()->image)}}"class="img-circle elevation-2" alt="User Image">
        </div>
        <div class="info">
          <a href="#" class="d-block">{{Auth::user()->name}}</a>
        </div>
      </div>
      <!-- Sidebar Menu -->
      <nav class="mt-2">
        <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
          <!-- Add icons to the links using the .nav-icon class
               with font-awesome or any other icon font library -->
          <li class="nav-item has-treeview menu-open">

            <ul class="nav nav-treeview">

              @if (Auth::user()->role == 'admin')
                  
              <li class="nav-item">
                <a href="{{route('dashboard')}}" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Dashboard</p>
                </a>
               </li>

               
               <li class="nav-item">
                <a href="{{route('home_site')}}" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p>My Site</p>
                </a>
               </li>
               <li class="nav-item">
                <a href="{{route('index_auth')}}" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Auth Page Control</p>
                </a>
               </li>

               <li class="nav-item">
                <a href="{{route('index_complaints')}}" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Complaints Page</p>
                </a>
               </li>

               <li class="nav-item">
                <a href="{{route('category_index')}}" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Category Page</p>
                </a>
               </li>

               <li class="nav-item">
                <a href="{{route('order')}}" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Order Page</p>
                </a>
               </li>
               
               <li class="nav-item">
                <a href="{{route('index_chefs')}}" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Chefs Page</p>
                </a>
               </li>

               <li class="nav-item">
                <a href="{{route('meals')}}" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Meals Page</p>
                </a>
               </li>

               <li class="nav-item">
                <a href="{{route('reservation')}}" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Reservation Page</p>
                </a>
               </li>

               <li class="nav-item">
                <a href="{{route('settings')}}" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Settings</p>
                </a>
               </li>
               
               <li class="nav-item">
                <a href="{{route('logout_site')}}" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Logout</p>
                </a>
               </li>
              
              @else

              <li class="nav-item">
                <a href="{{route('category_index')}}" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Category Page</p>
                </a>
               </li>

               <li class="nav-item">
                <a href="{{route('home_site')}}" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p>My Site</p>
                </a>
               </li>
               
               <li class="nav-item">
                <a href="{{route('order')}}" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Order Page</p>
                </a>
               </li>
               

               <li class="nav-item">
                <a href="{{route('index_chefs')}}" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Chefs Page</p>
                </a>
               </li>

               <li class="nav-item">
                <a href="{{route('meals')}}" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Meals Page</p>
                </a>
               </li>

               <li class="nav-item">
                <a href="{{route('logout_site')}}" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Logout</p>
                </a>
               </li>
                  
              @endif



              </li>
            </ul>
          </li>

        </ul>
      </nav>
      <!-- /.sidebar-menu -->
    </div>
    <!-- /.sidebar -->
  </aside>

  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <div class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1 class="m-0 text-dark">@yield('title2')</h1>
          </div><!-- /.col -->
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="{{route('dashboard')}}">Dashboard</a></li>
              <li class="breadcrumb-item active">...</li>
            </ol>
          </div><!-- /.col -->
        </div><!-- /.row -->
        <br>
        <br>
        <br>
        @yield('content')
      </div><!-- /.container-fluid -->
    </div>
    <!-- /.content-header -->

    <!-- /.content -->
  </div>
  <!-- /.content-wrapper -->

  <!-- Control Sidebar -->

  <!-- /.control-sidebar -->

 

</div>
<!-- ./wrapper -->

<!-- REQUIRED SCRIPTS -->

<!-- jQuery -->
<script src="{{ url ('plugins/jquery/jquery.min.js')}}"></script>
<!-- Bootstrap 4 -->
<script src="{{ url ('plugins/bootstrap/js/bootstrap.bundle.min.js')}}"></script>
<!-- AdminLTE App -->
<script src="{{ url ('dist/js/adminlte.min.js')}}"></script>
</body>
</html>
