
@extends('layouts.app')

@section('title', 'Manage Users')

@section('content')

<h3>Users List</h3>
<a href="{{ route('admin.users.create') }}" class="btn btn-primary mb-3">+ Add New User</a>

@if ($users->count() == 0)
    <div class="alert alert-info">No User Found</div>

@endif

<table class="table table-bordered">
    <thead>
        <tr>
             <th>User ID</th>
            <th>Name</th>
            <th>Email</th>
            <th>Registration</th>
            <th>Action</th>
        </tr>
    </thead>

    <tbody>
        @foreach ($users as $user)
        
        
        <tr>
            <td>{{ $user->id }}</td>
            <td>{{ $user->name }}</td>
            <td>{{ $user->email }}</td>
            <td>{{ $user->created_at ->format('d-m-Y') }}</td>
            <td>
                <!-- edit -->
                 
                 <a href="{{ route('admin.users.edit',$user->id) }}" class="btn btn-sm btn-warning">Edit</a>

                <!-- Delete -->
                <form action="{{ route('admin.users.destroy',$user->id) }}" method="POST" style="display:inline;">
                    @csrf @method('DELETE')
                    <button class="btn btn-sm btn-danger" onclick="return confirm('Are You Sure You want to delete this user?')">Delete</button>

                </form>
            </td>
        </tr>
        @endforeach
    </tbody>
</table>
@endsection