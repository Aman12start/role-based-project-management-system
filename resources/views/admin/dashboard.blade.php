@extends('layouts.app')

@section('title','Admin Dashboard')

@section('content')

<h3>Admin Dashboard</h3>

<hr>
<a href="{{route('admin.tasks.index')}}" class="btn btn-success">Manage Tasks</a>

<a href="{{route('admin.users.index')}}" class="btn btn-success">Manage Users</a>

<a href="{{route('admin.users.create')}}" class="btn btn-success">+ Add New User</a>


@endsection