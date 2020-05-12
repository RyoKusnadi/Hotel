@extends('layouts.master')

@section('title')
    Extra Services | RKStory Hotel
@endsection 

@section('content')

  <div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="exampleModalLabel">Add Extra Services</h5>
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">  
            <span aria-hidden="true">&times;</span>
          </button>
        </div>
        <div class="modal-body">
          <form action="/saveExtraServices" method="POST">
            {{csrf_field()}}
            <div class="form-group">
              {!! Form::label('rooms','Rooms:') !!}
              <select class="selectpicker form-control" data-live-search="true"
                      title="" name="room_id">
                  @foreach ($rooms as $room)
                      <option data-subtext="{{ $room->roomNo }}" value="{{ $room->id }}">{{ $room->roomNo }}</option>
                  @endforeach
              </select>
            </div>
            <div class="form-group">
                {!! Form::label('hotelFacilities','HotelFacilities:') !!}
                <select class="selectpicker form-control" data-live-search="true"
                        title="" name="facility_id">
                    @foreach ($hotelFacilities as $hotelfacility)
                        <option data-subtext="{{ $hotelfacility->name }}" value="{{ $hotelfacility->id }}">{{ $hotelfacility->name }}</option>
                    @endforeach
                </select>
            </div>
            <div class="form-group">
              <label for="description" class="col-form-label">Description:</label>
              <input type="text" name="description" class="form-control">
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
            Extra Services
            <button type="button" class="btn btn-primary float-right" data-toggle="modal" data-target="#exampleModal">ADD</button>
          </h4>
        </div>
        <div class="card-body">
          <div class="table-responsive">
            <table class="table table-stripped" id="dataTable" >
              <thead class=" text-primary">
                <th>Id</th>
                <th>Room</th>
                <th>Facility</th>
                <th>Price</th>
                <th></th>
                <th></th>
              </thead>
              <tbody>
                @foreach ($extraServices as $index => $data)
                  <tr>
                      <td>{{$index +1}}</td>
                      <td>{{$data->rooms['roomNo']}}</a></td>
                      <td>{{$data->hotelfacilities['name']}}</a></td>
                      <td>{{$data->description}}</td>
                      <td><a href="{{url('editExtraServices/'.$data->id)}}" class="btn btn-success">EDIT</a></td>
                      <td>
                          <form action="{{url('deleteExtraServices/'.$data->id)}}" method="POST">
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
      $(document).ready( function () {
        $('#dataTable').DataTable();
      } );
    
    </script>
@endsection








