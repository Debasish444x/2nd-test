<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Crud_model;
use App\Models\User;
class Crud_controller extends Controller
{
    function reg()
    {
        return view('pages.reg');
    }
    function store(Request $request)
    {
        $request->validate([
            'name'=>'required|max:20',
            'email'=>'required|email',
            'file'=>'required|mimes:jpeg,png|max:200',
            'pass'=>'required|confirmed'
        ]);
        $request->file('file')->store('media');
    }
    function session_set(Request $r)
    {
        $r->session()->put('name','Debasish');

    }
    function session_get(Request $r)
    {
        if(session()->has('name'))
        {
            echo  $r->session()->get('name');
        }else{
            echo "No session is set yet";
        }
    }
    function session_remove(Request $r)
    {
        $r->session()->forget('name');
    }
    function login()
    {
        return view('pages.login');
    }
    function login_check(Request $request)
    {
        $request->validate([
            'user_name'=>'required',
            'password'=>'required'
        ]);
        // $email=$request->input('email'); or
        $email=$request->user_name;
        // $pass=$request->pass;

        if(!auth()->attempt($request -> only('user_name','password')))
        {
          $request->session()->flash('error','invalid login degtails');
           return redirect('login');
        }else
        {
            $request->session()->put('email',$email);
            return redirect('about');
        }

        //return redirect('/dashboard');


        // return redirect()->route('about');
        // if ($email=='ghoshdebasish1998@gmail.com' && $pass=='pass') {
        //     $request->session()->put('email',$email);
        //     return redirect('about');

        // }
        // else {
        //     $request->session()->flash('error','invalid login degtails');
        //     return redirect('login');
        //     // return back()->with('status','Invalid login details');
        // }
    }
    function logout(Request $request)
    {
        $request->session()->forget('email');
        return redirect('login');
    }
    function about(Request $request){
        // if (session()->has('email')) {
        //     return view('pages.about');
        // }else{
        //     $request->session()->flash('error','you have to login first');
        //     return redirect('login');
        // }
        return view('pages.about');
    }
}
