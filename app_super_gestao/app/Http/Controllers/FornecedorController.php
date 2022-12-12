<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class FornecedorController extends Controller
{
    public function index()
    {

        return view('app.fornecedor.index');
    }

    public function listar(Request $request)
    {
        
        $fornecedores = \App\Models\Fornecedor::where('nome', 'like', '%'.$request->nome.'%')
        ->where('site', 'like', '%'.$request->site.'%')
        ->where('uf', 'like', '%'.$request->uf.'%')
        ->where('email', 'like', '%'.$request->email.'%')->simplePaginate(2);
        $request = $request->all();
        return view('app.fornecedor.listar', compact('fornecedores', 'request'));
    }
    public function adicionar(Request $request)
    {
        $msg = '';
        if($request->_token != '' && $request->id == ''){//edição
//VALIDAÇÃO
            $regras = [
                'nome'  => 'required|min:3|max:40',
                'site'  => 'required',
                'uf'    => 'required|min:2|max:2',
                'email' => 'email'
            ];
            $feedback = [
                'required' => 'O campo :attribute deve ser preenchido',
                'nome.min' => 'O campo nome deve ter no minimo 3 caracteres',
                'nome.max' => 'O campo nome deve ter no máximo 40 caracteres',
                'email.email' => 'Insira um e-mail válido',
                'uf.min' => 'O campo nome deve ter no minimo 2 caracteres',
                'uf.max' => 'O campo nome deve ter no máximo 2 caracteres'
            ];
            $request->validate($regras, $feedback);
            $fornecedor = new \App\Models\Fornecedor();
            $fornecedor->create($request->all());

            $msg = 'Cadastro realizado com sucesso';
        }else if($request->_token != '' && $request->id != ''){//inclusão
            $fornecedor = \App\Models\Fornecedor::find($request->id);
            $update = $fornecedor->update($request->all());
            if($update){
                $msg = "Atualização realizada com sucesso";
            }else{
                $msg = "Erro na atualização";
            }
            $id = $request->id;
            return redirect()->route('app.fornecedor.editar', compact('msg', 'id'));
        }
        return view('app.fornecedor.adicionar', compact('msg'));
    }
    public function editar($id, $msg = '')
    {
        $fornecedor = \App\Models\Fornecedor::find($id);
        return view('app.fornecedor.adicionar', ['fornecedor' => $fornecedor, 'msg' => $msg]);
    }
    public function excluir($id)
    {
        \App\Models\Fornecedor::find($id)->delete();
        return redirect()->route('app.fornecedor');
    }
}
