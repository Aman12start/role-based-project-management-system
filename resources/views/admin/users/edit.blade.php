@extends('layouts.app')

@section('title','Edit User')

@section('content')
<h3>Edit User</h3>

<form action="{{ route('admin.users.update',$user->id) }}" method="POST">
    @csrf @method('PUT')
    <div class="mb-3">
        <label>Name</label>
        <input type="text" name="name" class="form-control" value="{{ old('name',$user->name) }}">

        @error('name')
        <small class="text-danger">{{ $message }}</small>
        @enderror
    </div>
    <div class="mb-3">
        <label>Email</label>
        <input type="email" name="email" class="form-control" value="{{ old('email',$user->email) }}">

        @error('email')
        <small class="text-danger">{{ $message }}</small>
        @enderror
    </div>

    <button class="btn btn-primary">Update User</button>
    <a href="{{ route('admin.users.index') }}" class="btn btn-danger">Back</a>
</form>

@endsection