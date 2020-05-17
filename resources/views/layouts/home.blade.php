<!DOCTYPE html>
<html lang="en">
  <head>
    <title>@yield('name')</title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    
    <link href="https://fonts.googleapis.com/css?family=Poppins:200,300,400,500,600,700,800,900&display=swap" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css?family=Playfair+Display:400,400i,500,500i,600,600i,700,700i&display=swap" rel="stylesheet">

    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
 
    <link rel="stylesheet" href="../../css/animate.css">
    
    <link rel="stylesheet" href="../../css/owl.carousel.min.css">
    <link rel="stylesheet" href="../../css/owl.theme.default.min.css">
    <link rel="stylesheet" href="../../css/magnific-popup.css">

    <link rel="stylesheet" href="../../css/bootstrap-datepicker.css">
    <link rel="stylesheet" href="../../css/jquery.timepicker.css">

    <link rel="stylesheet" href="../../css/flaticon.css">
    <link rel="stylesheet" href="../../css/style.css">
  </head>
  <style>
     .footer {
      bottom: 0;
      width: 100%;
      margin:0;
      padding: 0;
      height: 2.5rem;
    }
  </style>
  <body>
		<nav class="navbar navbar-expand-lg navbar-dark ftco_navbar bg-dark ftco-navbar-light" id="ftco-navbar">
	    <div class="container">
	    	<a class="navbar-brand" href="index.html">RKSTORY<span>HOTEL</span></a>
	      <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#ftco-nav" aria-controls="ftco-nav" aria-expanded="false" aria-label="Toggle navigation">
	        <span class="fa fa-bars"></span> Menu
	      </button>
	      <div class="collapse navbar-collapse" id="ftco-nav">
	        <ul class="navbar-nav ml-auto">
            <li class="nav-item {{ 'home' == request()->path() ? 'active' :'' }}"><a href="{{ url('/home') }}" class="nav-link">Home</a></li>
            
          <?php $islogin = Auth::check() ?>
        {{-- if is already logged in --}}
          @if($islogin == true)
            <li class="nav-item {{ 'mybooking' == request()->path() ? 'active' :'' }}"><a href="{{ url('/mybooking') }}"class="nav-link">My Reservation</a></li>
            <li class="nav-item dropdown">
            <a id="navbarDropdown" style="text-transform:uppercase" class="nav-link dropdown-toggle" href="#" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre>
              WELCOME!! {{ Auth::user()->name }} <span class="caret"></span>
            </a>
            <div class="dropdown-menu dropdown-menu-right" aria-labelledby="navbarDropdown">
            
              <?php $role= Auth::user()->user_type ?>
              @if($role == "admin")
                        <a class="dropdown-item" href="{{ url('/dashboard') }}">ADMIN</a>
                        <a class="dropdown-item" href="{{ route('logout') }}"
                        onclick="event.preventDefault();
                                document.getElementById('logout-form').submit();">
                          {{ __('Logout') }}
                        </a>
                        <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                          @csrf
                        </form>
              @else
                        <a class="dropdown-item" href="{{ route('logout') }}"
                        onclick="event.preventDefault();
                                document.getElementById('logout-form').submit();">
                          {{ __('Logout') }}
                        </a>
                        <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                          @csrf
                        </form>
              @endif
          @else
              <li class="nav-item">
                <a class="nav-link" href="{{ route('login') }}">{{ __('Login') }}</a>
              </li>
              <li class="nav-item">
                    <a class="nav-link" href="{{ route('register') }}">{{ __('Register') }}</a>
              </li>
          @endif
              </div>
            </li>
	        </ul>
	      </div>
	    </div>
	  </nav>
    <!-- END nav -->
	<div class="content">

        @yield('content')
        
      </div>
    
  <!-- loader -->
  <div id="ftco-loader" class="show fullscreen"><svg class="circular" width="48px" height="48px"><circle class="path-bg" cx="24" cy="24" r="22" fill="none" stroke-width="4" stroke="#eeeeee"/><circle class="path" cx="24" cy="24" r="22" fill="none" stroke-width="4" stroke-miterlimit="10" stroke="#F96D00"/></svg></div>


  <script src="../../js/jquery.min.js"></script>
  <script src="../../js/jquery-migrate-3.0.1.min.js"></script>
  <script src="../../js/popper.min.js"></script>
  <script src="../../js/bootstrap.min.js"></script>
  <script src="../../js/jquery.easing.1.3.js"></script>
  <script src="../../js/jquery.waypoints.min.js"></script>
  <script src="../../js/jquery.stellar.min.js"></script>
  <script src="../../js/jquery.animateNumber.min.js"></script>
  <script src="../../js/bootstrap-datepicker.js"></script>
  <script src="../../js/jquery.timepicker.min.js"></script>
  <script src="../../js/owl.carousel.min.js"></script>
  <script src="../../js/jquery.magnific-popup.min.js"></script>
  <script src="../../js/scrollax.min.js"></script>
  <script src="../../js/main.js"></script>
  <script src="{{asset('assets/js/sweetalert.min.js') }}"></script>
  
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