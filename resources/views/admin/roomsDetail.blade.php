@extends('layouts.master')

@section('title')
    Room Detail
@endsection

@section('content')
    <div class="row">
        <div class="col-md-12 mt-5">

            <h2><i class="fa fa-user"></i> Room Detail</h2>
            <table class="table table-hover table-striped table-bordered mt-1">
                <tr>
                    <th>#ROOM NUMBER:</th>
                    <td>{{ $rooms->roomNo }}</td>
                    <th class="text-center">Photo</th>
                </tr>

                <tr>
                    <th>Room Type</th>
                    <td>{{ $rooms->roomtypes['name']}}</td>
                    <td rowspan="6"; align="center"><img src="{{ asset('uploads/'.$rooms->roomPicture) }}" alt=""
                                         class="img img-responsive"
                                         style="width: 150px; margin: 30px auto;"></td>
                </tr>

                <tr>
                    <th>Floor</th>
                    <td>{{ $rooms->floor }}</td>
                </tr>

                <tr>
                    <th>Beds</th>
                    <td>{{ $rooms->beds }}</td>
                </tr>

                <tr>
                    <th>Status</th>
                    <td>
                        @if ($rooms->status == 0)
                            <label class="label label-primary text-xs">Available <i class="fa fa-check"></i></label>
                        @elseif ($rooms->status == 1)
                            <label class="label label-warning text-xs">Booked <i class="fa fa-ban"></i></label>
                        @elseif ($rooms->status == 2)
                            <label class="label label-warning text-xs">Canceled <i class="fa fa-ban"></i></label>
                        @endif
                    </td>
                </tr>
                <tr>
                    <th>Max Capacity</th>
                    <td>{{ $rooms->maxCapacity }}</td>
                </tr>
                <tr>
                    <th>Remark</th>
                    <td>{{ $rooms->remark }}</td>
                </tr>
            </table>
            <tr>
                <td><a href="/rooms" class="btn btn-success" style="float: left;">BACK</a></td>
                <td><a href="{{url('editRooms/'.$rooms->id)}}" style="float: left;" class="btn btn-success">EDIT</a></td>
                <td>
                    <form action="{{url('deleteRooms/'.$rooms->id)}}" method="POST" style="float: left;">
                        {{csrf_field()}}
                        {{method_field('DELETE')}}
                        <input type="hidden" name="id" >
                        <button type="submit" class="btn btn-danger">DELETE</button>
                    </form> 
                </td>
            </tr>
    </div>
@endsection
