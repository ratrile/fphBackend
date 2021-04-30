<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\MedicionController;
use App\Http\Controllers\UsuarioController;
use App\Http\Controllers\MedidorController;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

Route::middleware('auth:api')->get('/user', function (Request $request) {
    return $request->user();
});

Route::get('/usuario',[UsuarioController::class, 'index'])->name('usuario');
Route::get('/medidores',[MedidorController::class, 'medidorAll']);
Route::post('/medicion/lectura',[MedicionController::class, 'store']);
Route::put('/medicion/lecturaModifica',[MedicionController::class, 'edit']);
