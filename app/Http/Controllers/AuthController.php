<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class AuthController extends Controller
{
    //

    public function getLogin(){
      return view('pages.Login.index');
    }

    public function getRegister(){
      return view('pages.Register.index');
    }

    public function register(Request $request){
      // dd($request);

      $request->validate([
          'fullName' => 'required|min:3|max:40',
          'email' => ['required', 'unique:users'],
          'pass' => 'required|min:6|confirmed|max:12',
      ], [
          'fullName.required' => 'Please enter your full name!',
          'email.required' => 'Please enter your email!',
          'email.unique' => 'Email already exists!',
          'pass.required' => 'Please enter your password!',
      ]);

      $remember = $request->has('remember');

      $user = User::create([
          'name' => $request->name,
          'email' => $request->email,
          'password' => Hash::make($request->password),
          'phone' => $request->phone
      ]);

      Auth::login($user);

      return redirect('/inventory')->with('success', 'Registration successful and you are logged in.');
    }

     function login(Request $request){
        $credentials = $request->validate([
            'email' => 'required',
            'pass' => 'required',
        ]);

        if (Auth::attempt($credentials)) {
            $request->session()->regenerate();
            return redirect()->intended('/inventory')->with('success', 'You are logged in successfully.');
        }
        else{
            return redirect()->back()->withErrors(['login_error' => 'Email or password is incorrect.']);
        }
    }

    function logout(){
        Auth::logout();
        request()->session()->invalidate();
        request()->session()->regenerateToken();
        return redirect('/')->with('success', 'You have logged out successfully.'); 
    }
}
