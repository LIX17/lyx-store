<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class RegisterController extends Controller
{
    public function success()
    {
        return view('auth.success');
    }
    public function register()
    {
        return view('auth.register');
    }
}
