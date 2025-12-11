<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class AdminAuthController extends Controller
{
    public function showLoginForm(){
        return view('admin.login');
    }
    public function login(Request $request){
        $credentials = $request->only('email', 'password');

        if(Auth::attempt(array_merge($credentials, ['role' => 'admin']))) {
            return redirect()->route('admin.dashboard');
        }
        return back()->withErrors(['email' => 'Invalid credentials or not admin']);
    }
    public function logout(){
        Auth::logout();
        return redirect('/');
    }
}
