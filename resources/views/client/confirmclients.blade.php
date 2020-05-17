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
    CONFIRM BOOKING
@endsection

@section('content')
    <div class="row align-items-center" style="display:flex; width:90%; margin:0 auto; padding-left:2.6em">
        <div class="col-md-11">
            <h2><i class="fa fa-user"></i>CONFIRM BOOKING</h2>
            <form action="/saveClients" method="POST" enctype="multipart/form-data">
            {{ csrf_field() }}
            <table class="table table-hover table-striped table-bordered mt-1">
                <tr>
                    <th>BOOK NUMBER:</th>
                    <td><input type="text" name="bookno" value="{{ $nextInvoiceNumber }}" readonly></td>
                    <th class="text-center">Photo</th>
                </tr>
                <tr>
                    <th>BOOK By:</th>
                    <td><input type="text" name="bookby" value="{{ $bookings->bookby }}" readonly></td>
                    <input type="hidden" name="roomtype_id" value="{{ $bookings->roomtype_id }}" />
                        <td rowspan="7"; align="center"><img src="{{ asset('uploads/'.$rp) }}" alt=""
                            class="img img-responsive"
                            style="width: 150px; margin: 30px auto;"></td>
                </tr>
                <tr>
                    <th>Room Type</th>
                    <td>
                        <select disabled="disabled" name="roomtype_id">
                        <option readonly data-subtext="{{ $bookings->roomtypes['name'] }}" value="{{ $bookings->roomtype_id }}">
                            {{  $bookings->roomtypes['name'] }}
                        </option>
                        </select>
                    </td>
                </tr>
                <tr>
                    <th>Status</th>
                    <td>NEW</td>
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
                    <th>Total Price</th>
                    <td><input type="text" name="total" value="{{ $totalprice }}" readonly></td>
                </tr>
                <tr>
                    <th>Final Price</th>
                    <td><input type="text" name="final_price" value="{{ $finalprice }}" readonly></td>
                </tr>
            </table>
            <tr>
                <td><a href="/home" class="btn btn-danger" style="float: left;">BACK</a></td>
                <td><button type="submit" class="btn btn-success">Submit</button></td>
            </tr>
        </form>
    </div>

    <footer class="footer">
        <p><!-- Link back to Colorlib can't be removed. Template is licensed under CC BY 3.0. -->
          Copyright &copy;<script>document.write(new Date().getFullYear());</script> All rights reserved | This template is made with <i class="fa fa-heart" aria-hidden="true"></i> by <a href="https://colorlib.com" target="_blank">Colorlib.com</a>
          <!-- Link back to Colorlib can't be removed. Template is licensed under CC BY 3.0. --></p>
      </div>
</footer>
@endsection
