<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Support\Str;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Password;
use Illuminate\Auth\Events\PasswordReset;

class AuthController extends Controller
{
     function viewLogin()
     {
          return view('auth.login');
     }

     function login(Request $request)
     {
          $data = $request->validate([
               'email' => 'required|email:dns',
               'password' => 'required'
          ]);

          if (Auth::attempt($data)) {
               $request->session()->regenerate();
               return redirect()->intended(route('dashboard', ['user' => Auth::user()->username]));
          } else {
               return redirect()->back()->with('status', 'Your Password or Email is Invalid?');
          }
     }

     function viewRegister()
     {
          return view('auth.register');
     }

     function register(Request $request)
     {
          $user = new User();
          $user->username = $request->username;
          $user->email = $request->email;
          $user->password = bcrypt($request->password);
          $user->save();
          return redirect()->route('login');
     }

     function logout(Request $request)
     {
          Auth::logout();
          $request->session()->invalidate();
          $request->session()->regenerate();
          return redirect()->route('login');
     }

     function viewForgotPassword()
     {
          return view('auth.forgot-password');
     }

     function forgotPassword(Request $request)
     {
          $request->validate(['email' => 'required|email']);
          $status = Password::sendResetLink(
               $request->only('email')
          );
          return $status === Password::ResetLinkSent
               ? back()->with(['status' => __($status)])
               : back()->withErrors(['email' => __($status)]);
     }

     function viewResetPassword(string $token)
     {
          return view('auth.reset-password', ['token' => $token]);
     }

     function resetPassword(Request $request)
     {
          $request->validate([
               'token' => 'required',
               'email' => 'required|email',
               'password' => 'required|min:8|confirmed',
          ]);
          $status = Password::reset(
               $request->only('email', 'password', 'password_confirmation', 'token'),
               function (User $user, string $password) {
                    $user->forceFill([
                         'password' => bcrypt($password)
                    ])->setRememberToken(Str::random(60));
                    $user->save();
                    event(new PasswordReset($user));
               }
          );
          return $status === Password::PasswordReset
               ? redirect()->route('login')->with('status', __($status))
               : back()->withErrors(['email' => [__($status)]]);
     }
}
