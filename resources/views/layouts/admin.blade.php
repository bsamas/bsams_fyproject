<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>Biometric student attendance management system</title>

  <!-- Google Font: Source Sans Pro -->
  <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700&display=fallback">
  <!-- Font Awesome -->
  <link rel="stylesheet" href="{{ asset('plugins/fontawesome-free/css/all.min.css') }}">
  <!-- Ionicons -->
  <link rel="stylesheet" href="https://code.ionicframework.com/ionicons/2.0.1/css/ionicons.min.css">
  <!-- Tempusdominus Bootstrap 4 -->
  {{--  <link rel="stylesheet" href="{{ asset('plugins/tempusdominus-bootstrap-4/css/tempusdominus-bootstrap-4.min.css') }}">  --}}
  <!-- iCheck -->
  {{--  <link rel="stylesheet" href="{{ asset('plugins/icheck-bootstrap/icheck-bootstrap.min.css') }}">  --}}
  <!-- JQVMap -->
  {{--  <link rel="stylesheet" href="{{ asset('plugins/jqvmap/jqvmap.min.css') }}">  --}}
  <!-- Theme style -->
  <link rel="stylesheet" href="{{ asset('dist/css/adminlte.min.css') }}">
  <!-- overlayScrollbars -->
  {{--  <link rel="stylesheet" href="{{ asset('plugins/overlayScrollbars/css/OverlayScrollbars.min.css') }}">  --}}
  <!-- Daterange picker -->
  {{--  <link rel="stylesheet" href="{{ asset('plugins/daterangepicker/daterangepicker.css') }}">  --}}
  <!-- summernote -->
  {{--  <link rel="stylesheet" href="{{ asset('plugins/summernote/summernote-bs4.min.css') }}">  --}}

   <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css"
    integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdn.datatables.net/1.10.21/css/dataTables.bootstrap4.min.css">
    <link rel="stylesheet" href="https://cdn.datatables.net/1.10.21/css/dataTables.bootstrap4.min.css">
@yield('styles')
</head>

<body class="hold-transition sidebar-mini layout-fixed">



 <div class="wrapper">
  <!-- Navbar -->
  <nav class="main-header navbar navbar-expand navbar-white navbar-light" style="background-color:rgb(60, 141, 188);">
    <!-- Left navbar links -->
    <ul class="navbar-nav">
      <li class="nav-item">
        <a class="nav-link" data-widget="pushmenu" href="#" role="button"><i class="fas fa-bars"></i></a>
      </li>
      <li class="nav-item d-none d-sm-inline-block">
        <a href="home"class="nav-link">Home</a>
      </li>
      <li class="nav-item d-none d-sm-inline-block">
        <a href="#" class="nav-link">Contact</a>
      </li>
    </ul>

    <!-- SEARCH FORM -->
    <form class="form-inline ml-3" action="{{url('/viewstudent')}}" method="GET">
      <div class="input-group input-group-sm">
        <input class="form-control form-control-navbar" type="search" placeholder="Search" aria-label="Search">
        <div class="input-group-append">
          <button class="btn btn-navbar" type="submit">
            <i class="fas fa-search"></i>
          </button>
        </div>
      </div>
    </form>
  </nav>
</div>


    <!-- Right navbar links -->
    {{-- <ul class="navbar-nav ml-auto" >
      <li class="nav-item">
        <a class="nav-link" data-widget="control-sidebar" data-slide="true" href="#" role="button">
          <i class="fas fa-th-large"></i>
        </a>
      </li>
    </ul> --}}
  </nav>
  <!-- /.navbar -->

  <!-- Main leftsidebar Container -->
  <aside class="main-sidebar sidebar-dark-blue-primary elevation-4" >
    <!-- Brand Logo -->
    <a href="#" class="brand-link" style="background-color:rgb(60, 141, 188);">
      <img src="{{asset('images/logo_ud.png')}}" alt="" class="brand-image img-circle elevation-3">
      <span class="brand-text font-weight-light" style="color:#ffff;">BIOMETRIC SAMS</span>
    </a>


      <!-- Sidebar Menu -->
<nav class="mt-2">
    <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
          <!-- Add icons to the links using the .nav-icon class
               with font-awesome or any other icon font library -->
          <li class="nav-item activee">
            <a href="#" class="nav-link">
              <i class="nav-icon fas fa-tachometer-alt"></i>
              <p>
                Dashboard
              </p>
            </a>
          </li>

<li class="nav-item has-treeview">
     <a href="#" class="nav-link">
          <i class="fa fa-building" aria-hidden="true"></i>
             <p>
               Department
              </p>
         </a>
<ul class="nav nav-treeview">
<li class="nav-item">
     <a href="department" class="nav-link">
          <i class="fa fa-building" aria-hidden="true"></i>

        <span class="brand-text font-weight-light">Department detail</span>
    </a>
</li>



<li class="nav-item">
    <a href="programme" class="nav-link">

         <i class="fa fa-list-alt" aria-hidden="true"></i>
         <span class="brand-text font-weight-light">Programme</span>
    </a>
</li>

<li class="nav-item">
    <a href="course" class="nav-link">

        <i class="fa fa-book" aria-hidden="true"></i>
        <span class="brand-text font-weight-light">Course Details</span>
    </a>
</li>

<li class="nav-item">
    <a href="staff" class="nav-link">

         <i class="fa fa-user" aria-hidden="true"></i>
      <span class="brand-text font-weight-light">Staff Details</span>
    </a>
