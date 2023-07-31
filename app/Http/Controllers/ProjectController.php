<?php

namespace App\Http\Controllers;

use App\Models\Project;
use Illuminate\Http\Request;

class ProjectController extends Controller
{
    public function create(Request $request)
    {
        Project::create([
            'project_name' => $request->input('project_name'),
        ]);

        $project = Project::all();

        echo $project;

    }
}
