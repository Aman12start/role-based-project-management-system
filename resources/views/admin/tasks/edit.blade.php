@extends('layouts.app')

@section('title','Edit Task')

@section('content')
<h3>Edit Task Status</h3>

<form action="{{ route('admin.tasks.update', $task->id) }}" method="POST">
    @csrf
    @method('PUT')

    <div class="mb-3">
        <label>Task Title</label>
        <input type="text"
               class="form-control"
               value="{{ $task->title }}"
               disabled>
    </div>

    <div class="mb-3">
        <label>Status</label>
        <select name="status" class="form-control">
            <option value="pending"
                {{ $task->status === 'pending' ? 'selected' : '' }}>
                Pending
            </option>

            <option value="completed"
                {{ $task->status === 'completed' ? 'selected' : '' }}>
                Completed
            </option>
        </select>
    </div>

    <button class="btn btn-success">Update</button>
</form>
@endsection
