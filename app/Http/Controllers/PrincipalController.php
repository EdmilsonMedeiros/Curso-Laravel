<?php

namespace App\Http\Controllers;
use Illuminate\Http\Request;
use App\Models\Fornecedor;
use \App\Models\MotivoContato;
use Illuminate\Support\Facades\DB;


class PrincipalController extends Controller
{
    public function principal()
    {
        $fornecedores = Fornecedor::get()->toJson();
        $motivo_contato = MotivoContato::all();

        return view('site.principal', compact('fornecedores', 'motivo_contato'));
    }
}
