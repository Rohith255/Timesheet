<?php

namespace App\Http\Controllers;

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
        \Auth::guard('admin')->logout();

        return view('admin.login');
    }

    public function home()
    {
        return view('admin.dashboard');
    }
}
