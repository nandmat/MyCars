<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class RoutesAuthController extends Controller
{
    public function register()
    {
        return view('content.auth.register');
    }

    public function pageLogin()
    {
        return view('content.auth.login');
    }

    public function pageDash()
    {
        return view('content.dashboard.dashboard');
    }
}
