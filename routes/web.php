<?php

use App\Http\Controllers\ContatoController;
use App\Http\Controllers\FornecedoresController;
use App\Http\Controllers\PrincipalController;
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
Route::get('/', [PrincipalController::class,'principal'])->name("site.index");
// para cha,a um controller e depois sua função ele fica assim dentro de um "array", onde o primeiro paramentro e o controller e o segundo a função


Route::get('/sobrenos', [SobreNosController::class,'sobreNos'])->name("site.sobrenos");



Route::get('/contato', [ContatoController::class,'contato'] )->name("site.contato");

Route::get('/teste/{p1?}/{p2?}', [TesteController::class,'teste'] )->name("site.teste");

// Route::get('/rota2', function()
//     {
//         return redirect()->route('site.rota1');
//     })->name("site.rota2");

//     // Route::redirect('/rota2', '/rota1');
Route::fallback(function(){
    echo "Url acessada nao existe caso queira volta a a tela inicial <a href='".route('site.index')."'>clique aqui</a>";
});

// vamos agrupar dentro de app/
// para isso colocamos eles dentro de um grupo com um prefixo, que vai 
// ser o inicio da routa, ou seja para chega na tela de login
//  o caminha e /app/login
Route::prefix('/app')->group(function () {
    Route::get('/login', function(){
        return"login";
    })->name("app.login");
    
    Route::get('/cliente', function(){
        return"Cliente";
    })->name("app.Cliente");
    
    Route::get('/produtos', function(){
        return"produtos";
    })->name("app.produtos");  
    Route::get('/fornecedores', [FornecedoresController::class,'index'] )->name("app.fornecedores");  
    
});


/*
Na rotas via HTTP temos varios metodos eles são:

POST

GET

PUT

DELETE

PATCH

OPTIONS

Cada um deles e um metodo, mesmo q todos esteja na mesma rota mais com metodos diferentes podemos fazer com q cada um execute uma função diferente


*/