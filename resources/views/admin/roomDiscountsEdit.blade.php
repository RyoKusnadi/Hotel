@extends('layouts.master')

@section('title')
Edit Room Discounts Table | RKStory Hotel
@endsection 

@section('content')
    <div class="row">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header">
                    <h4 class="card-title"> Room Discounts - Edit</h4>
                    <form action="{{url('updateRoomDiscounts/'.$roomDiscounts->id)}}" method="POST">
                        {{csrf_field()}}
                        {{method_field('PUT')}}
                        <div class="form-group">
                          <label for="name" class="col-form-label">Name:</label>
                        <input type="text" name="name" class="form-control" value="{{$roomDiscounts->name}}">
                        </div>
                        <div class="form-group">
                            <label for="value" class="col-form-label">Value:</label>
                          <input type="number" name="value" class="form-control" value="{{$roomDiscounts->value}}">
                        </div>
                        <div class="form-group">
                          <label for="description" class="col-form-label">Description:</label>
                          <textarea name="description" id="description" class="form-control">{{ $roomDiscounts->description }}
                          </textarea>
                        </div>
                        <div class="form-group">
                            <label for="valid_date" class="col-form-label">Valid Date</label>
                          <input type="date" name="valid_date" class="form-control" value="{{$roomDiscounts->valid_date}}">
                        </div>
                        <div class="form-group">
                            <label for="valid_until" class="col-form-label">Valid Until</label>
                          <input type="date" name="valid_until" class="form-control" value="{{$roomDiscounts->valid_until}}">
                        </div>
                    </div>
                    <div class="modal-footer">
                      <a href="{{url('roomDiscounts')}}" class="btn btn-danger"> Cancel</a>
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
