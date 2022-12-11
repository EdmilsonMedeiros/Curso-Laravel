<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\PrincipalController;
use App\Http\Controllers\SobreNosController;
use App\Http\Controllers\ContatoController;
use App\Http\Controllers\TesteController;
use App\Http\Controllers\FornecedorController;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\ClienteController;
use App\Http\Controllers\ProdutoController;
use App\Http\Middlewares\LogAcessoMiddleware;


Route::get('/', [PrincipalController::class, 'principal'])->name('site.index');
Route::get('/sobre-nos', [SobreNosController::class, 'sobrenos'])->name('site.sobre-nos');
Route::get('/contato', [ContatoController::class, 'contato'])->name('site.contato');

Route::post('/contato', [ContatoController::class, 'salvar'])->name('site.contato');
Route::get('/login/{erro?}', [LoginController::class, 'index'])->name('site.login');
Route::post('/login', [LoginController::class, 'autenticar'])->name('site.login');

Route::middleware('autenticacao:padrao,visitante')->prefix('/app')->group(function(){
    Route::get('/sair', [LoginController::class, 'sair'])->name('app.sair');
    Route::get('/home', [HomeController::class, 'index'])->name('app.home');
    Route::get('/fornecedor', [FornecedorController::class, 'index'])->name('app.fornecedor');
    Route::get('/cliente', [ClienteController::class, 'index'])->name('app.cliente');
    Route::get('/produto', [ProdutoController::class, 'index'])->name('app.produto');
});


Route::fallback(function(){
    return "A rota acessada não existe, <a href='". route('site.index') . "'>clique aqui</a> para ir para a página inicial";
});

// Route::get('/rota1', function(){
//     echo "Rota1";
// })->name('site.rota1');
// Route::redirect('/rota2', '/rota1');
// Route::get('/rota2', function(){
//     return redirect()->route('site.rota1');
// })->name('site.rota2');

//Rotas com parâmetros:
// Route::get('/contato/{nome}/{categoria_id}', function(string $nome = 'Desconhecido', int $categoria = 1){
//     echo "Estamos aqui: " . $nome . ' - ' . $categoria;
// })->where('categoria_id', '[0-9]+')->where('nome', '[A-Za-z]+');