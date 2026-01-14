@extends('layouts.app')

@section('title','My Tasks')

@section('content')

<h4>My Tasks</h4>

<table class="table table-striped bg-white">
    <thead class="table-dark">
        <tr>
            <th>Task</th>
            <th>Status</th>
            <th>Action</th>
        </tr>
    </thead>

    <tbody>
        @foreach ($tasks as $task)
        <tr>
            <td>{{ $task->title }}</td>
            <td>{{ $task->status }}</td>
            <td>
                @if ($task->status === 'pending')
                <form method="POST" action="{{ route('user.tasks.complete',$task) }}">
                    @csrf
                    <button type="submit" class="btn btn-success btn-sm">Mark Complete</button>
                </form>
                @else
                <span class="badge bg-success">Completed</span>
                @endif
            </td>
        </tr>
        
        @endforeach
    </tbody>
</table>


@endsection