<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;

class AuthController extends Controller
{
    //Login
    public function login(Request $request)
    {
        $credentials = $request->only('email', 'password');
        if (auth()->attempt($credentials)) {
            return redirect()->route('dashboard');
        }
        return redirect()->back()->withErrors(['Invalid credentials']);
    }

    //Register
    public function register(Request $request)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|string|email|max:255|unique:users',
            'password' => [
                'required',
                'string',
                'min:5',
                'regex:/[A-Z]/',
                'regex:/[0-9]/',
            ],
        ]);
        $password = bcrypt($request->input('password'));

        $user = User::create([
            'name' => $request->input('name'),
            'email' => $request->input('email'),
            'password' => $password,
        ]);

        session()->flash('message', 'Account created successfully!');

        return redirect()->route('showLogin');
    }

    //Logout
    public function logout()
    {
        auth()->logout();

        session()->flash('message', 'Logged out successfully!');

        return redirect()->route('showLogin');
    }

}
