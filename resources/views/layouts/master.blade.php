<!DOCTYPE html>
<html>
<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <title>@yield('title')</title>
  <!-- Tell the browser to be responsive to screen width -->
  <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no">
  <!-- Bootstrap 3.3.7 -->
  <link rel="stylesheet" href="{{ asset('style/bower_components/bootstrap/dist/css/bootstrap.min.css') }}">
  <!-- Font Awesome -->
  <link rel="stylesheet" href="{{ asset('style/bower_components/font-awesome/css/font-awesome.min.css') }}">
  <!-- Ionicons -->
  <link rel="stylesheet" href="{{ asset('style/bower_components/Ionicons/css/ionicons.min.css') }}">
  <!-- jvectormap -->
  <link rel="stylesheet" href="{{ asset('style/bower_components/jvectormap/jquery-jvectormap.css') }}">
  <!-- Theme style -->
  <link rel="stylesheet" href="{{ asset('style/dist/css/AdminLTE.min.css') }}">
  <!-- AdminLTE Skins. Choose a skin from the css/skins folder instead of downloading all of them to reduce the load. -->
  <link rel="stylesheet" href="{{ asset('style/dist/css/skins/_all-skins.min.css') }}">

  <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
  <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
  <!--[if lt IE 9]>
  <script src="https://oss.maxcdn.com/html5shiv/3.7.3/html5shiv.min.js"></script>
  <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
  <![endif]-->

  <!-- Google Font -->
  <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,600,700,300italic,400italic,600italic">

</head>
<body class="hold-transition skin-blue sidebar-mini sidebar-collapse">
<div class="wrapper">

  <header class="main-header">

    <!-- Logo -->
    <a href="/" class="logo">
      <!-- mini logo for sidebar mini 50x50 pixels -->
      <span class="logo-mini"><b>U</b>AS</span>
      <!-- logo for the regular state and mobile devices -->
      <span class="logo-lg"><b>Ujian</b>AkhirSemester</span>
    </a>

    <!-- Header Navbar: styles can be found in header.less -->
    <nav class="navbar navbar-static-top">
      <!-- Sidebar toggle button -->
        <a href="#" class="sidebar-toggle" data-toggle="push-menu" role="button" id="sidebar-toggle">

        <span class="sr-only">Toggle navigation</span>
      </a>
      <!-- Navbar Right Menu -->
      <div class="navbar-custom-menu">
        <ul class="nav navbar-nav">
          <!-- User Account: styles can be found in dropdown.less -->
          <li class="dropdown user user-menu">
            <a href="#" class="dropdown-toggle" data-toggle="dropdown">
              <img src="{{ asset('style/dist/img/user2-160x160.jpg') }}" class="user-image" alt="User Image">
              <span class="hidden-xs"> Fanuel Clemens </span>
            </a>
            <ul class="dropdown-menu">
              <!-- User image -->
                <li class="user-header">
                    <a href="https://id.linkedin.com/in/fanuel-clemens-910a3117b">
                <img src="{{ asset('style/dist/img/user2-160x160.jpg') }}" class="img-circle" alt="User Image">
                <li class="user-footer">
                <p>
                Fanuel Clemens - Web Developer
                </p>
                <small>2019110023</small>
                    </a>
              </li>
            </li>
            </ul>
          </li>
          <!-- Control Sidebar Toggle Button -->
        </ul>
      </div>
    </nav>
  </header>
  <!-- Left side column, contains the logo and sidebar -->
  <aside class="main-sidebar" id="sidebar">
    <!-- Sidebar: styles can be found in sidebar.less -->
    <section class="sidebar">
      <!-- Sidebar user panel -->
      <a href="https://id.linkedin.com/in/fanuel-clemens-910a3117b">
        <div class="user-panel">
            <div class="pull-left image">
                <img src="{{ asset('style/dist/img/user2-160x160.jpg') }}" class="img-circle" alt="User Image">
            </div>
            <div class="pull-left info">
                <p>Fanuel Clemens</p>
                <i class="fa fa-circle text-success"></i> Online
            </div>
        </div>
      </a>
      <!-- Sidebar menu: styles can be found in sidebar.less -->
      <ul class="sidebar-menu" data-widget="tree">
         <li class="header">NAVIGATION</li>
         <li class="active treeview">
            <li><a href="/"><i class="glyphicon glyphicon-home"></i><span>Home</span></a></li>
            <li><a href="{{ route('transactions.index') }}"><i class="glyphicon glyphicon-shopping-cart"></i><span>Transaction List</span></a></li>
            <li><a href="{{ route('accounts.index') }}"><i class="glyphicon glyphicon-user"></i><span>Account List</span></a></li>
            <li><a href="{{ route('transactions.create') }}"><i class="glyphicon glyphicon-plus"></i><span>Add New Transaction</span></a></li>
            <li><a href="{{ route('accounts.create') }}"><i class="glyphicon glyphicon-pencil"></i><span>Add New Account</span></a></li>
        </li>
        </ul>
      </ul>
    </section>
    <!-- /.sidebar -->
  </aside>

  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <!-- Main content -->
        <main class="container">
            @yield('content')
        </main>

      <!-- Info boxes -->
    <!-- /.content -->
  </div>
  <!-- /.content-wrapper -->

  <footer class="main-footer">
    <strong>Copyright &copy; 2023 <a href="https://id.linkedin.com/in/fanuel-clemens-910a3117b">Fanuel Clemens</a>. All rights reserved.
  </footer>

  <!-- Control Sidebar -->