</li>
</ul>
</li>

<li class="nav-item has-treeview">
    <a href="student" class="nav-link">
        <i class="fa fa-graduation-cap" aria-hidden="true"></i
              <span class="brand-text font-weight-light">Student Informations</span>
    </a>
</li>

<li class="nav-item has-treeview">
    <a href="#" class="nav-link">
        <i class="nav-icon fas fa-edit"></i>

        <span class="brand-text font-weight-light">Attendance Details</span>
    </a>
    <ul class="nav nav-treeview">
<li class="nav-item">
     <a href="attendance" class="nav-link">
          <i class="fa fa-building" aria-hidden="true"></i>

        <span class="brand-text font-weight-light">Attendance Register</span>
    </a>
</li>



<li class="nav-item">
    <a href="report" class="nav-link">

         <i class="fa fa-list-alt" aria-hidden="true"></i>
         <span class="brand-text font-weight-light">Report</span>
    </a>
</li>
</ul>
</li>










          {{--  <li class="nav-item has-treeview">
            <a href="#" class="nav-link">
            <i class="fa fa-bell" aria-hidden="true" style="font-size: 30px"></i>
              <p>
                Notification
                <i class="fas fa-angle-left right"></i>
              </p>
            </a>
            <ul class="nav nav-treeview">
              <li class="nav-item">
                <a href="pages/tables/simple.html" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Send Notification</p>
                </a>
              </li>
              <li class="nav-item">
                <a href="pages/tables/data.html" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Show Notification</p>
                </a>
              </li>
            </ul>
          </li>    --}}



          {{--  //logout#  --}}

          <li class="nav-item">
                <a class="nav-link" href="{{ route('logout') }}"
                        onclick="event.preventDefault();
                            document.getElementById('logout-form').submit();">
                            <i class="nav-icon far fa-circle text-danger"></i>
                                {{ __('Logout') }}
                            </a>
                        <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                    @csrf
                </form>
            </li>
    </ul>
</nav>
      <!-- /.sidebar-menu -->


    <!-- /.sidebar -->
  </aside>

  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">

    @yield('content')

  </div>
  <!-- /.content-wrapper -->
  <footer class="main-footer">
    <strong> Copyright &copy; Biometric student attendance management system</strong>
          All rights reserved.
  </footer>

  {{--  <!-- Control Sidebar -->
  <aside class="control-sidebar control-sidebar-dark">
    <!-- Control sidebar content goes here -->
  </aside>
  <!-- /.control-sidebar -->
</div>
<!-- ./wrapper -->  --}}

<!-- jQuery -->
<script src="{{ asset('plugins/jquery/jquery.min.js') }}"></script>
<!-- jQuery UI 1.11.4 -->
<script src="{{ asset('plugins/jquery-ui/jquery-ui.min.js') }}"></script>
<!-- Resolve conflict in jQuery UI tooltip with Bootstrap tooltip -->
<script>
  $.widget.bridge('uibutton', $.ui.button)
</script>
<!-- Bootstrap 4 -->
<script src="{{ asset('plugins/bootstrap/js/bootstrap.bundle.min.js') }}"></script>
<!-- ChartJS -->
 <script src="{{ asset('plugins/chart.js/Chart.min.js') }}"></script>
<!-- Sparkline -->
 <script src="{{ asset('plugins/sparklines/sparkline.js') }}"></script>
<!-- JQVMap -->
<script src="{{ asset('plugins/jqvmap/jquery.vmap.min.js') }}"></script>
 <script src="{{ asset('plugins/jqvmap/maps/jquery.vmap.usa.js') }}"></script>
<!-- jQuery Knob Chart -->
<script src="{{ asset('plugins/jquery-knob/jquery.knob.min.js') }}"></script>
<!-- daterangepicker -->
<script src="{{ asset('plugins/moment/moment.min.js') }}"></script>
<script src="{{ asset('plugins/daterangepicker/daterangepicker.js') }}"></script>
<!-- Tempusdominus Bootstrap 4 -->
<script src="{{ asset('plugins/tempusdominus-bootstrap-4/js/tempusdominus-bootstrap-4.min.js') }}"></script>
<!-- Summernote -->
{{--  <script src="{{ asset('plugins/summernote/summernote-bs4.min.js') }}"></script>  --}}
<!-- overlayScrollbars -->
<script src="{{ asset('plugins/overlayScrollbars/js/jquery.overlayScrollbars.min.js') }}"></script>
<!-- AdminLTE App -->
<script src="{{ asset('dist/js/adminlte.js') }}"></script>
<!-- AdminLTE dashboard demo (This is only for demo purposes) -->
<script src="{{ asset('dist/js/pages/dashboard.js') }}"></script>
<!-- AdminLTE for demo purposes -->
<script src="{{ asset('dist/js/demo.js') }}"></script>

@yield('scripts')


 <!-- Optional JavaScript -->
          <!-- jQuery first, then Popper.js, then Bootstrap JS -->

          <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js"   --}}
          integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
          <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js"
         integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
          <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js"
         integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>

          <script src="https://cdn.datatables.net/1.10.21/js/jquery.dataTables.min.js"></script>
         <script src="https://cdn.datatables.net/1.10.21/js/dataTables.bootstrap4.min.js"></script>

 </body>
</html>
