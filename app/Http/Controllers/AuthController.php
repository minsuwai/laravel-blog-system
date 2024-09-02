<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;

class AuthController extends Controller
{
    public function create()
    {
        return view('register.create');
    }

    public function store()
    {
        // validation
        $formData = request()->validate([
            'name' => ['required', 'max:255', 'min:3'],
            'email' => ['required', 'email'],
            'username' => ['required', 'max:255', 'min:3'],
            'password' => ['required', 'min:8']
        ]);

        User::create($formData);
        return redirect('/');
    }
}
