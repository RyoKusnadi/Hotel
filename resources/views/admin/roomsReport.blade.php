@extends('layouts.master')

@section('title')
    Rooms Report | RKStory Hotel
@endsection 

@section('content')
<div class="row">
    <div class="col-md-12">
      <div class="card">
        <div class="card-header">
          <h4 class="card-title"> 
            Rooms Report
            <button type="button" class="btn btn-primary float-right" data-toggle="modal" data-target="#exampleModal">ADD</button>
          </h4>
        </div>
        <div class="card-body">
          <div class="table-responsive">
            <table id="dataTable" class="table table-stripped">
              <thead class="text-primary">
                <th>Id</th>
                <th>Room No</th>
                <th>Room Type</th>
                <th>Floor</th>
                <th>Bed</th>
                <th>Max</th>
                <th>Status</th>
              </thead>
              <tfoot>
                <th>Id</th>
                <th>Room No</th>
                <th>Room Type</th>
                <th>Floor</th>
                <th>Bed</th>
                <th>Max</th>
                <th>Status</th>
              </tfoot>
              <tbody>
                @foreach ($rooms as $index => $data)
                  <tr>
                      <td>{{$index +1}}</td>
                      <td>{{$data->roomNo}}</td>
                      <td>{{$data->roomtypes['name']}}</td>
                      <td>{{$data->floor}}</td>
                      <td>{{$data->beds}} Bed</td>
                      <td>{{$data->maxCapacity}} Person</td>
                      <td>{{$data->status}}</td>
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



