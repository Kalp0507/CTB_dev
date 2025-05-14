<!DOCTYPE html>
<html>
<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <title>Dashboard</title>
  <!-- Tell the browser to be responsive to screen width -->
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <!-- Font Awesome -->
  <link rel="stylesheet" href="{{ asset('plugins/fontawesome-free/css/all.min.css') }}">
  <!-- Ionicons -->
  <link rel="stylesheet" href="https://code.ionicframework.com/ionicons/2.0.1/css/ionicons.min.css">
  <!-- Tempusdominus Bbootstrap 4 -->
  <link rel="stylesheet" href="{{ asset('plugins/tempusdominus-bootstrap-4/css/tempusdominus-bootstrap-4.min.css') }}">
  <!-- iCheck -->
  <link rel="stylesheet" href="{{ asset('plugins/icheck-bootstrap/icheck-bootstrap.min.css') }}">
  <!-- JQVMap -->
  <link rel="stylesheet" href="{{ asset('plugins/jqvmap/jqvmap.min.css') }}">
  <!-- Theme style -->
  <link rel="stylesheet" href="{{ asset('dist/css/adminlte.min.css') }}">
  <!-- overlayScrollbars -->
  <link rel="stylesheet" href="{{ asset('plugins/overlayScrollbars/css/OverlayScrollbars.min.css') }}">
  <!-- Daterange picker -->
  <link rel="stylesheet" href="{{ asset('plugins/daterangepicker/daterangepicker.css') }}">
  <!-- summernote -->
  <link rel="stylesheet" href="{{ asset('plugins/summernote/summernote-bs4.css') }}">
  <!-- Google Font: Source Sans Pro -->
  <link href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700" rel="stylesheet">
  <link rel="stylesheet" type="text/css" href="{{ asset('css/admindashboard.css') }}">
  <link rel="stylesheet" type="text/css" href="https://cdnjs.cloudflare.com/ajax/libs/slick-carousel/1.8.1/slick.min.css">
  <link rel="stylesheet" type="text/css" href="https://cdnjs.cloudflare.com/ajax/libs/slick-carousel/1.8.1/slick-theme.min.css">
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.1/css/all.min.css" integrity="sha512-+4zCK9k+qNFUR5X+cKL9EIR+ZOhtIloNl9GIKS57V1MyNsYpYcUrUeQc9vNfzsWfV28IaLL3i96P9sdNyeRssA==" crossorigin="anonymous" />
  @include('includes.head')
