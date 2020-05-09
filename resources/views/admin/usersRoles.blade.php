@extends('layouts.master')

@section('title')
    Users Table | RKStory Hotel
@endsection 

@section('content')
<div class="row">
    <div class="col-md-12">
      <div class="card">
        <div class="card-header">
          <h4 class="card-title"> Users Table</h4>
          @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
          @endif
        </div>
        <div class="card-body">
          <div class="table-responsive">
            <table class="table">
                <thead class=" text-primary">
                    <th>Name</th>
                    <th>Id No</th>
                    <th>Phone</th>
                    <th>Email</th>
                    <th>User Type</th>
                </thead>
              <tbody>
                @foreach ($users as $row)
                <tr>
                    <td>{{$row->name}}</td>
                    <td>{{$row->phone}}</td>
                    <td>{{$row->identification_no}}</td>
                    <td>{{$row->email}}</td>
                    <td>-{{$row->user_type}}</td>
                    <td>
                    <a href="/editUR/{{ $row->id }}" class="btn btn-success">EDIT</a>
                    </td>
                    <td>
                    <form action="/deleteUR/{{$row->id}}" method="POST">
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
    
@endsection
