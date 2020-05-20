<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="utf-8" />
  <link rel="apple-touch-icon" sizes="76x76" href="../assets/img/apple-icon.png">
  <link rel="icon" type="image/png" href="../assets/img/favicon.png">
  <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1" />
  <title>
    @yield('name')
  </title>
  <meta content='width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=0, shrink-to-fit=no' name='viewport' />
  <!--     Fonts and icons     -->
  <link href="https://fonts.googleapis.com/css?family=Montserrat:400,700,200" rel="stylesheet" />
  <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.7.1/css/all.css" integrity="sha384-fnmOCqbTlWIlj8LyTjo7mOUStjsKC4pOpQbqyi7RrhN7udi9RwhKkMHpvLbHG9Sr" crossorigin="anonymous">
  <!-- CSS Files -->
  <link href="../assets/css/bootstrap.min.css" rel="stylesheet" />
  <link href="../assets/css/now-ui-dashboard.css?v=1.5.0" rel="stylesheet" />
  <!-- CSS Just for demo purpose, don't include it in your project -->
  {{-- <link href="../assets/demo/demo.css" rel="stylesheet" /> --}}
  <link rel="stylesheet" href="../assets/css/dataTables.min.css">

  <link rel="stylesheet" href="https://cdn.datatables.net/buttons/1.5.6/css/buttons.dataTables.min.css">


</head>

