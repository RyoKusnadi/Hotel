@extends('layouts.master')

@section('title')
Edit Room Table | RKStory Hotel
@endsection 

@section('content')
    <div class="row">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header">
                    <h4 class="card-title"> Room - Edit</h4>
                    <form action="{{url('updateRooms/'.$rooms->id)}}" method="POST" enctype="multipart/form-data">
                        {{csrf_field()}}
                        {{method_field('PUT')}}
                        <div class="form-group">
                            <label for="roomNo" class="col-form-label">Room No:</label>
                            <input name="roomNo" type="text" class="form-control" value="{{ $rooms->roomNo }}">
                          </div>
                        <div class="form-group">
                            {!! Form::label('room','RoomTypes:') !!}
                            <select class="form-control" id="type" name="roomtype_id">
                                @foreach ($roomtypes as $type)
                                    <option data-subtext="{{ $type->name }}" value="{{ $type->id }}">{{ $type->name }}</option>
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
                            <input name="floor" type="text" class="form-control" value="{{ $rooms->floor }}">
                        </div>
                        <div class="form-group">
                          <label for="beds" class="col-form-label">Bed:</label>
                          <input name="beds" type="number" class="form-control" value="{{ $rooms->beds }}">
                        </div>
                        <div class="d-flex flex-column">
                            <label for="roomPicture">Room Picture: (Please Fill If You Want To Edit)</label>
                            <input type="file" name="roomPicture" class="py-2">
                            <div>{{ $errors->first('roomPicture') }}</div>
                        </div>
                        <div class="form-group">
                            <label for="maxCapacity" class="col-form-label">Max Capacity:</label>
                            <input name="maxCapacity" type="number" class="form-control" value="{{ $rooms->maxCapacity }}">
                        </div>
                        <div class="form-group">
                            <label for="remark" class="col-form-label">Remark:</label>
                            <input name="remark" type="text" class="form-control" value="{{ $rooms->remark }}">
                        </div>
                    </div>
                    <div class="modal-footer">
                      <button type="submit" class="btn btn-warning">UPDATE</button>
                      <a href="{{url('rooms')}}" class="btn btn-danger"> Cancel</a>
                    </div>
                  </form>
                </div>
            </div>
        </div>
    </div>
@endsection 

@section('scripts')
    
@endsection
