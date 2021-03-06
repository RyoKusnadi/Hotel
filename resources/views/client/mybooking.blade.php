@extends('layouts.home')

@section('title')
    WELCOME | RKStory Hotel
@endsection 

@section('content')
<style>
  .footer {
  position: absolute;
  right: 0;
  bottom: 0;
  left: 0;
}
</style>
<div class="row align-items-center" style="display:flex; width:90%; margin:0 auto; padding-left:2.6em">
    <div class="col-md-10">
      <div class="card">
        <div class="card-body">
          <div class="table-responsive">
            <table class="table table-stripped" id="dataTable" >
              <thead class=" text-primary">
                <th>Id</th>
                <th>Book No</th>
                <th>Room Type</th>
                <th>Status</th>
                <th>Check In</th>
                <th>Check Out</th>
                <th>Total</th>
                <th>Discount</th>
                <th>Final Price</th>
              </thead>
              <tbody>
                @foreach ($bookings as $index => $data)
                  <tr>
                      <td>{{$index +1}}</td>
                      <td>{{$data->bookno}}</a></td>
                      <td>{{$data->roomtypes['name']}}</a></td>
                      <td>{{$data->status}}</td>
                      <td>{{$data->check_in}}</td>
                      <td>{{$data->check_out}}</td>
                      <td>{{$data->total}}</td>
                      <td>{{$data->roomdiscounts['value']}}%</td>
                      <td>{{$data->final_price}}</td>
                  </tr>
                @endforeach
              </tbody>
            </table>
          </div>
        </div>
      </div>
    </div>

    <footer class="footer" style="float: left; padding:0px; margin:0; ">
      <p style="float: left"><!-- Link back to Colorlib can't be removed. Template is licensed under CC BY 3.0. -->
        Copyright &copy;<script>document.write(new Date().getFullYear());</script> All rights reserved | This template is made with <i class="fa fa-heart" aria-hidden="true"></i> by <a href="https://colorlib.com" target="_blank">Colorlib.com</a>
        <!-- Link back to Colorlib can't be removed. Template is licensed under CC BY 3.0. --></p>
      <p style="float: right; margin-right:10px" >Made by : Ryo Kusnadi
          <a style="margin:0; padding:0" href="https://www.linkedin.com/in/ryo-kusnadi/" target="_blank">|
            <img src="../../../../../../../assets/img/linkedin.png" width="15" height="15" alt="Ryo's Linked In" title="Ryo's Linked In"> | 
          </a>
          <a style="margin:0; padding:0" href="https://github.com/RyoKusnadi" target="_blank">
            <img src="../../../../../../../assets/img/Github.png" width="15" height="15" alt="Ryo's Github" title="Ryo's Github">
          </a>
      </p>
  </footer>
@endsection
@section('scripts')
    
@endsection