<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Validation\Rule;

class AuthController extends Controller
{
    public function create()
    {
        return view('auth.register');
    }

    public function store()
    {
        // validation
        $formData = request()->validate([
            'name' => ['required', 'max:255', 'min:3'],
            'email' => ['required', 'email', Rule::unique('users', 'email')],
            'username' => ['required', 'max:255', 'min:3', Rule::unique('users', 'username')],
            'password' => ['required', 'min:8']
        ]);

        $user = User::create($formData);

        //login
        Auth::login($user);

        return redirect('/')->with('success', 'Welcome Dear, ' . $user->name);
    }

    public function login()
    {
        return view('auth.login');
        // @dd("hit");
    }

    public function post_login()
    {
        //validation
        $formData = request()->validate([
            'email' => ['required', 'email', 'max:255', Rule::exists('users', 'email')],
            'password' => ['required', 'min:8', 'max:255']
        ], [
            'email.required' => 'We need your email address.',
            'password.min' => 'Password should be more than 8 characters.',
        ]);

        if (Auth::attempt($formData)) {
            return redirect('/')->with('success', 'Welcome Back!');
        } else {
            return redirect()->back()->withErrors([
                'email' => 'Wrong email',
                'password' => 'Wrong password'
            ]);
        }
    }


    public function logout()
    {
        Auth::logout();
        return redirect('/')->with('success', 'Goodbye!');
    }

    // public function adminIndex()
    // {
    //     return view('admin.dashboard');  // Make sure the view exists
    // }
}
