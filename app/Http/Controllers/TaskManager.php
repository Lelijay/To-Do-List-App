<?php

namespace App\Http\Controllers;

use App\Models\Tasks;
use Illuminate\Http\Request;
use Illuminate\Container\Attributes\Auth;

class TaskManager extends Controller
{
    public function addTask()
    {
        return view('tasks.add');
    }

    public function addTaskPost(Request $request)
    {
        $request->validate([
            'title' => 'required',
            'deadline' => 'required',
            'description' => 'required',
        ]);
        $task = new Tasks;
        $task->user_id = auth()->user()->id;
        $task->title = $request->title;
        $task->deadline = $request->deadline;
        $task->description = $request->description;

        if ($task->save()) {
            return redirect(route('home'))->with('success', 'Task added successfully');
        }

        return redirect(route('add.task'))->with('error', 'Task  not Added!');
    }

    public function editTask($id)
    {
        $task = Tasks::find($id);
        return view('tasks.edit', compact('task'));
    }
    public function update(Request $request, $id)
    {
        $task = Tasks::find($id);

        if (!$task) {
            return redirect()->route('home')->with('error', 'Task not found.');
        }
        $task->title = $request->title;
        $task->deadline = $request->deadline;
        $task->description = $request->description;
        $task->save();

        return redirect()->route('home')->with('success', 'Task Edited Succesfully');
    }

    public function listTask()
    {
        $tasks = Tasks::where('user_id', auth()->user()->id)->whereNull('status')->paginate(3);

        return view('welcome', compact('tasks'));
    }

    public function updateTaskStatus($id)
    {
        // $task = Tasks::find($id);

        // if ($task) {
        // $task->status = 'completed';
        // $task->save();
        if (Tasks::where('user_id', auth()->user()->id)->where('id', $id)->update(['status' => 'Completed'])) {
            return redirect()->route('home')->with('success', 'Task marked as complete.');
        }

        return redirect()->route('home')->with('error', 'Task update failed.');
    }

    public function deleteTask($id)
    {
        // $task = Tasks::find($id);

        // if ($task) {
        // $task->status = 'completed';
        // $task->save();
        if (Tasks::where('user_id', auth()->user()->id)->where('id', $id)->delete()) {
            return redirect()->route('home')->with('success', 'Task deleted.');
        }

        return redirect()->route('home')->with('error', 'Error while deleting, please try again');
    }
}
