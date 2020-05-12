@extends('layouts.master')

@section('title')
Edit Payment Methods Table | RKStory Hotel
@endsection 

@section('content')
    <div class="row">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header">
                    <h4 class="card-title"> Payment Methods - Edit</h4>
                    <form action="{{url('updatePaymentMethods/'.$paymentmethods->id)}}" method="POST">
                        {{csrf_field()}}
                        {{method_field('PUT')}}
                        {{-- book id not done --}}
                        <div class="form-group">
                          <label for="book_Id" class="col-form-label">Book No:</label>
                        <input type="text" name="name" class="form-control" value="{{$paymentmethods->book_Id}}">
                        </div>
                        <div class="form-group">
                            <label for="paymentAmount" class="col-form-label">Payment Amount:</label>
                          <input type="number" name="paymentAmount" class="form-control" value="{{$paymentmethods->paymentAmount}}">
                        </div>
                        <div class="form-group">
                          <label for="payment_categories" class="col-form-label">Payment Methods:</label>
                          <textarea name="payment_categories" id="payment_categories" class="form-control">{{ $paymentmethods->payment_categories }}
                          </textarea>
                        </div>
                        <div class="form-group">
                            <label for="card_number" class="col-form-label">Card Number:</label>
                          <input type="date" name="card_number" class="form-control" value="{{$paymentmethods->card_number}}">
                        </div>
                        
                        <div class="form-group">
                            <label for="card_holdername" class="col-form-label">Card Holder Name:</label>
                          <input type="date" name="card_holdername" class="form-control" value="{{$paymentmethods->card_holdername}}">
                        </div>
                        <div class="form-group">
                            <label for="remarks" class="col-form-label">remarks:</label>
                          <input type="text" name="remarks" class="form-control" value="{{$paymentmethods->remarks}}">
                        </div>
                    </div>
                    <div class="modal-footer">
                      <a href="{{url('paymentMethods')}}" class="btn btn-danger"> Cancel</a>
                      <button type="submit" class="btn btn-warning">UPDATE</button>
                    </div>
                  </form>
                </div>
            </div>
        </div>
    </div>
@endsection 

@section('scripts')
    
@endsection
