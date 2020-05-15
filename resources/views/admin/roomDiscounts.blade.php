@extends('layouts.master')

@section('title')
    Room Discounts | RKStory Hotel
@endsection 

@section('content')

  <div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="exampleModalLabel">Add Room Discounts</h5>
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">  
            <span aria-hidden="true">&times;</span>
          </button>
        </div>
        <div class="modal-body">
          <form action="/saveRoomDiscounts" method="POST">
            {{csrf_field()}}
            <div class="form-group">
              <label for="name" class="col-form-label">Name:</label>
              <input type="text" name="name" class="form-control">
            </div>
            <div class="form-group">
                <label for="value" class="col-form-label">Value:</label>
                <input type="number" name="value" class="form-control">
            </div>
            <div class="form-group">
              <label for="description" class="col-form-label">Description:</label>
              <textarea name="description" class="form-control rounded-0"></textarea>
            </div>
            <div class="form-group">
                <label for="valid_date" class="col-form-label">Valid Date:</label>
                <input type="date" name="valid_date" class="form-control">
            </div>
            <div class="form-group">
                <label for="valid_until" class="col-form-label">Valid Until:</label>
                <input type="date" name="valid_until" class="form-control">
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
            Room Discounts 
            <button type="button" class="btn btn-primary float-right" data-toggle="modal" data-target="#exampleModal">ADD</button>
          </h4>
         
        </div>
        <div class="card-body">
          <div class="table-responsive">
            <table id="dataTable" class="table table-stripped">
              <thead class=" text-primary">
                <th>Id</th>
                <th>Name</th>
                <th>Discount Value</th>
                <th>Used Count</th>
                <th>Description</th>
                <th>Valid Date</th>
                <th>Valid Until</th>
                <th></th>
                <th></th>
              </thead>
              <tbody>
                @foreach ($roomDiscounts as $index => $data)
                  <tr>
                      <td>{{$index +1}}</td>
                      <td>{{$data->name}}</td>
                      <td>{{$data->value}}</td>
                      <td>{{$data->usedcount}}</td>
                      <td>{{$data->description}}</td>
                      <td>{{$data->valid_date}}</td>
                      <td>{{$data->valid_until}}</td>
                      <td><a href="{{url('editRoomDiscounts/'.$data->id)}}" class="btn btn-success">EDIT</a></td>
                      <td>
                          <form action="{{url('deleteRoomDiscounts/'.$data->id)}}" method="POST">
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