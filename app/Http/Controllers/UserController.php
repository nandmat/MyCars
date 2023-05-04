<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;

class UserController extends Controller
{
    public function store(Request $request)
    {
            $user = $request->validate([
                'name' => ['required', 'min:3'],
                'last_name' => ['required', 'min:3'],
                'email' => ['required', 'email'],
                'password' => ['required', 'min:6'],

            ],[
                'name' => 'Informe um nome válido',
                'last_name' => 'Informe um sobrenome válido',
                'email' => 'Informe um email válido',
                'password' => 'Senha fora do padrão aceito: Informe uma senha de no mínimo 6 caracteres'
            ]);

            $user['password'] = bcrypt($user['password']);

            if($user = User::create($user))
        {
            $auth = new AuthController();
            return $auth->auth($request);

        } else {
            User::destroy($user['id']);

            return redirect()->back()->with('errors', 'Dados inválidos');
        }

    }
}
