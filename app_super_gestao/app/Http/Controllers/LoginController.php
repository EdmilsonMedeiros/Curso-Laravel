<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class LoginController extends Controller
{
    public function index(Request $request)
    {
        $erro = $request->get('erro');
        if($erro == 1){
            $erro = "Usuário ou senha não existe";
        }
        if($erro == 2){
            $erro = "Necessário realizar login para ter acesso a página";
        }


        return view('site.login', ['titulo' => 'Login', 'erro' => $erro]);
    }
    public function autenticar(Request $request)
    {
        //Regras de validação:
        $regras = [
            'usuario' => 'email',
            'senha' => 'required'
        ];
        //feedbacks de validação:
        $feedback = [
            'usuario.email' => 'O campo usuário(e-mail) é obrigatório',
            'usuario.required' => 'O campo senha é obrigatório'
        ];

        $request->validate($regras, $feedback);

        $email = $request->usuario;
        $password = $request->senha;
        // echo "Email: $email - Senha: $password";
        $user = new \App\Models\User();

        $usuario = $user->where('email', $email)->where('password', $password)->get()->first();
        
        if(isset($usuario->name)){
            session_start();
            $_SESSION['nome'] = $usuario->name;
            $_SESSION['email'] = $usuario->email;

            return redirect()->route('app.cliente');
        }else{
            return redirect()->route('site.login', ['erro'=>1]);
        }

    }
    public function sair()
    {
        session_destroy();
        return redirect()->route('site.index');
    }
}
