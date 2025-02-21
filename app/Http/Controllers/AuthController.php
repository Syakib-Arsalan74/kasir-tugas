<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class AuthController extends Controller
{
   function viewLogin (){
        return view('login');
   }

   function login (Request $request){
        $data = $request->validate([
            'email' => 'required|email:dns',
            'password' => 'required'
        ]);

        if(Auth::attempt($data)){
            $request->session()->regenerate();
            return redirect()->intended(route('dashboard', ['user' => Auth::user()->username]));
        } else {
            return redirect()->back()->with('wrong', 'Your Password or Email is Invalid?');
        }
   }

   function viewRegister (){
        return view('register');
   }

   function register (Request $request){

   }

   function logout (Request $request){
        Auth::logout();
        $request->session()->invalidate();
        $request->session()->regenerate();
        return redirect()->route('login');
   }
}
