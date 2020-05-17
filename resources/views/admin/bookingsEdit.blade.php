@extends('layouts.master')

@section('title')
Edit Booking Table | RKStory Hotel
@endsection 

@section('content')
    <div class="row">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header">
                    <h4 class="card-title"> Booking - Edit</h4>
                    <form action="{{url('updateBookings/'.$bookings->id)}}" method="POST">
                        {{csrf_field()}}
                        {{method_field('PUT')}}
                        <div class="form-group">
                          <label for="bookno" class="col-form-label">Book No:</label>
                        <input type="text" name="bookno" disabled class="form-control" value="{{$bookings->bookno}}">
                        </div>
                        <div class="form-group">
                          {!! Form::label('Room No','Room No:') !!}
                          <select class="selectpicker form-control" data-live-search="true"
                                  title="" name="room_id">
                              @foreach ($rooms as $room)
                                  <option data-subtext="{{ $room->roomNo }}" value="{{ $room->id }}">{{ $room->roomNo }}</option>
                              @endforeach
                          </select>
                        </div>
                        <div class="form-group">
                          {!! Form::label('Room Type','Room Type:') !!}
                          <select class="selectpicker form-control" data-live-search="true"
                                  title="" name="roomtype_id">
                              @foreach ($roomtypes as $roomtype)
                                  <option data-subtext="{{ $roomtype->name }}" value="{{ $roomtype->id }}">{{ $roomtype->name }}</option>
                              @endforeach
                          </select>
                        </div>
                        <div class="form-group">
                          <label for="check_in" class="col-form-label">Check In:</label>
                        <input type="date" name="check_in" class="form-control" value="{{$bookings->check_in}}">
                        </div>
                        <div class="form-group">
                          <label for="check_out" class="col-form-label">Check Out:</label>
                        <input type="date" name="check_out" class="form-control" value="{{$bookings->check_out}}">
                        </div>
                        <div class="form-group">
                          <label for="total" class="col-form-label">Total:</label>
                        <input type="number" name="total" class="form-control" value="{{$bookings->total}}">
                        </div>
                        <div class="form-group">
                          {!! Form::label('Discount','Discount:') !!}
                          <select class="selectpicker form-control" data-live-search="true"
                                  title="" name="discount_id">
                              @foreach ($discounts as $discount)
                                  <option data-subtext="{{ $discount->value }}" value="{{ $discount->id }}">{{ $discount->value }}%</option>
                              @endforeach
                          </select>
                        </div>
                        <div class="form-group">
                          <label for="final_price" class="col-form-label">Final Price:</label>
                        <input type="number" name="final_price" class="form-control" value="{{$bookings->final_price}}">
                        </div>
                    </div>
                    <div class="modal-footer">
                      <button type="submit" class="btn btn-warning">UPDATE</button>
                      <a href="{{url('bookings')}}" class="btn btn-danger"> Cancel</a>
                    </div>
                  </form>
                </div>
            </div>
        </div>
    </div>
@endsection 

@section('scripts')
    
@endsection
