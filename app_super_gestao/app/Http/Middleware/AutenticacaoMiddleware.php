<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;

class AutenticacaoMiddleware
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure(\Illuminate\Http\Request): (\Illuminate\Http\Response|\Illuminate\Http\RedirectResponse)  $next
     * @return \Illuminate\Http\Response|\Illuminate\Http\RedirectResponse
     */
    public function handle(Request $request, Closure $next, $metodo_autenticacao, $perfil)
    {   
        echo $metodo_autenticacao . ' - ' . $perfil . '<br>';

        if($metodo_autenticacao == 'padrao'){
            echo "Verifica no banco de dados." . ' - ' . $perfil . '<br>';
        }

        if($metodo_autenticacao == 'ldap'){
            echo "Verifica no AD." . ' - ' . $perfil . '<br>';
        }

        if ($perfil == 'visitante'){
            echo 'Exibir apenas alguns recursos <br>';
        }else{
            echo 'Carregar o perfíl do banco de dados <br>';
        }

        if(false){
            return $next($request);
        }else{
            return Response('Acesso negado!');
        }
        //return $next($request);
        
        return Response('Acesso negado!');
    }
}
