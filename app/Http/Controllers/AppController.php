<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Task;
use Illuminate\Support\Facades\DB;

class AppController extends Controller
{
    public function addTask(Request $req) {

        // Validate
        $validatedTask = $req->validate([
            'task' => ['required'],
        ]);

        // Add task
        Task::create($validatedTask);
        return back()->with('success', 'Task added successfully.');
    }

    public function displayTask(Request $req) {

        // Select all tasks from table 
        $taskList = DB::select("select * from tasks");

        // Pass the $taskList to index file
        return view('welcome', ['taskList' => $taskList]);
    } 

    public function removeTask($taskId) {
        $task = Task::find($taskId);
        $task->delete();
        return back()->with('delete', 'Task deleted successfully.');;
    }

    public function editTask($taskId) {
        $task = Task::find($taskId);
        return view('components.edit', ['task' => $task]);
    }

    public function updateTask(Request $req, $taskId) {
         // Validate
         $validatedTask = $req->validate([
            'task' => ['required'],
        ]);
        
        // Get the task and update it with new task
        $task = Task::find($taskId);
        $task->task = $validatedTask['task'];
        $task->save();

        return redirect()->route('displayTask')->with('message', 'Task edited successfully.');
    }

    
}