</head>
<body class="hold-transition sidebar-mini layout-fixed">
<div class="wrapper">
  <!-- Navbar -->
  <nav class="main-header navbar navbar-expand navbar-white navbar-light">
    <ul class="navbar-nav">
      <li class="nav-item">
        <a class="nav-link" data-widget="pushmenu" href="#" role="button"><i class="fas fa-bars"></i></a>
      </li>
    </ul>
  	<!-- <h3 class="m-0 text-dark disableView d-none">Dashboard</h3> -->
   <!-- Right navbar links -->
    <ul class="navbar-nav ml-auto">
    	<li>
    		<!-- SEARCH FORM -->
		    <!-- <form class="form-inline ml-3 ">
		      <div class="input-group input-group-sm">
		        <input class="form-control form-control-navbar" type="search" placeholder="Search" aria-label="Search">
		        <div class="input-group-append">
		          <button class="btn btn-navbar" type="submit">
		            <i class="fas fa-search"></i>
		          </button>
		        </div>
		      </div>
		    </form> -->
    	</li>
      <!-- Messages Dropdown Menu -->
      <li class="nav-item dropdown">
        <a class="nav-link" data-toggle="dropdown" href="#">
          <i class="far fa-comments"></i>
          <!-- <span class="badge badge-danger navbar-badge">3</span> -->
        </a>
        <div class="dropdown-menu dropdown-menu-lg dropdown-menu-right">
          <a href="#" class="dropdown-item">
            <!-- Message Start -->
            <div class="media">
              <img src="{{ asset('dist/img/user1-128x128.jpg') }}" alt="User Avatar" class="img-size-50 mr-3 img-circle">
              <div class="media-body">
                <h3 class="dropdown-item-title">
                  Brad Diesel
                  <span class="float-right text-sm text-danger"><i class="fas fa-star"></i></span>
                </h3>
                <p class="text-sm">Call me whenever you can...</p>
                <p class="text-sm text-muted"><i class="far fa-clock mr-1"></i> 4 Hours Ago</p>
              </div>
            </div>
            <!-- Message End -->
          </a>
          <div class="dropdown-divider"></div>
          <a href="#" class="dropdown-item">
            <!-- Message Start -->
            <div class="media">
              <img src="{{ asset('dist/img/user8-128x128.jpg') }}" alt="User Avatar" class="img-size-50 img-circle mr-3">
              <div class="media-body">
                <h3 class="dropdown-item-title">
                  John Pierce
                  <span class="float-right text-sm text-muted"><i class="fas fa-star"></i></span>
                </h3>
                <p class="text-sm">I got your message bro</p>
                <p class="text-sm text-muted"><i class="far fa-clock mr-1"></i> 4 Hours Ago</p>
              </div>
            </div>
            <!-- Message End -->
          </a>
          <div class="dropdown-divider"></div>
          <a href="#" class="dropdown-item">
            <!-- Message Start -->
            <div class="media">
              <img src="{{ asset('dist/img/user3-128x128.jpg') }}" alt="User Avatar" class="img-size-50 img-circle mr-3">
              <div class="media-body">
                <h3 class="dropdown-item-title">
                  Nora Silvester
                  <span class="float-right text-sm text-warning"><i class="fas fa-star"></i></span>
                </h3>
                <p class="text-sm">The subject goes here</p>
                <p class="text-sm text-muted"><i class="far fa-clock mr-1"></i> 4 Hours Ago</p>
              </div>
            </div>
            <!-- Message End -->
          </a>
          <div class="dropdown-divider"></div>
          <a href="#" class="dropdown-item dropdown-footer">See All Messages</a>
        </div>
      </li>
      <!-- Notifications Dropdown Menu -->
      <li class="nav-item dropdown">
        <!-- <a class="nav-link" data-toggle="dropdown" href="#">
          <i class="far fa-bell"></i>
          <span class="badge badge-warning navbar-badge">15</span>
        </a> -->
        <div class="dropdown-menu dropdown-menu-lg dropdown-menu-right">
          <span class="dropdown-item dropdown-header">15 Notifications</span>
          <div class="dropdown-divider"></div>
          <a href="#" class="dropdown-item">
            <i class="fas fa-envelope mr-2"></i> 4 new messages
            <span class="float-right text-muted text-sm">3 mins</span>
          </a>
          <div class="dropdown-divider"></div>
          <a href="#" class="dropdown-item">
            <i class="fas fa-users mr-2"></i> 8 friend requests
            <span class="float-right text-muted text-sm">12 hours</span>
          </a>
          <div class="dropdown-divider"></div>
          <a href="#" class="dropdown-item">
            <i class="fas fa-file mr-2"></i> 3 new reports
            <span class="float-right text-muted text-sm">2 days</span>
          </a>
          <div class="dropdown-divider"></div>
          <a href="#" class="dropdown-item dropdown-footer">See All Notifications</a>
        </div>
      </li>
      <li class="user-panel d-flex">
        <div class="image">
          <img src="{{ asset('images/adminIcon.jpeg') }}" class="img-circle elevation-2" alt="User Image">
        </div>
        <div class="info">
          @if (Auth::check())
            <a href="#" class="d-block">{{Auth::user()->username}}</a>
          @else
            <a href="#" class="d-block">Alexander Pierce</a>
          @endif
          
        </div>
      </li>
    </ul>
  </nav>
  <!-- /.navbar -->

  <!-- Main Sidebar Container -->
  <aside class="main-sidebar sidebar-dark-primary elevation-4">
    <!-- Brand Logo -->
    <!-- <a href="index3.html" class="brand-link">
      <img src="{{ asset('dist/img/AdminLTELogo.png') }}" alt="AdminLTE Logo" class="brand-image img-circle elevation-3"
           style="opacity: .8">
      <span class="brand-text font-weight-light">AdminLTE 3</span>
    </a> -->

    <!-- Sidebar -->
    <div class="sidebar">
      <!-- Sidebar user panel (optional) -->
      <div class="user-panel d-flex py-4 justify-content-center">
        <div class="image">
          <img src="{{ asset('images/mcm-logo.jpg') }}" style="width: 80px" class="elevation-2 " alt="User Image">
        </div>
        <div class="info" style="margin: auto;">
          <a href="/Dashboard" class="d-block">MYCARMECH</a>
        </div>
      </div>

      <!-- Sidebar Menu -->
      <nav class="mt-2">
        <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
          <!-- Add icons to the links using the .nav-icon class
               with font-awesome or any other icon font library -->
          <li class="nav-item dashboardNav">
            <a href="/Dashboard" class="nav-link dashboardLink">
              <i class="nav-icon fas fa-tachometer-alt"></i>
              <p>
                Dashboard
              </p>
            </a>
          </li>
          <li class="nav-item dashboardNav">
            <a href="/Dashboard/Bookings" class="nav-link bookingsLink">
              <i class="nav-icon fas fa-th"></i>
              <p>
                Bookings
                 <!-- <span class="badge badge-info right">6</span> -->
              </p>
            </a>
          </li>
          <li class="nav-item dashboardNav">
            <a href="/Dashboard/Orders" class="nav-link ordersLink">
              <i class="nav-icon fas fa-th"></i>
              <p>
                Order Details
                 <!-- <span class="badge badge-info right">6</span> -->
              </p>
            </a>
          </li>
          <li class="nav-item dashboardNav">
            <a href="/Dashboard/Leads" class="nav-link leadsLink">
              <i class="nav-icon fas fa-th"></i>
              <p>
                Leads
              </p>
            </a>
          </li>
          <li class="nav-item dashboardNav">
            <a href="/Dashboard/Garage" class="nav-link garagesLink">
              <i class="nav-icon fas fa-th"></i>
              <p>
                Garages
                 <!-- <span class="badge badge-info right">6</span> -->
              </p>
            </a>
          </li>
          <!-- <li class="nav-item">
            <a href="/Dashboard/AddGarages" class="nav-link">
              <i class="nav-icon fas fa-th"></i>
              <p>
                Add Garages
              </p>
            </a>
          </li> -->
          <!-- <li class="nav-item">
            <a href="/Dashboard" class="nav-link">
              <i class="nav-icon fas fa-th"></i>
              <p>
                Generate Request
              </p>
            </a>
          </li> -->
      @if (Auth::check())
        @if(Auth::user()->id !== 26 && Auth::user()->id !== 27 )

          <li class="nav-item dashboardNav">
            <a href="/Dashboard/AddNewPackages" class="nav-link addPackagesLink">
              <i class="nav-icon fas fa-th"></i>
              <p>
                Packages
              </p>
            </a>
          </li>
          <!-- <li class="nav-item">
            <a href="/Dashboard/AddNewUpkeep" class="nav-link">
              <i class="nav-icon fas fa-th"></i>
              <p>
                Add New Upkeeps
              </p>
            </a>
          </li> -->
          <li class="nav-item dashboardNav">
            <a href="/Dashboard/AddNewServices" class="nav-link addServicesLink">
              <i class="nav-icon fas fa-th"></i>
              <p>
                Package Details 
              </p>
            </a>
          </li>

          <li class="nav-item dashboardNav">
            <a href="/Dashboard/make" class="nav-link makeLink">
              <i class="nav-icon fas fa-th"></i>
              <p>
                Make
              </p>
            </a>
          </li>

          <li class="nav-item dashboardNav">
            <a href="/Dashboard/car" class="nav-link modelLink">
              <i class="nav-icon fas fa-th"></i>
              <p>
                Model
              </p>
            </a>
          </li>

          <li class="nav-item dashboardNav">
            <a href="/Dashboard/addon" class="nav-link addonLink">
              <i class="nav-icon fas fa-th"></i>
              <p>
                Popular Services
              </p>
            </a>
          </li>

          <li class="nav-item dashboardNav">
            <a href="/Dashboard/carPartPricing" class="nav-link carPartPriceLink">
              <i class="nav-icon fas fa-th"></i>
              <p>
                Accidental Repair
              </p>
            </a>
          </li>
          <!-- <li class="nav-item dashboardNav">
            <a href="/Dashboard/uploadServicesParts" class="nav-link uploadServicesLink">
              <i class="nav-icon fas fa-th"></i>
              <p>
                Upload Services/Parts
              </p>
            </a>
          </li> -->
          <li class="nav-item dashboardNav">
            <a href="/Dashboard/mechanicalServices" class="nav-link mechanicalServiceLink">
              <i class="nav-icon fas fa-th"></i>
              <p>
                Mechanincal Service
              </p>
            </a>
          </li>
          <li class="nav-item dashboardNav">
            <a href="/Dashboard/acServices" class="nav-link acServiceLink">
              <i class="nav-icon fas fa-th"></i>
              <p>
                AC Services
              </p>
            </a>
          </li>
          <li class="nav-item dashboardNav">
            <a href="/Dashboard/batteryTyres" class="nav-link batteryTyresLink">
              <i class="nav-icon fas fa-th"></i>
              <p>
                Battery and Tyres
              </p>
            </a>
          </li>
          <li class="nav-item dashboardNav">
            <a href="/Dashboard/upkeepServices" class="nav-link upkeepServiceLink">
              <i class="nav-icon fas fa-th"></i>
              <p>
                Detailing Services
              </p>
            </a>
          </li>
          <li class="nav-item dashboardNav">
            <a href="/Dashboard/seasonal" class="nav-link seasonalOffersLink">
              <i class="nav-icon fas fa-th"></i>
              <p>
                Seasonal Offers
              </p>
            </a>
          </li>
          <li class="nav-item dashboardNav">
            <a href="/Dashboard/promocode" class="nav-link promoLink">
              <i class="nav-icon fas fa-th"></i>
              <p>
                Promocode
              </p>
            </a>
          </li>
          <li class="nav-item dashboardNav">
            <a href="/Dashboard/insuranceCompanies" class="nav-link insuranceLink">
              <i class="nav-icon fas fa-th"></i>
              <p>
                Insurance Companies
              </p>
            </a>
          </li>
          <!-- <li class="nav-item dashboardNav">
            <a href="/Dashboard/serviceParts" class="nav-link servicePartsLink">
              <i class="nav-icon fas fa-th"></i>
              <p>
                Service/Parts
              </p>
            </a>
          </li> -->
          <!-- <li class="nav-item dashboardNav">
            <a href="/Dashboard/membershipPackages" class="nav-link memberLink">
              <i class="nav-icon fas fa-th"></i>
              <p>
                Membership Packages
              </p>
            </a>
          </li> -->
            <li class="nav-item dashboardNav">
            <a href="/ViewUserReward" class="nav-link rewardLink">
              <i class="nav-icon fas fa-th"></i>
              <p>
                Reward
              </p>
            </a>
          </li>
        @endif
      @endif    
          
          <!-- <li class="nav-header">LABELS</li> -->
          <li class="nav-item">
            <a href="/logout" class="nav-link">
              <i class="nav-icon far fa-circle text-danger"></i>
              <p class="text">Logout</p>
            </a>
          </li>
        </ul>
      </nav>
      <!-- /.sidebar-menu -->
    </div>
    <!-- /.sidebar -->
  </aside>

  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">

    <!-- Main content -->
 	@yield('content')
    <!-- /.content -->
  </div>
  <!-- /.content-wrapper -->
  <footer class="main-footer" style="display: flex; justify-content: space-between;">
    <div>
      <strong style="font-size: 13px;">Copyright &copy; 2020-2021 </strong>
      <span style="font-size: 13px;">All rights reserved.</span>
    </div>
    
    <div style="font-size: 13px;">
      Website designed and developed by <a href="https://aasa.tech/">AASA Technologies</a>
    </div>
      

    <div style="font-size: 13px;" class="float-right d-none d-sm-inline-block">
      <b>Version</b> 3.0.5
    </div>
  </footer>

  <!-- Control Sidebar -->
  <aside class="control-sidebar control-sidebar-dark">
    <!-- Control sidebar content goes here -->
  </aside>
  <!-- /.control-sidebar -->
</div>
<!-- ./wrapper -->
<!-- jQuery -->
<!-- jQuery UI 1.11.4 -->
<script src="{{ asset('plugins/jquery-ui/jquery-ui.min.js') }}"></script>
<!-- Resolve conflict in jQuery UI tooltip with Bootstrap tooltip -->
<script>
  $.widget.bridge('uibutton', $.ui.button)
</script>
<!-- Bootstrap 4 -->
<script src="{{  asset('plugins/bootstrap/js/bootstrap.bundle.min.js') }}"></script>
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
<script src="{{ asset('plugins/summernote/summernote-bs4.min.js') }}"></script>
<!-- overlayScrollbars -->
<script src="{{ asset('plugins/overlayScrollbars/js/jquery.overlayScrollbars.min.js') }}"></script>
<!-- AdminLTE App -->
<script src="{{ asset('dist/js/adminlte.js') }}"></script>
<!-- AdminLTE dashboard demo (This is only for demo purposes) -->
<script src="{{ asset('dist/js/pages/dashboard.js') }}"></script>
<!-- AdminLTE for demo purposes -->
<script src="{{ asset('dist/js/demo.js') }}"></script>
<div>
         @include('includes.foot')
</div>
</body>
</html>
