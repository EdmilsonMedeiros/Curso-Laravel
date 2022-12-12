<?php

namespace App\Http\Controllers;

use App\Models\Produto;
use Illuminate\Http\Request;

class ProdutoController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $produtos = \App\Models\Produto::paginate(10);
        
        return view('app.produto.index', compact('produtos', 'request'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $unidades = \App\Models\Unidade::all();
        return view('app.produto.create', compact('unidades'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $regras =[
            'nome' => 'required|min:3|max:40',
            'peso' => 'required|integer',
            'descricao' => 'required|min:3|max:200',
            'unidade_id' => 'exists:unidades,id'
        ];
        $feedbacks =[
            'required' => 'O campo :attribute deve ser preenchido',
            'nome.min' => 'A quantidade minima de caracteres para este campo é 3',
            'nome.max' => 'A quantidade máxima de caracteres para este campo é 40',
            'descricao.min' => 'A quantidade minima de caracteres para este campo é 3',
            'descricao.max' => 'A quantidade máxima de caracteres para este campo é 200',
            'peso.integer' => 'Este campo precisa se um número inteiro',
            'unidade_id.exists' => 'A unidade não existe'
        ];
        $request->validate($regras, $feedbacks);
        \App\Models\Produto::create($request->all());
        return redirect()->route('produto.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Produto  $produto
     * @return \Illuminate\Http\Response
     */
    public function show(Produto $produto)
    {
        
        return view('app.produto.show', compact('produto'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Produto  $produto
     * @return \Illuminate\Http\Response
     */
    public function edit(Produto $produto)
    {
        $unidades = \App\Models\Unidade::all();
        return view('app.produto.edit', compact('produto', 'unidades'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Produto  $produto
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Produto $produto)
    {
        $produto->update($request->all());
        return redirect()->route('produto.show', $produto->id);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Produto  $produto
     * @return \Illuminate\Http\Response
     */
    public function destroy(Produto $produto)
    {
        $produto->delete();
        return redirect()->route('produto.index');
    }
}
