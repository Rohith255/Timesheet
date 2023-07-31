<?php

namespace App\Http\Controllers;

use App\Models\Task;
use Illuminate\Http\Request;

class TaskController extends Controller
{
    public function createTask(Request $request)
    {
        Task::create([
            'task' => $request->input('task_name'),
            'module_id' => $request->input('module_id'),
            'time' => 0,
        ]);

        echo 'Task created successfully';
    }
}
