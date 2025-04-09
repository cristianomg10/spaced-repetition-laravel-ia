<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\User;

class AuthController extends Controller
{
    function login(){
        return view('auth.login');
    }

    function register(){
        return view('auth.register');
    }

    function logout(){
        Auth::logout();

        session()->invalidate();
        session()->regenerateToken();

        return redirect(route('dashboard'));
    }

    function tryLogin(Request $req){
        $credenciais = $req->only('email', 'password');

        if (Auth::attempt($credenciais)){
            $req->session()->regenerate();
            return redirect(route('dashboard'));
        }

        return back()->withErrors(['email' => 'Credenciais inválidas']);
    }

    function saveRegister(Request $req){
        $validated = $req->validate([
            'name' => 'required|max:200',
            'email' => 'unique:App\Models\User,email,confirmed:email_repetition',
            'password' => 'required'
        ], [
            'name.required' => "Você precisa digitar um nome",
            'email.required' => "Você precisa digitar um email",
            'email.confirmed' => "Sua confirmação de email está incorreta",
            'password.required' => "Você precisa digitar uma senha",
        ]);
        $credenciais = $req->only('email', 'password');

        $user = new User();
        $user->email = $req->email;
        $user->name = $req->name;
        $user->password = $req->password;
        $user->save();

        session()->flash('mensagem', "Usuário {$user->email} criado com sucesso");
        return redirect('login');
    }
}
