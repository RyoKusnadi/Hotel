@extends('layouts.master')

@section('title')
Edit RoomTypes Table | RKStory Hotel
@endsection 

@section('content')
    <div class="row">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header">
                    <h4 class="card-title"> RoomTypes - Edit</h4>
                    <form action="{{url('updateRoomTypes/'.$roomtypes->id)}}" method="POST">
                        {{csrf_field()}}
                        {{method_field('PUT')}}
                        <div class="form-group">
                          <label for="name" class="col-form-label">Name:</label>
                        <input type="text" name="name" class="form-control" value="{{$roomtypes->name}}">
                        </div>
                        <div class="form-group">
                          <label for="price" class="col-form-label">Price:</label>
                          <input type="number" name="price" class="form-control" value="{{$roomtypes->price}}">
                        </div>
                        <div class="form-group">
                          <label for="description" class="col-form-label">Description:</label>
                          <textarea name="description" id="description" class="form-control">{{ $roomtypes->description }}
                          </textarea>
                        </div>
                    </div>
                    <div class="modal-footer">
                      <a href="{{url('roomTypes')}}" class="btn btn-danger"> Cancel</a>
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
