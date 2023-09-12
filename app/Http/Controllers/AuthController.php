<?php

namespace App\Http\Controllers;

use Auth;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Session;

class AuthController extends Controller
{
    public function index() {
        return view('user_auth.login');
    }
    public function userLogin(Request $request) {
        $request->validate([
            'email' => 'required|email',
            'password' => 'required'
        ]);
        if(Auth::attempt($request->only('email','password'))) {
            return redirect()->route('home');
        }
        return redirect()->route('login');
    }


    public function registerView() {
        return view('user_auth.register');
    }
    public function userStore(Request $request) {
        $request->validate([
            'name' => 'required',
            'email' => 'required|unique:users|email',
            'password' => 'required|confirmed'
        ]);
        User::create([
            'name'=> $request->name,
            'email'=> $request->email,
            'password'=> Hash::make($request->password)
        ]);
        if(Auth::attempt($request->only('email','password'))) {
            return redirect()->route('home');
        }
        return redirect()->route('user.register');
    }

    public function home() {
        return view('dashboard');
    }
    public function logout() {
        Session::flush();
        Auth::logout();
        return redirect('/');
    }
}
