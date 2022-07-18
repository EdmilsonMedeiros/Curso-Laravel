<?php

namespace App\Http\Controllers;
//Teste de branch_de_teste
use Illuminate\Http\Request;

class ContatoController extends Controller
{
    public function contato() {
        var_dump($_POST);
        return view('site.contato', ['titulo'=>'Contato (teste)']);
    }
}
