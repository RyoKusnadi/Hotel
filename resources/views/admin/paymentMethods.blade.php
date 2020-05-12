@extends('layouts.master')

@section('title')
    Payment Methods | RKStory Hotel
@endsection 

@section('content')

  <div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="exampleModalLabel">Add Payment Methods</h5>
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">  
            <span aria-hidden="true">&times;</span>
          </button>
        </div>
        <div class="modal-body">
          <form action="/savePaymentMethods" method="POST">
            {{csrf_field()}}
            {{-- Book No Havent Done --}}
            <div class="form-group">
              <label for="name" class="col-form-label">Book No:</label>
              <input type="text" name="name" class="form-control">
            </div>
            <div class="form-group">
              <label for="paymentAmount" class="col-form-label">Payment Amount:</label>
              <input type="number" name="paymentAmount" class="form-control">
            </div>
            {{-- Need to Change Payment Categories --}}
            <div class="form-group">
              <label for="payment_categories" class="col-form-label">Payment Categories:</label>
              <input type="text" name="payment_categories" class="form-control">
            </div>
            <div class="form-group">
              <label for="card_number" class="col-form-label">Card Number:</label>
              <input type="text" name="card_number" class="form-control">
            </div>
            <div class="form-group">
              <label for="card_holdername" class="col-form-label">Card Holder Name:</label>
              <input type="text" name="card_holdername" class="form-control">
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
            Payment Methods 
            <button type="button" class="btn btn-primary float-right" data-toggle="modal" data-target="#exampleModal">ADD</button>
          </h4>
         
        </div>
        <div class="card-body">
          <div class="table-responsive">
            <table id="dataTable" class="table table-stripped">
              <thead class=" text-primary">
                <th>Id</th>
                <th>Book No</th>
                <th>Payment Amount</th>
                <th>Payment Date</th>
                <th>Payment Categories</th>
                <th>Card Number</th>
                <th>Card Holder Name</th>
                <th>Remarks</th>
                <th></th>
                <th></th>
              </thead>
              <tbody>
                @foreach ($paymentMethods as $index => $data)
                  <tr>
                      <td>{{$index +1}}</td>
                      {{-- book id not done --}}
                      <td>{{$data->book_Id}}</td>
                      <td>{{$data->paymentAmount}}</td>
                      <td>{{$data->paymentDate}}</td>
                      <td>{{$data->payment_categories}}</td>
                      <td>{{$data->card_number}}</td>
                      <td>{{$data->card_holdername}}</td>
                      <td>{{$data->remarks}}</td>
                      <td><a href="{{url('editPaymentMethods/'.$data->id)}}" class="btn btn-success">EDIT</a></td>
                      <td>
                          <form action="{{url('deletePaymentMethods/'.$data->id)}}" method="POST">
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