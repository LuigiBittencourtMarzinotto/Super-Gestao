<?php

use App\Http\Controllers\ClienteController;
use App\Http\Controllers\ContatoController;
use App\Http\Controllers\FornecedoresController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\PedidoController;
use App\Http\Controllers\PedidoProdutoController;
use App\Http\Controllers\PrincipalController;
use App\Http\Controllers\ProdutoController;
use App\Http\Controllers\ProdutoDetalheController;
use App\Http\Controllers\SobreNosController;
use App\Http\Controllers\TesteController;
use Illuminate\Support\Facades\Route;
use Nette\Utils\Strings;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

// qualquer um q entra no nosso site vai bater com essa rota e a view welcome
Route::get('/', [PrincipalController::class, 'principal'])->name("site.index");
// para cha,a um controller e depois sua função ele fica assim dentro de um "array", onde o primeiro paramentro e o controller e o segundo a função
Route::get('/contato', [ContatoController::class, 'contato'])->name("site.contato");

Route::post('/contato', [ContatoController::class, 'registerContato'])->name("site.contato");

Route::get('/teste/{p1?}/{p2?}', [TesteController::class, 'teste'])->name("site.teste");
Route::get('/sobrenos', [SobreNosController::class, 'sobreNos'])->name("site.sobrenos");


// Route::get('/rota2', function()
//     {
//         return redirect()->route('site.rota1');
//     })->name("site.rota2");

//     // Route::redirect('/rota2', '/rota1');
Route::fallback(function () {
    echo "Url acessada nao existe caso queira volta a a tela inicial <a href='" . route('site.index') . "'>clique aqui</a>";
});

Route::get('/login/{erro?}',[LoginController::class,'index'])->name("site.login");
Route::post('/login',[LoginController::class,'autenticar'])->name("site.login");

Route::prefix('/app')->middleware('autenticacao:padrao,visitante')->group(function () {

    Route::get('/home',[HomeController::class, 'index'])->name("app.home");
    Route::get('/sair', [LoginController::class, 'sair'])->name("app.sair");
    Route::get('/cliente', [ClienteController::class, 'index'])->name("cliente");
    Route::get('/fornecedor', [FornecedoresController::class, 'index'])->name("app.fornecedor");
    Route::get('/fornecedor/adicionar', [FornecedoresController::class, 'adicionar'])->name("app.fornecedor.adicionar");
    Route::post('/fornecedor/adicionar', [FornecedoresController::class, 'adicionar'])->name("app.fornecedor.adicionar");
    Route::post('/fornecedor/listar', [FornecedoresController::class, 'listar'])->name("app.fornecedor.listar");
    Route::get('/fornecedor/listar', [FornecedoresController::class, 'listar'])->name("app.fornecedor.listar");
    Route::get('/fornecedor/excluir/{id}', [FornecedoresController::class, 'destoy'])->name("app.fornecedor.excluir");
    Route::get('/fornecedor/editar/{id}', [FornecedoresController::class, 'editar'])->name("app.fornecedor.editar");
    Route::resource('produto', ProdutoController::class);
    Route::resource('produto-detalhe', ProdutoDetalheController::class);
    Route::resource('pedido', PedidoController::class);
    Route::resource('cliente', ClienteController::class);
    Route::resource('pedido-produto', PedidoProdutoController::class);
    Route::get('/pedido-produto/create/{pedido}', [PedidoProdutoController::class, 'create'])->name("pedido-produto.create");
    Route::post('/pedido-produto/store/{pedido}', [PedidoProdutoController::class, 'store'])->name("pedido-produto.store");
    Route::delete('/pedido-produto/destroy/{pedidoProduto}/{pedido}', [PedidoProdutoController::class, 'destroy'])->name("pedido-produto.destroy");
});
