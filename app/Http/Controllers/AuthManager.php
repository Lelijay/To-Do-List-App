<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class AuthManager extends Controller
{
    public function login()
    {
        return view('auth.login');
    }

    public function loginPost(Request $request)
    {
        $request->validate([
            'email' => 'required|email',
            'password' => 'required|min:5|max:12',
        ]);
        $credentials = $request->only('email', 'password');
        if (Auth::attempt($credentials)) {
            return redirect()->intended(route('home'));
        } else {
            return redirect(route('login'))->with('error', 'Invalid Email or Password');
        }
    }

    public function register()
    {
        return view('auth.register');
    }

    public function registerPost(Request $request)
    {
        $request->validate([
            'fullname' => 'required',
            'email' => 'required|email|unique:users',
            'password' => 'required|min:5',
        ]);
        $user = new User;
        $user->name = $request->fullname;
        $user->email = $request->email;
        $user->password = Hash::make($request->password);

        if ($user->save()) {
            return redirect(route('login'))->with('success', 'You have Succesfully Registered!');
        } else {
            return redirect(route('reg-user'))->with('error', 'Registration Failed');
        }
    }
    public function logout()
    {
        Auth::logout();
        return redirect(route('login'));
    }
}
