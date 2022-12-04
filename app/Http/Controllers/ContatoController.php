<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use \App\Models\SiteContato;
use \App\Models\MotivoContato;

class ContatoController extends Controller
{
    public function contato(Request $request)
    {


        $motivo_contato = MotivoContato::all();
        return view('site.contato', compact('motivo_contato'));
    }
    public function salvar(Request $request)
    {
        //validação dos dados do formulário:
        $regras = [
            'nome' => 'required|min:3|max:40',
            'telefone' => 'required',
            'email' => 'email',
            'motivo_contatos_id' => 'required',
            'mensagem' => 'required|max:2000'
        ];
        $feedbacks = [
            'nome.min' => 'O campo nome precisa ter pelo menos 3 caracteres',
            'nome.max' => 'O campo nome precisa menos de 40 caracteres',
            'mensagem.max' => 'Limite máximo de caracteres: 2000',
            'email.eamil' => 'O e-mail informado não é válido',
            
            'required' => 'O campo :attribute precisa ser preenchido'
        ];
        $request->validate($regras, $feedbacks);
        SiteContato::create($request->all());
        return redirect()->route('site.index');
    }
}
