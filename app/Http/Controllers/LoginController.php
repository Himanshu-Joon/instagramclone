<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Foundation\Auth\User;
use Illuminate\Support\Facades\Auth;


class LoginController extends Controller
{
    public function index()
    {
        return view('login');
    }

    public function login(Request $request)
    {
       $this->validate($request, [
           'email'=>'required',
           'password'=>'required'

       ]);
      
       $details = $request->only(['email','password']);
  
    //    dd($details);  

       if(!Auth::attempt($details))
       {
        return back()->with('failed','invalid login details');
       }else
       {
          return  redirect('profile');
       }
       
        

       
    }
}
