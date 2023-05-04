<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class AuthController extends Controller
{
    public function auth(Request $request)
    {

       $request->validate([
        'email' => ['required', 'email'],
        'password' => ['required']
       ],
       [
        'email.required' => 'Informe um email válido',
        'password.required' => 'Informe sua senha'
       ]);

        if(Auth::attempt(['email' => $request->email, 'password' => $request->password]))
        {
            $request->session()->regenerate();

            return redirect()->intended('dashboard');

        } else {
            return redirect()->back()->with('danger', 'Email ou senha inválido!');
        }
    }

    public function logout(Request $request)
    {
        Auth::logout();
        $request->session()->invalidate();
        $request->session()->regenerateToken();

        return redirect()->route('auth.login');
    }


}
