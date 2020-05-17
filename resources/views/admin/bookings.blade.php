@extends('layouts.master')

@section('title')
    Bookings | RKStory Hotel
@endsection 

@section('content')

  <div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="exampleModalLabel">Add Bookings</h5>
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">  
            <span aria-hidden="true">&times;</span>
          </button>
        </div>
        <div class="modal-body">
          <form action="/showBookings" method="POST">
            {{csrf_field()}}
            <div class="form-group">
              <label for="bookno" class="col-form-label">Book No:</label>
            <input readonly type="text" name="bookno" value="{{$nextInvoiceNumber}}" class="form-control">
            </div>
            <div class="form-group">
              {!! Form::label('rooms','Room No:') !!}
              <select class="selectpicker form-control" data-live-search="true"
                      title="" name="room_id">
                  @foreach ($rooms as $room)
                      <option data-subtext="{{ $room->roomNo }}" value="{{ $room->id }}">{{ $room->roomNo }}</option>
                  @endforeach
              </select>
            </div>
            <div class="form-group">
              {!! Form::label('rooms','Room Type:') !!}
              <select class="selectpicker form-control" data-live-search="true"
                      title="" name="roomtype_id">
                  @foreach ($roomtypes as $roomtype)
                      <option data-subtext="{{ $roomtype->name }}" value="{{ $roomtype->id }}">{{ $roomtype->name }}</option>
                  @endforeach
              </select>
            </div>
            <div class="form-group">
              <label for="check_in" class="col-form-label">Check In:</label>
              <input type="date" name="check_in" class="form-control">
          </div>
          <div class="form-group">
              <label for="check_out" class="col-form-label">Check Out:</label>
              <input type="date" name="check_out" class="form-control">
          </div>
          <div class="form-group">
            {!! Form::label('discounts','Discount:') !!}
            <select class="selectpicker form-control" data-live-search="true"
                    title="" name="discount_id">
                @foreach ($roomdiscounts as $discount)
                    <option  value="0">NONE</option>
                    <option data-subtext="{{ $discount->value }}" value="{{ $discount->id }}">{{ $discount->value }}</option>
                @endforeach
            </select>
          </div>
        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
          <button type="submit" class="btn btn-success">Submit</button>
        </div>
      </form>
      </div>
    </div>
  </div>



<div class="row">
    <div class="col-md-12">
      <div class="card">
        <div class="card-header">
          <h4 class="card-title"> 
            Booking
            <button type="button" class="btn btn-primary float-right" data-toggle="modal" data-target="#exampleModal">ADD</button>
          </h4>
        </div>
        <div class="card-body">
          <div class="table-responsive">
            <table class="table table-stripped" id="dataTable" >
              <thead class=" text-primary">
                <th>Id</th>
                <th>Book No</th>
                <th>Room No</th>
                <th>Room Type</th>
                <th>Status</th>
                <th>Check In</th>
                <th>Check Out</th>
                <th>Total</th>
                <th>Discount</th>
                <th>Final Price</th>
                <th></th>
                <th></th>
              </thead>
              <tbody>
                @foreach ($bookings as $index => $data)
                  <tr>
                      <td>{{$index +1}}</td>
                      <td>{{$data->bookno}}</a></td>
                      <td>{{$data->rooms['roomNo']}}</a></td>
                      <td>{{$data->roomtypes['name']}}</a></td>
                      <td>{{$data->status}}</td>
                      <td>{{$data->check_in}}</td>
                      <td>{{$data->check_out}}</td>
                      <td>{{$data->total}}</td>
                      <td>{{$data->roomdiscounts['value']}}%</td>
                      <td>{{$data->final_price}}</td>
                      <td><a href="{{url('editBookings/'.$data->id)}}" class="btn btn-success">EDIT</a></td>
                      <td>
                          <form action="{{url('deleteBookings/'.$data->id)}}" method="POST">
                              {{csrf_field()}}
                              {{method_field('DELETE')}}
                              <input type="hidden" name="id">
                              <button type="submit" class="btn btn-danger">DELETE</button>
                            </form> 
                      </td>
                  </tr>
                @endforeach
              </tbody>
            </table>
          </div>
        </div>
      </div>
    </div>
@endsection

@section('scripts')
    <script>
      $(document).ready(function () {
        $('#dataTable').DataTable({
            dom: 'Bfrtip',
            buttons: ['copy', 'csv', 'excel', 'pdf', 'print']
        });
    });
    </script>
@endsection








