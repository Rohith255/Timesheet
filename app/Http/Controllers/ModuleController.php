<?php

namespace App\Http\Controllers;

use App\Models\Module;
use Illuminate\Http\Request;

class ModuleController extends Controller
{
    public function createModule(Request $request)
    {
        Module::create([
            'module_name' => $request->input('module_name'),
            'project_id' => $request->input('project_id'),
        ]);

        $modules = Module::where('project_id',$request->project_id)->get();

        echo 'module created',$modules;
    }
}
