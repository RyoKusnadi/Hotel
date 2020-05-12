@extends('layouts.master')

@section('title')
Edit HotelFacilities Table | RKStory Hotel
@endsection 

@section('content')
    <div class="row">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header">
                    <h4 class="card-title"> Hotel Facilities - Edit</h4>
                    <form action="{{url('updateHotelFacilities/'.$hotelFacilities->id)}}" method="POST">
                        {{csrf_field()}}
                        {{method_field('PUT')}}
                        <div class="form-group">
                          <label for="name" class="col-form-label">Name:</label>
                        <input type="text" name="name" class="form-control" value="{{$hotelFacilities->name}}">
                        </div>
                        <div class="form-group">
                            <label for="price" class="col-form-label">Price:</label>
                          <input type="text" name="price" class="form-control" value="{{$hotelFacilities->price}}">
                        </div>
                        <div class="form-group">
                          <label for="description" class="col-form-label">Description:</label>
                          <textarea name="description" id="description" class="form-control">{{ $hotelFacilities->description }}
                          </textarea>
                        </div>
                    </div>
                    <div class="modal-footer">
                      <a href="{{url('hotelFacilities')}}" class="btn btn-danger"> Cancel</a>
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
