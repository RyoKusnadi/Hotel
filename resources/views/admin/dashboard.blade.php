@extends('layouts.master')

@section('title')
    Dashboard | RKStory Hotel
@endsection 

@section('content')
<div class="content">
  <div class="row">
    {{-- Dashboard 1 --}}
    <div class="col-lg-4">
      <div class="card card-chart">
        <div class="card-header">
          <h5 class="card-category">Today Bookings</h5>
          <h4 class="card-title"><b>Received Reservation</b></h4>
        </div>
        <div class="card-body">
          <i class="fa fa-users fa-5x" style="float: right"></i>
          <div><h2>1000 CLIENTS</h2></div>
        </div>
        <div class="card-footer" style="background-color: #2F66A9">
          <a href="/dashboard" style="color:#FFD400">
              <div class="panel-footer">
                  <span class="pull-left">View Details</span>
                  <span class="pull-right"><i class="fa fa-arrow-circle-right"></i></span>
                  <div class="clearfix"></div>
              </div>
          </a>
            <h6 style="color: whitesmoke"><i class="now-ui-icons arrows-1_refresh-69"></i> Just Updated</h6>
        </div>
      </div>
    </div>
    {{-- Dashboard 2 --}}
    <div class="col-lg-4">
      <div class="card card-chart">
        <div class="card-header">
          <h5 class="card-category">Today CheckIn</h5>
          <h4 class="card-title"><b>Canceled Reservation</b></h4>
        </div>
        <div class="card-body">
          <i class="fa fa-user-times fa-5x" style="float: right"></i>
          <div><h2>10 CLIENTS</h2></div>
        </div>
        <div class="card-footer" style="background-color: #2F66A9">
          <a href="/dashboard" style="color:#FFD400">
              <div class="panel-footer">
                  <span class="pull-left">View Details</span>
                  <span class="pull-right"><i class="fa fa-arrow-circle-right"></i></span>
                  <div class="clearfix"></div>
              </div>
          </a>
            <h6 style="color: whitesmoke"><i class="now-ui-icons arrows-1_refresh-69"></i> Just Updated</h6>
        </div>
      </div>
    </div>
    {{-- Dashboard 3 --}}
    <div class="col-lg-4">
      <div class="card card-chart">
        <div class="card-header">
          <h5 class="card-category">Room Availability</h5>
          <h4 class="card-title"><b>Available Rooms</b></h4>
        </div>
        <div class="card-body">
          <i class="fas fa-home fa-5x" style="float: right"></i>
          <div><h2>{{$availablerooms}} ROOMS</h2></div>
        </div>
        <div class="card-footer" style="background-color: #2F66A9">
          <a href="/rooms" style="color:#FFD400">
              <div class="panel-footer">
                  <span class="pull-left">View Details</span>
                  <span class="pull-right"><i class="fa fa-arrow-circle-right"></i></span>
                  <div class="clearfix"></div>
              </div>
          </a>
            <h6 style="color: whitesmoke"><i class="now-ui-icons arrows-1_refresh-69"></i> Just Updated</h6>
        </div>
      </div>
    </div>
  {{-- Dashboard 4 --}}
  <div class="col-lg-4">
    <div class="card card-chart">
      <div class="card-header">
        <h5 class="card-category">Room Availability</h5>
        <h4 class="card-title"><b>Used Rooms</b></h4>
      </div>
      <div class="card-body">
        <i class="fa fa-user-clock fa-5x" style="float: right"></i>
        <div><h2>{{$usedrooms}} ROOMS</h2></div>
      </div>
      <div class="card-footer" style="background-color: #2F66A9">
        <a href="/rooms" style="color:#FFD400">
            <div class="panel-footer">
                <span class="pull-left">View Details</span>
                <span class="pull-right"><i class="fa fa-arrow-circle-right"></i></span>
                <div class="clearfix"></div>
            </div>
        </a>
          <h6 style="color: whitesmoke"><i class="now-ui-icons arrows-1_refresh-69"></i> Just Updated</h6>
      </div>
    </div>
  </div>
    {{-- Dashboard 5 --}}
    <div class="col-lg-4">
      <div class="card card-chart">
        <div class="card-header">
          <h5 class="card-category">Booking</h5>
          <h4 class="card-title"><b>Today Booking</b></h4>
        </div>
        <div class="card-body">
          <i class="fa fa-book-open fa-5x" style="float: right"></i>
          <div><h3>{{$todaybookings}} Transaction</h3></div>
        </div>
        <div class="card-footer" style="background-color: #2F66A9">
          <a href="/bookings" style="color:#FFD400">
              <div class="panel-footer">
                  <span class="pull-left">View Details</span>
                  <span class="pull-right"><i class="fa fa-arrow-circle-right"></i></span>
                  <div class="clearfix"></div>
              </div>
          </a>
            <h6 style="color: whitesmoke"><i class="now-ui-icons arrows-1_refresh-69"></i> Just Updated</h6>
        </div>
      </div>
    </div>
    {{-- Dashboard 6 --}}
    <div class="col-lg-4">
      <div class="card card-chart">
        <div class="card-header">
          <h5 class="card-category">Booking</h5>
          <h4 class="card-title"><b>Total Booking</b></h4>
        </div>
        <div class="card-body">
          <i class="fa fa-address-book fa-5x" style="float: right"></i>
          <div><h3>{{$monthlybookings}} Transaction</h3></div>
        </div>
        <div class="card-footer" style="background-color: #2F66A9">
          <a href="/bookings" style="color:#FFD400">
              <div class="panel-footer">
                  <span class="pull-left">View Details</span>
                  <span class="pull-right"><i class="fa fa-arrow-circle-right"></i></span>
                  <div class="clearfix"></div>
              </div>
          </a>
            <h6 style="color: whitesmoke"><i class="now-ui-icons ui-2_time-alarm"></i> This Month</h6>
        </div>
      </div>
    </div>
  </div> {{-- End Content  --}}
@endsection
@section('scripts')
    
@endsection