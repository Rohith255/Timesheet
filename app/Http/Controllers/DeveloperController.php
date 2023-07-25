<?php

namespace App\Http\Controllers;

use App\Http\Requests\Auth\LoginRequest;
use App\Http\Requests\DeveloperRequest;
use App\Models\Developer;
use App\Models\Module;
use App\Models\Project;
use App\Models\Task;
use App\Providers\RouteServiceProvider;
use Illuminate\Support\Facades\Cookie;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Redirect;

class DeveloperController extends Controller
{
    public function login(Request $request)
    {
        $dev_email = Cookie::get('dev_email');
        $dev_password = Cookie::get('dev_password');

        $oAuth_email = Cookie::get('oAuth_email');
        $oAuth_password = Cookie::get('oAuth_password');

        if (!empty($dev_email) && !empty($dev_password) && Auth::guard('dev')->attempt(['email'=>$dev_email,'password'=>$dev_password])){
            return redirect()->route('developer.timesheet');
        }
        else{
            return view('timesheet.login');
        }
    }

    public function store(LoginRequest $request)
    {

        if ($request->validated()) {

            if (Auth::guard('dev')->attempt($request->only(['email', 'password']))) {

                $request->session()->regenerate();

                Cookie::queue('dev_email', $request->email, 60*24*15);
                Cookie::queue('dev_password', $request->password, 60*24*15);

                return redirect()->route('developer.timesheet')->with('welcome','Welcome back,');
            }
            else{
                return redirect()->route('developer.login')->with('error', 'Invalid Credentials');
            }

        }
    }

    public function logout()
    {
        if (Auth::guard('dev')->check()){

            Auth::logout();

            Cookie::queue(Cookie::forget('dev_email'));
            Cookie::queue(Cookie::forget('dev_password'));

            return redirect()->route('developer.login')->with('logout','Logged Out');
        }
        else{
            return redirect()->back();
        }
    }
    public function register()
    {
        if (Auth::guard('dev')->check()){
            return redirect()->back();
        }
        else{
            return view('timesheet.register');
        }
    }

    public function devStore(DeveloperRequest $developerRequest)
    {

        Developer::create([
            'name'=>$developerRequest->input('name'),
            'email'=>$developerRequest->input('email'),
            'role'=>$developerRequest->input('role'),
            'mobile'=>$developerRequest->input('mobile'),
            'location'=>$developerRequest->input('location'),
            'password'=>Hash::make($developerRequest->input('password'))
        ]);

        return redirect()->route('developer.login')->with('Created','Account Created Successfully !');

    }

    public function timesheet()
    {
        $project = Project::all();

        $developer = Auth::guard('dev')->user();

        $timesheet_entries = $developer->timesheetEntries()->orderBy('date','asc')->with('task.module.project')->get();


        return view('timesheet.home',['project'=>$project,'timesheet_entries'=>$timesheet_entries]);
    }

    public function profile()
    {

        $developer = Developer::find(Auth::guard('dev')->id());

        return view('timesheet.profile',compact('developer'));
    }

    public function profileUpdate(Request $request)
    {
        $request->validate([
            'name'=>'required',
            'email'=>['email','required'],
            'mobile'=>['required','integer'],
            'location'=>['required','string'],
        ]);

        $dev = Developer::find(Auth::guard('dev')->id());

        $dev->update([
            'name'=>$request->input('name'),
            'email' => $request->input('email'),
            'mobile' => $request->input('mobile'),
            'location' => $request->input('location')
        ]);

        if ($request->input('password'))
        {
           $dev->update([
               'password' => Hash::make($request->input('password'))
           ]);
        }

        return redirect()->route('developer.profile')->with('updated','Profile has been Updated Successfully');
    }

    public function profileDelete(Request $request)
    {
        $request->validateWithBag('userDeletion', [
            'password' => ['required', 'current_password'],
        ],
        [
            'password.current_password'=>'Invalid Password'
        ]);

        $user = $request->user();

        Auth::guard('dev')->logout();

        $user->delete();

        $request->session()->invalidate();
        $request->session()->regenerateToken();


        return \redirect()->route('developer.register');
    }

    public function chooseProject(Request $request)
    {
        $module = Module::where('project_id',$request->input('id'))->get();

        echo $module;
    }

    public function chooseModule(Request $request)
    {
        $task = Task::where('module_id',$request->input('module_id'))->get();

        echo $task;
    }
}