<body class="">
  <div class="wrapper ">
    <div class="sidebar" data-color="orange">
      <div class="logo">
        <a href="https://www.linkedin.com/in/ryo-kusnadi/" class="simple-text logo-mini">
          RK
        </a>
        <a href="https://www.linkedin.com/in/ryo-kusnadi/" class="simple-text logo-normal">
          RK Story Hotel
        </a>
      </div>
      <div class="sidebar-wrapper" id="sidebar-wrapper">
        <ul class="nav">
          <li class="{{ 'dashboard' == request()->path() ? 'active' :'' }}">
            <a href="{{ url('/dashboard') }}">
              <i class="now-ui-icons design_app"></i>
              <p>Dashboard</p>
            </a>
          </li>
          <li class="{{ 'usersRole' == request()->path() ? 'active' :'' }}">
            <a href="{{ url('/usersRole') }}">
              <i class="now-ui-icons users_single-02"></i>
              <p>User Roles</p>
            </a>
          </li>
          <li class="{{ 'bookingreport' == request()->path() ? 'active' :'' }}">
            <a href="{{url('/bookingreport')}}">
              <i class="now-ui-icons education_atom"></i>
              <p>Booking Report</p>
            </a>
          </li>
          <li class="{{ 'roomsReport' == request()->path() ? 'active' :'' }}">
            <a href="{{url('/roomsReport')}}">
              <i class="now-ui-icons education_atom"></i>
              <p>Rooms Report</p>
            </a>
          </li>
          <li class="{{ 'bookings' == request()->path() ? 'active' :'' }}">
            <a href="{{ url('/bookings') }}">
              <i class="now-ui-icons ui-1_bell-53"></i>
              <p>Booking</p>
            </a>
          </li>
          <li class="{{ 'bookingapprovals' == request()->path() ? 'active' :'' }}">
            <a href="{{ url('/bookingapprovals') }}">
              <i class="now-ui-icons ui-1_bell-53"></i>
              <p>Booking Approval</p>
            </a>
          </li>
          <li class="{{ 'hotelFacilities' == request()->path() ? 'active' :'' }}">
            <a href="{{ url('/hotelFacilities') }}">
              <i class="now-ui-icons design_bullet-list-67"></i>
              <p>Hotel Facilities</p>
            </a>
          </li>
          <li class="{{ 'rooms' == request()->path() ? 'active' :'' }}">
            <a href="{{ url('/rooms') }}">
              <i class="now-ui-icons design_bullet-list-67"></i>
              <p>Rooms</p>
            </a>
          </li>
          <li class="{{ 'roomTypes' == request()->path() ? 'active' :'' }}" >
            <a href="{{ url('/roomTypes') }}/">
              <i class="now-ui-icons design_bullet-list-67"></i>
              <p>Room Types</p>
            </a>
          </li>
          <li class="{{ 'extraServices' == request()->path() ? 'active' :'' }}" >
            <a href="{{ url('/extraServices') }}">
              <i class="now-ui-icons design_bullet-list-67"></i>
              <p>Extra Services</p>
            </a>
          </li>
          <li class="{{ 'roomDiscounts' == request()->path() ? 'active' :'' }}">
            <a href="{{ url('/roomDiscounts') }}">
              <i class="now-ui-icons design_bullet-list-67"></i>
              <p>Room Discounts</p>
            </a>
          </li>
        </ul>
      </div>
    </div>
     
    <div class="main-panel" id="main-panel">
      <!-- Navbar -->
      <nav class="navbar navbar-expand-lg navbar-transparent  bg-primary  navbar-absolute">
        <div class="container-fluid">
          <div class="navbar-wrapper">
            <div class="navbar-toggle">
              <button type="button" class="navbar-toggler">
                <span class="navbar-toggler-bar bar1"></span>
                <span class="navbar-toggler-bar bar2"></span>
                <span class="navbar-toggler-bar bar3"></span>
              </button>
            </div>
          </div>
          <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navigation" aria-controls="navigation-index" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-bar navbar-kebab"></span>
            <span class="navbar-toggler-bar navbar-kebab"></span>
            <span class="navbar-toggler-bar navbar-kebab"></span>
          </button>
          <div class="collapse navbar-collapse justify-content-end" id="navigation">
            <ul class="navbar-nav">
              <li class="nav-item dropdown">
                <a id="navbarDropdown" class="nav-link dropdown-toggle" href="#" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre>
                    {{ Auth::user()->name }} <span class="caret"></span>
                </a>
                <div class="dropdown-menu dropdown-menu-right" aria-labelledby="navbarDropdown">
                    <a class="dropdown-item" href="{{ url('/home') }}">User Menu</a>
                    <a class="dropdown-item" href="{{ route('logout') }}"
                       onclick="event.preventDefault();
                                     document.getElementById('logout-form').submit();">
                        {{ __('Logout') }}
                    </a>
                    <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                        @csrf
                    </form>
                </div>
            </li>
            </ul>
          </div>
        </div>
      </nav>
      <!-- End Navbar -->


      <div class="panel-header panel-header-sm">
      </div>
      <div class="content">

        @yield('content')
        
      </div>



      <footer class="footer">
        <div>
          <nav>
            <ul>
              <li>
                Made by : Ryo Kusnadi
                <a style="margin:0; padding:0" href="https://www.linkedin.com/in/ryo-kusnadi/" target="_blank">|
                  <img src="../../../../../../../assets/img/linkedin.png" width="15" height="15" alt="Ryo's Linked In" title="Ryo's Linked In"> | 
                </a>
                <a style="margin:0; padding:0" href="https://github.com/RyoKusnadi" target="_blank">
                  <img src="../../../../../../../assets/img/Github.png" width="15" height="15" alt="Ryo's Github" title="Ryo's Github">
                </a>
              </li>
              <li style="float: right"></li>
            </ul>
          </nav>
          <div class="copyright" id="copyright">
            &copy; <script>
              document.getElementById('copyright').appendChild(document.createTextNode(new Date().getFullYear()))
            </script> Template By: Creative Team & Edited By Ryo</a>
          </div>
        </div>
      </footer>
    </div>
  </div>
  <!--   Core JS Files   -->
  <script src="../assets/js/core/jquery.min.js"></script>
  <script src="../assets/js/core/popper.min.js"></script>
  <script src="../assets/js/core/bootstrap.min.js"></script>
  <script src="../assets/js/plugins/perfect-scrollbar.jquery.min.js"></script>
  <script src="../assets/js/dataTables.min.js"></script>
  
  <!-- Chart JS -->
  <script src="../assets/js/plugins/chartjs.min.js"></script>
  <!--  Notifications Plugin    -->
  <script src="../assets/js/plugins/bootstrap-notify.js"></script>
  <!-- Control Center for Now Ui Dashboard: parallax effects, scripts for the example pages etc -->
  <script src="../assets/js/now-ui-dashboard.min.js?v=1.5.0" type="text/javascript"></script><!-- Now Ui Dashboard DEMO methods, don't include it in your project! -->
  <script src="../assets/demo/demo.js"></script>
  <script src="../assets/js/sweetalert.min.js"></script>
  
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.0/jquery.min.js"></script>
  <script src="https://cdn.datatables.net/1.10.19/js/jquery.dataTables.min.js"></script>
  <script src="https://cdn.datatables.net/buttons/1.5.6/js/dataTables.buttons.min.js"></script>
  <script src="https://cdn.datatables.net/buttons/1.5.6/js/buttons.flash.min.js"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/jszip/3.1.3/jszip.min.js"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/pdfmake/0.1.53/pdfmake.min.js"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/pdfmake/0.1.53/vfs_fonts.js"></script>
  <script src="https://cdn.datatables.net/buttons/1.5.6/js/buttons.html5.min.js"></script>
  <script src="https://cdn.datatables.net/buttons/1.5.6/js/buttons.print.min.js"></script>

  <script>
     @if (session('status'))
      // alert('{{session('status')}}');
      swal({
          title: '{{session('status')}}',
          icon: '{{session('statusCode')}}',
          button: "OK",
      });
    @endif
  </script>

  @yield('scripts')
</body>

</html>