</div>

<script>
    $(document).ready(function() {
      $("#sidebar").addClass("sidebar-collapsed");
      $("#sidebar-toggle").click(function() {
        if ($("#sidebar").hasClass("sidebar-collapsed")) {
            $("#sidebar").removeClass("sidebar-collapsed");
        } else {
          $("#sidebar").addClass("sidebar-collapsed");
        }
      });
    });
  </script>
  <script>
    $(document).ready(function () {
      $(".sidebar-toggle").click(function (e) {
        e.preventDefault();
        if ($("body").hasClass("sidebar-collapse")) {
          $("body").removeClass("sidebar-collapse");
        } else {
          $("body").addClass("sidebar-collapse");
        }
      });
    });
  </script>

<!-- jQuery 3 -->
<script src="{{ asset('style/bower_components/jquery/dist/jquery.min.js') }}"></script>
<!-- Bootstrap 3.3.7 -->
<script src="{{ asset('style/bower_components/bootstrap/dist/js/bootstrap.min.js') }}"></script>
<!-- FastClick -->
<script src="{{ asset('style/bower_components/fastclick/lib/fastclick.js') }}"></script>
<!-- AdminLTE App -->
<script src="{{ asset('style/dist/js/adminlte.min.js') }}"></script>
<!-- Sparkline -->
<script src="{{ asset('style/bower_components/jquery-sparkline/dist/jquery.sparkline.min.js') }}"></script>
<!-- jvectormap -->
<script src="{{ asset('style/plugins/jvectormap/jquery-jvectormap-1.2.2.min.js') }}"></script>
<script src="{{ asset('style/plugins/jvectormap/jquery-jvectormap-world-mill-en.js') }}"></script>
<!-- SlimScroll -->
<script src="{{ asset('style/bower_components/jquery-slimscroll/jquery.slimscroll.min.js') }}"></script>
<!-- ChartJS -->
<script src="{{ asset('style/bower_components/chart.js/Chart.js') }}"></script>
<!-- AdminLTE dashboard demo (This is only for demo purposes) -->
<script src="{{ asset('style/dist/js/pages/dashboard2.js') }}"></script>
<!-- AdminLTE for demo purposes -->
<script src="{{ asset('style/dist/js/demo.js') }}"></script>

<script src="https://cdn.jsdelivr.net/npm/axios/dist/axios.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/vue@2"></script>
@stack('scripts')
</body>
</html>
