@extends('layout.app')

@section('page_content')
    <div class="row">
        <div class="col-md-12">
            <h3>Edit User</h3>
            <hr/>
        </div>
    </div>
    <div class="row">
        <div class="col-md-4">
            <form name="frm" action="{{ route('users.update', array('id' => $user->id)) }}" method="post">
                {{ csrf_field() }} {{ method_field('PATCH') }}
                <div class="form-group">
                    <label>Name: </label>
                    <input type="text" name="name" class="form-control" placeholder="Enter Name" required="required" value="{{ $user->name }}">
                </div>
                <div class="form-group">
                    <label>Email-Id: </label>
                    <input type="email" name="email" class="form-control" placeholder="Enter Email-Id" required="required" value="{{ $user->email }}">
                </div>
                <div class="form-group">
                    <label>Mobile Number: </label>
                    <input type="text" name="phno" class="form-control" placeholder="Enter Mobile Number" required="required" value="{{ $user->phno }}">
                </div>
                <button type="submit" class="btn btn-primary">Update User</button>
                <a href="{{ route('users.index') }}" class="btn btn-dark">Cancel</a>
            </form>
        </div>
    </div>
@endsection