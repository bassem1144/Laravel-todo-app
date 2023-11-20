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


    public function checkApi()
    {
        $accessKey = 'd66cea88907bfc89cb9d6cff3f3689c5';
        $email = 'support@gil.com';

        $response = Http::get('http://apilayer.net/api/check', [
            'access_key' => $accessKey,
            'email' => $email,
        ]);

        $result = $response->json();

        dd($result);
    }

}
