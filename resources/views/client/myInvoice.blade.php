@extends('layouts.home')
<style>
    input,select {
    border:none;
    background:none;
    -webkit-box-shadow: none;
    -moz-box-shadow: none;
    box-shadow: none;
    }

    .footer {
    position: absolute;
    right: 0;
    bottom: 0;
    left: 0;
    text-align: center;
    }
</style>

@section('title')
    Invoice
@endsection

@section('content')
    <div class="row align-items-center" style="display:flex; width:90%; margin:0 auto; padding-left:2.6em">
        <div class="col-md-11">
            <h2><i class="fa fa-user"></i>Invoice</h2>
            <table class="table table-hover table-striped table-bordered mt-1">
                <tr>
                    <th>BOOK NUMBER:</th>
                    <td><input type="text" name="bookno" value="{{ $bookings->bookno  }}" readonly></td>
                    <th class="text-center">Photo</th>
                </tr>
                <tr>
                    <th>Room Type</th>
                    <td>
                        <select disabled="disabled" name="roomtype_id">
                        <option readonly data-subtext="{{ $bookings->roomtypes['name'] }}" value="{{ $bookings->roomtype_id }}">
                            {{  $bookings->roomtypes['name'] }}
                        </option>
                        </select>
                        <td rowspan="6"; align="center"><img src="../../../../../../../uploads/{{$rp}}" alt=""
                            class="img img-responsive"
                            style="width: 350px; margin: 10px"></td>
                    </td>
                </tr>
                <tr>
                    <th>Check In Date:</th>
                    <td><input type="date" name="check_in" value="{{ $bookings->check_in }}" readonly></td>
                </tr>
                <tr>
                    <th>Check Out Date</th>
                    <td><input type="date" name="check_out" value="{{ $bookings->check_out }}" readonly></td>
                </tr>
                 <tr>
                    <th>Price/Night</th>
                    <td><input type="text" name="prc" value="Rp.{{number_format($bookings->roomTypes['price'], 0,',', '.')}}" readonly></td>
                </tr>
                <tr>
                    <th>Total Price</th>
                    <td><input type="text" name="total" value="Rp.{{number_format($bookings->final_price, 0,',', '.')}}" readonly></td>
                </tr>
            </table>
            <tr>
                <td><a href="/home" class="btn btn-success" style="float: left;">BACK</a></td>
            </tr>
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
