@extends('layout.app')

@section('page_content')
    <div class="row">
        <div class="col-md-12">
            <h3>User Details</h3>
            <hr/>
        </div>
    </div>
    <div class="row">
        <div class="col-md-6">
            <table class="table">
                <tr>
                    <th>Name: </th>
                    <td>{{ $user->name }}</td>
                </tr>
                <tr>
                    <th>Email-Id: </th>
                    <td>{{ $user->email }}</td>
                </tr>
                <tr>
                    <th>Mobile Number: </th>
                    <td>{{ $user->phno }}</td>
                </tr>
                <tr>
                    <th></th>
                    <td>
                        <a href="{{ route('users.create') }}" class="btn btn-sm btn-info">Add New User</a>
                        <a href="{{ route('users.edit', array('id' => $user->id)) }}" class="btn btn-sm btn-primary">Edit This User</a>
                        <a href="{{ route('users.index') }}" class="btn btn-sm btn-dark">All Users</a>
                    </td>
                </tr>
            </table>
        </div>
    </div>
@endsection