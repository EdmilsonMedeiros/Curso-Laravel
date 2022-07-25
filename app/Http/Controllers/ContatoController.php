<?php

namespace App\Http\Controllers;
use Illuminate\Http\Request;
use App\SiteContato;

class ContatoController extends Controller
{
    public function contato(Request $request) {
        /*
        //echo "<pre>";
        print_r($request->all());
        //echo "</pre>";
        print_r($request->input('nome'));
        echo "</br>";
        */
        //var_dump($_POST);
        /*
        $contato = new SiteContato();
        $contato -> nome = $request->input('nome');
        $contato -> email = $request->input('email');
        $contato -> telefone = $request->input('telefone');
        $contato -> motivo_contato = $request->input('motivo_contato');
        $contato -> mensagem = $request->input('mensagem');
        $contato -> save();
        */
        //print_r($contato->getAttributes());
        //Retorna o array $request e salva através do método fill(*)
        //$contato = new SiteContato();
        //$contato -> fill($request->all());
        //$contato -> save();
        //print_r($contato -> getAttributes());

        // $contato = new SiteContato();
        // $contato -> create($request->all()); //Cria diretamente um objeto

        return view('site.contato', ['titulo'=>'Contato (teste)']);
    }
    public function salvar(Request $request){
        //Validação dos dados do formulário:
        $request -> validate([
            'nome' => 'required',
            'telefone' => 'required',
            'email' => 'required',
            'motivo_contato' => 'required'
        ]);
        //SiteContato::create($request->all());

    }
}
