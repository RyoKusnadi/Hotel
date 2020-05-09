@extends('layouts.master')

@section('title')
Edit Users Table | RKStory Hotel
@endsection 

@section('content')
<div class="container">
    <div class="col-md-12">
        <div class="card">
            <div class="card-body">
                <div class="card-header">
                    <h3>Edit User Roles</h3>
                </div>
                <div class="card-body">
                    <div class="row">
                        <div class="col-md-6">
                        <form action="/editURUpdate/{{$users ->id}}" method="POST">
                                {{csrf_field()}}
                                {{method_field('PUT')}}

                                <div class="form-group">
                                    <label>Name</label>
                                    <input type="text" name="username" value="{{ $users ->name }}" class="form-control">
                                </div>
                                <div class="form-group">
                                    <label>Give Role</label>
                                    <select name="usertype" class="form-control">
                                        <option value="admin">Admin</option>
                                        <option value="user">Normal User</option>
                                        <option value=" ">Noner</option>
                                    </select>
                                </div>
                                <button type="submit" class="btn btn-success"> Submit</button>
                                <a href="/usersRole" class="btn btn-danger"> Cancel</a>
                        </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection 

@section('scripts')
    
@endsection
