<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Task;
use App\Models\User;

//yh controller admin + user dono ka kaam handle krega
class TaskController extends Controller
{
    // admin view all tasks

    public function index(){
        $tasks = Task::with('user')->get();
        return view('admin.tasks.index',compact('tasks'));
    }

    // admin store (asign new task)

    public function store(Request $request){
        $request->validate([
            'title' => 'required',
            'user_id' => 'required|exists:users,id',
            'deadline' => 'required|date',
        ]);

        Task::create([
                'user_id' => $request->user_id,
                'title' => $request->title,
                'description' => $request->description,
                'deadline' => $request->deadline,
                'status' => 'pending',
        ]);

        return back()->with('success', 'Task Assigned Successfully');
    }
    // admin : update task (status change)
    public function update(Request $request, Task $task)
    {
        $request->validate([
            'status' => 'required|in:pending,completed',
        ]);

        $task->update([
            'status' => $request->status,
        ]);

        return redirect()
            ->route('admin.tasks.index')
            ->with('success', 'Task updated successfully');
    }


    // user : view own tasks

    public function userTasks(){
        $tasks = auth()->user()->tasks;
        return view('user.dashboard',compact('tasks'));
    }

    // user : update task status

    public function updateStatus(Task $task){
        // shrif apna task update krna h

        if($task->user_id !== auth()->id()){
            abort(403); 
        }

        $task->update([
            'status' => 'completed' 
        ]);
        return back()->with('success','Task Marked as Completed');

    }

        // admin : edit task (change status)
        public function edit(Task $task)
        {
            return view('admin.tasks.edit', compact('task'));
        }


}
