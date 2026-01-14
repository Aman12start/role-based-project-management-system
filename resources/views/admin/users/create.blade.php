@extends('layouts.app')

@section('title','Create User')

@section('content')

<h3>Create New User</h3>

<form method="POST" action="{{ route('admin.users.store') }}">
    @csrf
    <div class="mb-3">
        <label>Name</label>
        <input type="text" name="name" class="form-control" value="{{ old('name') }}">
        @error('name')
        <small class="text-danger">{{ $message }}</small>
        @enderror

    </div>
    <div class="mb-3">
        <label>Email</label>
        <input type="email" name="email" class="form-control" value="{{ old('email') }}">
        @error('email')
        <small class="text-danger">{{ $message }}</small>
        @enderror

    </div>
    <div class="mb-3">
        <label>Password</label>
        <input type="password" name="password" class="form-control" value="{{ old('password') }}">
        @error('password')
        <small class="text-danger">{{ $message }}</small>
        @enderror

    </div>

    

    <button class="btn tn-success">Create User</button>
    <a href="{{ route('admin.users.index') }}" class="btn btn-danger">Back</a>
</form>

@endsection