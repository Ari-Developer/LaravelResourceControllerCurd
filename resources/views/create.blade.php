@extends('layout.app')

@section('page_content')
    <div class="row">
        <div class="col-md-12">
            <h3>Add New User</h3>
            <hr/>
        </div>
    </div>
    <div class="row">
        <div class="col-md-4">
            <form name="frm" action="{{ route('users.store') }}" method="post">
                {{ csrf_field() }}
                <div class="form-group">
                    <label>Name: </label>
                    <input type="text" name="name" class="form-control" placeholder="Enter Name" required="required" value="{{ old('name') }}">
                </div>
                <div class="form-group">
                    <label>Email-Id: </label>
                    <input type="email" name="email" class="form-control" placeholder="Enter Email-Id" required="required" value="{{ old('email') }}">
                </div>
                <div class="form-group">
                    <label>Mobile Number: </label>
                    <input type="text" name="phno" class="form-control" placeholder="Enter Mobile Number" required="required" value="{{ old('phno') }}">
                </div>
                <button type="submit" class="btn btn-primary">Create User</button>
            </form>
        </div>
    </div>
@endsection