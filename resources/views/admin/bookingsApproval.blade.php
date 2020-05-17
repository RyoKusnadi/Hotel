@extends('layouts.master')

@section('title')
    Bookings | RKStory Hotel
@endsection 

@section('content')

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
            <table id="dataTable" class="table table-stripped">
              <thead class=" text-primary">
                <th>Id</th>
                <th>BookNo</th>
                <th>RoomNo</th>
                <th>Room Type</th>
                <th>Status</th>
                <th>Check In</th>
                <th>Check Out</th>
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
                      <td>{{$data->final_price}}</td>
                      <td></td>
                      @if ($data->status == 'WAITING')
                      <td>
                          <form action="{{url('approveBookings/'.$data->id)}}" method="POST"  style='float: left; padding-bottom:5px'>
                              {{csrf_field()}}
                              {{ method_field('PUT') }}
                              <input type="hidden" name="id">
                              <button type="submit" class="btn btn-success">APPROVE</button>
                          </form> 

                        <form action="{{url('declineBookings/'.$data->id)}}" method="POST" style='float: left;'>
                            {{csrf_field()}}
                            {{ method_field('PUT') }}
                            <input type="hidden" name="id">
                            <button type="submit" class="btn btn-danger">CANCEL</button>
                        </form> 
                    </td>
                    @elseif($data->status == 'APPROVED')
                      <td><a class="btn btn-success" style="color: whitesmoke">ALREADY APPROVED</a></td>
                    @elseif($data->status == 'CANCEL')
                      <td><a class="btn btn-danger" style="color: whitesmoke">ALREADY CANCELED</a></td>
                    @endif
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








