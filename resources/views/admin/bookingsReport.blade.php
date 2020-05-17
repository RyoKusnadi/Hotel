@extends('layouts.master')

@section('title')
    Bookings | RKStory Hotel
@endsection 
<style>
  table{
    max-width: 100%;
    table-layout: fixed;
  }
</style>

@section('content')
<div class="row">
    <div class="col-md-20">
      <div class="card">
        <div class="card-header">
          <h4 class="card-title"> 
            Booking Report
          </h4>
        </div>
        <div class="card-body">
          <div>
            <table class="table" id="dataTable">
              <thead class=" text-primary">
                <th>Id</th>
                <th>Book No</th>
                <th>Room No</th>
                <th>Room Type</th>
                <th>Status</th>
                <th>Check In</th>
                <th>Check Out</th>
                <th>Total</th>
                <th>Final Price</th>
                <th>Create By</th>
              </thead>
              <tfoot>
                <th>Id</th>
                <th>Book No</th>
                <th>Room No</th>
                <th>Room Type</th>
                <th>Status</th>
                <th>Check In</th>
                <th>Check Out</th>
                <th>Total</th>
                <th>Final Price</th>
                <th>Created By</th>
              </tfoot>
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
                      <td>{{$data->final_price}}</td>
                      <td>{{$data->users['name']}}</a></td>
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
 $(document).ready(function() {
    var table = $('#dataTable').DataTable(
        {dom: 'Bfrtip',
        buttons: ['copy', 'csv', 'excel', 'pdf', 'print']
      });
 
    $("#dataTable tfoot th").each( function ( i ) {
        var select = $('<select><option value=""></option></select>')
            .appendTo( $(this).empty() )
            .on( 'change', function () {
                table.column( i )
                    .search( $(this).val() )
                    .draw();
            } );
 
        table.column( i ).data().unique().sort().each( function ( d, j ) {
            select.append( '<option value="'+d+'">'+d+'</option>' )
        } );
    } );
} );
    </script>
@endsection








