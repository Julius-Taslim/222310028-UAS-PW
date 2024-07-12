<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class AuthController extends Controller
{
    public function login(Request $request){
        $credentials = $request->validate([
            "email" => "required||email:dns",
            "password" => "required"
        ]);

        if(Auth::attempt($credentials)){
            $request -> session() -> regenerate();
            $user = Auth::user();
            return redirect() -> route('user.sheet');
        }

        return back()->with('loginError', 'The provided credentials do not match our records.');
    }

    public function logout(Request $request){
        Auth::logout();

        $request->session()->invalidate();
        $request->session()->regenerateToken();

        return redirect()->route('login');
    }

    public function register(Request $request){
        $newUser = $request->validate([
            "name" => "required",
            "email" => "required||email:dns",
            "password" => "required"
        ]);
        $newUser['password'] = Hash::make($newUser['password']);
        User::create($newUser);

        return redirect('/login');
    }
}
