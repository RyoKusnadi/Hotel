@extends('layouts.master')

@section('title')
Edit Extra Service Table | RKStory Hotel
@endsection 

@section('content')
    <div class="row">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header">
                    <h4 class="card-title"> Extra Service - Edit</h4>
                    <form action="{{url('updateExtraServices/'.$extraservices->id)}}" method="POST">
                        {{csrf_field()}}
                        {{method_field('PUT')}}
                        <div class="form-group">
                            {!! Form::label('room','Rooms:') !!}
                            <select class="form-control" name="room_id">
                                @foreach ($rooms as $room)
                                    <option data-subtext="{{ $room->roomNo }}" value="{{ $room->id }}">{{ $room->roomNo }}</option>
                                @endforeach
                            </select>
                        </div>
                        <div class="form-group">
                            {!! Form::label('hotelfacilities','hotelfacilities:') !!}
                            <select class="selectpicker form-control" data-live-search="true"
                                    title="" name="facility_id">
                                @foreach ($hotelfacilities as $hotelfacility)
                                    <option data-subtext="{{ $hotelfacility->name }}" value="{{ $hotelfacility->id }}">{{ $hotelfacility->name }}</option>
                                @endforeach
                            </select>
                        </div>
                        <div class="form-group">
                          <label for="description" class="col-form-label">Description:</label>
                          <input name="description" type="text" class="form-control" value="{{ $extraservices->description }}">
                        </div>
                    </div>
                    <div class="modal-footer">
                      <button type="submit" class="btn btn-warning">UPDATE</button>
                      <a href="{{url('extraServices')}}" class="btn btn-danger"> Cancel</a>
                    </div>
                  </form>
                </div>
            </div>
        </div>
    </div>
@endsection 

@section('scripts')
    
@endsection
