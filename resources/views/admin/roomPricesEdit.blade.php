@extends('layouts.master')

@section('title')
Edit Room Price Table | RKStory Hotel
@endsection 

@section('content')
    <div class="row">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header">
                    <h4 class="card-title"> Room Price - Edit</h4>
                    <form action="{{url('updateRoomPrices/'.$roomprices->id)}}" method="POST">
                        {{csrf_field()}}
                        {{method_field('PUT')}}
                        <div class="form-group">
                            {!! Form::label('room','RoomTypes:') !!}
                            <select class="form-control" id="type" name="roomtype_id">
                                @foreach ($roomtypes as $room)
                                    <option data-subtext="{{ $room->name }}" value="{{ $room->id }}">{{ $room->name }}</option>
                                @endforeach
                            </select>
                        </div>
                        <div class="form-group">
                          <label for="price" class="col-form-label">price:</label>
                          <input name="price" type="number" class="form-control" value="{{ $roomprices->price }}">
                        </div>
                    </div>
                    <div class="modal-footer">
                      <button type="submit" class="btn btn-warning">UPDATE</button>
                      <a href="{{url('roomPrices')}}" class="btn btn-danger"> Cancel</a>
                    </div>
                  </form>
                </div>
            </div>
        </div>
    </div>
@endsection 

@section('scripts')
    
@endsection
