<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class AuthController extends Controller
{
    function login(){
        return view('auth.login');
    }

    function tryLogin(Request $req){
        $credenciais = $req->only('usuario', 'senha');

        if (Auth::attempt($credenciais)){
            $req->session()->regenerate();
            return redirect('dashboard');
        }

        return back()->withErrors(['usuario' => 'Credenciais inválidas'])->onlyInput('usuario');
    }
}
