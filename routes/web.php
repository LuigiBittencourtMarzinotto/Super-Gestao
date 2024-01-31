<?php

use App\Http\Controllers\ContatoController;
use App\Http\Controllers\PrincipalController;
use App\Http\Controllers\SobreNosController;
use Illuminate\Support\Facades\Route;

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
Route::get('/', [PrincipalController::class,'principal']);
// para cha,a um controller e depois sua função ele fica assim dentro de um "array", onde o primeiro paramentro e o controller e o segundo a função


Route::get('/sobrenos', [SobreNosController::class,'sobreNos']);



Route::get('/contato', [ContatoController::class,'contato'] );

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