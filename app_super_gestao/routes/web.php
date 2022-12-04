<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\PrincipalController;
use App\Http\Controllers\SobreNosController;
use App\Http\Controllers\ContatoController;
use App\Http\Controllers\TesteController;
use App\Http\Controllers\FornecedorController;
use App\Http\Middlewares\LogAcessoMiddleware;


Route::get('/', [PrincipalController::class, 'principal'])->name('site.index');
Route::get('/sobre-nos', [SobreNosController::class, 'sobrenos'])->name('site.sobre-nos');

Route::get('/contato', [ContatoController::class, 'contato'])->name('site.contato');
//->middleware(LogAcessoMiddleware::class);
Route::post('/contato', [ContatoController::class, 'salvar'])->name('site.contato');

Route::middleware('autenticacao:padrao,visitante')->prefix('/app')->group(function(){
    Route::get('/login', function(){return 'Login';})->name('app.login');
    Route::get('/fornecedores', [FornecedorController::class, 'index'])->name('app.fornecedores');
    Route::get('/clientes', function(){return 'Clientes';})->name('app.clientes');
    Route::get('/produtos', function(){return 'Produtos';})->name('app.produtos');
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