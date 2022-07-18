<?php

namespace Database\Seeders;

use Database\Factories\SiteContatoFactory;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use HasFactory;
use Illuminate\Database\Seeder;
use App\SiteContato;

class SiteContatoSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        SiteContato::factory()->count(100)->create();

//        factory(SiteContatoFactory::class, '100')->create();
        /*
        $contato = new SiteContato();
        $contato -> nome = "Sistema SG";
        $contato -> telefone = "(11)9999-8888";
        $contato -> email = "contato@sg.com.br";
        $contato -> motivo_contato = 1;
        $contato -> nome = "Sistema SG";
        $contato -> mensagem = "Bem vindo ao Sistema";
        $contato -> save();
        */
    }
}
