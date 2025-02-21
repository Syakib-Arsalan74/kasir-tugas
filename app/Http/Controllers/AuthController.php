<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class AuthController extends Controller
{
   function viewLogin (){
        return view('auth.login');
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
        return view('auth.register');
   }

   function register (Request $request){
        $user = new User();
        $user->username = $request->username;
        $user->email = $request->email;
        $user->password = bcrypt($request->password);
        $user->save();
        return redirect()->route('login');
   }

   function logout (Request $request){
        Auth::logout();
        $request->session()->invalidate();
        $request->session()->regenerate();
        return redirect()->route('login');
   }
}
