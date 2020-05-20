@extends('layouts.master')

@section('title')
    Rooms | RKStory Hotel
@endsection 

@section('content')

  <div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="exampleModalLabel">Add Rooms</h5>
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">  
            <span aria-hidden="true">&times;</span>
          </button>
        </div>
        <div class="modal-body">
          <form action="/saveRooms" method="POST" enctype="multipart/form-data">
            {{csrf_field()}}
            <div class="form-group">
              <label for="roomno" class="col-form-label">Room No:</label>
              <input type="text" name="roomno" class="form-control">
              <div>{{ $errors->first('roomno') }}</div>
            </div>
            <div class="form-group">
              {!! Form::label('roomType','RoomType:') !!}
              <select class="selectpicker form-control" data-live-search="true"
                      title="" name="roomtype_id">
                  @foreach ($roomtypes as $roomtype)
                      <option data-subtext="{{ $roomtype->name }}" value="{{ $roomtype->id }}">{{ $roomtype->name }}</option>
                  @endforeach
              </select>
            </div>
            <div class="form-group">
              {!! Form::label('status','Room Status:') !!}
              <select class="selectpicker form-control" data-live-search="true"
                      title="" name="status">
                      <option value="AVAILABLE">AVAILABLE</option>
                      <option value="USED">USED</option>
              </select>
            </div>
            <div class="form-group">
              <label for="floor" class="col-form-label">Floor:</label>
              <input type="text" name="floor" class="form-control">
              <div>{{ $errors->first('floor') }}</div>
            </div>
            <div class="form-group">
              <label for="beds" class="col-form-label">Bed:</label>
              <input type="number" name="beds" class="form-control">
              <div>{{ $errors->first('beds') }}</div>
            </div>
            <div class="d-flex flex-column">
              <label for="roompicture">Room Picture:</label>
              <input type="file" name="roompicture" class="py-2">
              <div>{{ $errors->first('roompicture') }}</div>
            </div>
            <div class="form-group">
              <label for="maxcapacity" class="col-form-label">Max Capacity:</label>
              <input type="number" name="maxcapacity" class="form-control">
              <div>{{ $errors->first('maxcapacity') }}</div>
            </div>
            <div class="form-group">
              <label for="remark" class="col-form-label">Remark:</label>
              <input type="text" name="remark" class="form-control">
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
            Rooms 
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
                <th>Picture</th>
                <th></th>
                <th></th>
                <th></th>
              </thead>
              <tbody>
                @foreach ($rooms as $index => $data)
                  <tr style="padding-left: 1000px">
                      <td>{{$index +1}}</td>
                      <td>{{$data->roomNo}}</td>
                      <td>{{$data->roomtypes['name']}}</td>
                      <td>{{$data->floor}}</td>
                      <td>{{$data->beds}} Bed</td>
                      <td>{{$data->maxCapacity}} Person</td>
                      <td>{{$data->status}}</td>
                       <td style="width:15%" align="center"><img src="../../../../../../../uploads/{{$data->roomPicture}}" alt=""
                                         class="img img-responsive"
                                         style="width: 500px; margin: 30px auto;"></td>
                    <td><a href="rooms/{{ $data->id }}">Show Detail</a></td>
                      {{-- End Region Status --}}
                      <td><a href="{{url('editRooms/'.$data->id)}}" class="btn btn-success">EDIT</a></td>
                      <td>
                          <form action="{{url('deleteRooms/'.$data->id)}}" method="POST">
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








