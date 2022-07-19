<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class SiteContato extends Model
{
    use HasFactory;
    //Definição das registros que podem ser populadas na base de dados
    protected $fillable = [
        'nome', 
        'telefone', 
        'email', 
        'motivo_contato', 
        'mensagem'
    ];

}
