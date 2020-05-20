@extends('layouts.master')
<style>
    input,select {
    border:none;
    background:none;
    -webkit-box-shadow: none;
    -moz-box-shadow: none;
    box-shadow: none;
}
</style>

@section('title')
    CONFIRM BOOKING
@endsection

@section('content')
    <div class="row">
        <div class="col-md-12 mt-5">

            <h2><i class="fa fa-user"></i>CONFIRM BOOKING</h2>
            <form action="/saveBookings" method="POST" enctype="multipart/form-data">
            {{ csrf_field() }}
            <table class="table table-hover table-striped table-bordered mt-1">
                <tr>
                    <th>BOOK NUMBER:</th>
                    <td><input type="text" name="bookno" value="{{ $bookings->bookno }}" readonly></td>
                    <th class="text-center">Photo</th>
                </tr>

                <tr>
                    <th>Room Number</th>
                    <td>
                        <select disabled="disabled" name="room_id">
                        <option readonly data-subtext="{{ $bookings->rooms['roomNo'] }}" value="{{ $bookings->room_id }}">
                            {{ $bookings->rooms['roomNo'] }}
                        </option>
                        </select>
                        <input type="hidden" name="room_id" value="{{ $bookings->room_id }}" />
                    </td>
                    <td rowspan="7"; align="center">
                        <img src="../../../../../../../uploads/{{$bookings->rooms['roomPicture']}}" alt="" class="img img-responsive" style="width: 450px; margin: 30px auto;">
                    </td>
                </tr>

                <tr>
                    <th>Room Type</th>
                    <td>
                        <select disabled="disabled" name="roomtype_id">
                        <option readonly data-subtext="{{ $bookings->roomtypes['name'] }}" value="{{ $bookings->roomtype_id }}">
                            {{  $bookings->roomtypes['name'] }}
                        </option>
                        </select>
                        <input type="hidden" name="roomtype_id" value="{{ $bookings->roomtype_id }}" />
                    </td>
                </tr>

                <tr>
                    <th>Status</th>
                    <td>{{ $bookings->status }}</td>
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
                    <th>Discount (%)</th>
                    <td>
                        <select disabled="disabled" name="discount_id">
                        <option readonly data-subtext="{{ $bookings->discount_id}}" value="{{ $bookings->roomdiscounts['value']}}">
                            {{  $bookings->discount_id }}
                        </option>   
                        </select>
                        <input type="hidden" name="discount_id" value="{{ $bookings->discount_id}}"/>
                    </td>
                </tr>
                <tr>
                    <th>Final Price</th>
                    <td><input type="text" name="final_price" value="{{ $finalprice }}" readonly></td>
                </tr>
            </table>
            <tr>
                <td><a href="/bookings" class="btn btn-danger" style="float: left;">BACK</a></td>
                <td><button type="submit" class="btn btn-success">Submit</button></td>
            </tr>
        </form>
    </div>
@endsection
