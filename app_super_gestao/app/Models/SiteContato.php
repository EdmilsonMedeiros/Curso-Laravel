<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use \App\Http\Controllers;

class SiteContato extends Model
{
    use HasFactory;

    protected $table = 'site_contatos';
    protected $fillable = [
        'nome',
        'email',
        'telefone',
        'motivo_contatos_id',
        'mensagem'
    ];
}
