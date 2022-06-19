<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\PrincipalController;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\ClienteController;
use App\Http\Controllers\ProdutoController;
use App\Http\Controllers\FornecedorController;
use App\Http\Middleware\LogAcessoMiddleware;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', [PrincipalController::class, 'principal'])->name('site.index');
    
Route::get('/sobre-nos', [App\Http\Controllers\SobreNosController::class, 'sobreNos'])->name('site.sobrenos');
Route::get('/contato', [App\Http\Controllers\ContatoController::class, 'contato'])->name('site.contato');
Route::post('/contato', [App\Http\Controllers\ContatoController::class, 'salvar'])->name('site.contato');
Route::get('/login/{erro?}', [LoginController::class, 'index'])->name('site.login');
Route::post('/login', [LoginController::class, 'autenticar'])->name('site.login');

Route::middleware('autenticacao:padrao, visitante')->prefix('/app')->group(function() {
    Route::get('/home', [HomeController::class, 'index'])->name('app.home');
    Route::get('/cliente', [ClienteController::class, 'index'])->name('app.cliente');

    Route::prefix('/fornecedor')->group(function() {
        Route::get('',[FornecedorController::class, 'index'])->name('app.fornecedor');
        Route::post('/listar',[FornecedorController::class, 'listar'])->name('app.fornecedor.listar');
        Route::get('/adicionar',[FornecedorController::class, 'adicionar'])->name('app.fornecedor.adicionar');
        Route::post('/adicionar',[FornecedorController::class, 'adicionar'])->name('app.fornecedor.adicionar');

    });


    Route::get('/produto', [ProdutoController::class, 'index'])->name('app.produto');
    Route::get('/sair', [LoginController::class, 'sair'])->name('app.sair');
});

Route::fallback(function() {
    echo 'Página não encontrada. <a href="'.route('site.index').'">Clique aqui</a> para ir para a página inicial.';
});

Route::get('/teste/{p1}/{p2}', [App\Http\Controllers\TesteController::class, 'teste']);

//Route::get($uri, $callback);
/*
verbo http:

get
post
put
patch
delete
options
*/