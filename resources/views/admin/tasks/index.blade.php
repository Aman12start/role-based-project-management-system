@extends('layouts.app')

@section('title','Manage Tasks')

@section('content')

<h4>All Tasks</h4>

<!-- adding task form  -->

<form action="{{ route('admin.tasks.store') }}" method="POST"  class="card p-3 mb-4">
    @csrf
    <label>Task Title</label>
    <input type="text" name="title" class="form-control mb-2" placeholder="Task Title">
     <label>Description</label>
    <textarea name="description" class="form-control mb-2" placeholder="Description"></textarea>
     <label>Deadline</label>
    <input type="date" name="deadline" class="form-control mb-2" onclick="this.showPicker()">
   
    <label>User ID</label>
   <select name="user_id" class="form-control mb-2" required>
    <option value="">-- Select User --</option>

    @foreach($users as $user)
        <option value="{{ $user->id }}">
            {{ $user->email }} (ID: {{ $user->id }})
        </option>
    @endforeach
</select>


    <button class="btn btn-primary">Add Task</button>

</form >
<table class="table table-bordered bg-white">
<thead class="table-dark">
    <tr>
       <th>User ID</th>
        <th>User</th>
        <th>Task</th>
        <th>Status</th>
        <th>Deadline</th>
        <th>Action</th>  
    </tr>
</thead>

<tbody>
    @foreach ($tasks as $task)
    <tr>
        <td>{{ $task->user_id }}</td>
        <td>{{ $task->user->name }}</td>
        <td>{{ $task->title }}</td>
        <td>{{ $task->status }}</td>
        <td>{{ $task->deadline }}</td>
        <td>
            <a href="{{ route('admin.tasks.edit', $task->id) }}"
               class="btn btn-sm btn-warning">
                Edit
            </a>
        </td>
    </tr>
    
    @endforeach
</tbody>

</table>

@endsection