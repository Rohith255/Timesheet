<?php

namespace App\Http\Controllers;

use App\Models\Developer;
use App\Models\Module;
use App\Models\Project;
use App\Models\Task;
use App\Models\TimesheetEntry;
use Illuminate\Http\Request;

class AdminController extends Controller
{
    public function login()
    {

        $admin_email = \Cookie::get('admin_email');
        $admin_password = \Cookie::get('admin_password');

        if($admin_email && $admin_password){
            \Auth::guard('admin')->attempt(['email'=>$admin_email,'password'=>$admin_password]);

            return redirect()->route('admin.home');
        }

        return view('admin.login');
    }

    public function store(Request $request)
    {
        $request->validate([
            'email'=>['required','email'],
            'password'=>'required',
        ]);

        if (\Auth::guard('admin')->attempt(['email'=>$request->input('email'),'password'=>$request->input('password')])){

            \Cookie::queue('admin_email',$request->input('email'),60*24*2);
            \Cookie::queue('admin_password',$request->input('password'),60*24*2);

            return redirect()->route('admin.home');
        }
        else{
            return redirect()->back()->with('error','Invalid credentials');
        }
    }

    public function logout()
    {

        if (\Auth::guard('admin')->check()){

            \Cookie::queue(\Cookie::forget('admin_email'));
            \Cookie::queue(\Cookie::forget('admin_password'));

            \Auth::guard('admin')->logout();

            return view('admin.login');
        }
        else{
            return redirect()->back();
        }
    }

    public function home()
    {
        return view('admin.dashboard');
    }

    public function developers()
    {
        $developers = Developer::all();

        return view('admin.developers',['developers'=>$developers]);
    }

    public function manageDev($id)
    {
        $dev = Developer::findOrFail($id);

        return view('admin.manage_developers',compact('dev'));
    }

    public function updateDev(Request $request,$id)
    {
        $dev = Developer::findOrFail($id);

        $dev->update([
            'name'=>$request->dev_name,
            'email'=>$request->dev_email,
            'mobile'=>$request->dev_mobile,
            'location' => $request->dev_location,
            'role'=>$request->dev_role,
        ]);

        return redirect()->route('admin.developers')->with('updated','Developer Updated successfully');
    }

    public function deleteDev($id)
    {
        $dev = Developer::findOrFail($id);

        $dev->delete();

        return redirect()->route('admin.developers')->with('deleted','Developer deleted Successfully');
    }

    public function options()
    {

        $project = Project::all();

        return view('admin.options',['project'=>$project]);
    }

    public function createProject(Request $request)
    {

        Project::create([
            'project_name' => $request->input('project_name'),
            'developer_id' => 3,
        ]);

        $project = Project::all();

        echo $project;
    }

    public function createModule(Request $request)
    {
        Module::create([
            'module_name' => $request->name,
            'project_id' => $request->id,
        ]);

        echo 'Created';
    }

    public function chooseProject(Request $request)
    {
        $module = Module::where('project_id',$request->id)->get();

        echo $module;
    }

    public function chooseModule(Request $request)
    {
        $task = Task::where('module_id',$request->id)->get();

        echo $task;
    }

    public function timesheetEntries()
    {
        $entries = TimesheetEntry::with('task.module.project')->orderBy('date','DESC')->get();

        return view('admin.timesheet_entry',['entries'=>$entries]);
    }
}
