<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\UsuarioController;
use App\Http\Controllers\MedicionController;
use App\Http\Controllers\MedidorController;

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

Route::get('/', function () {
    return view('welcome');
});

//Route::get('/usuario',[UsuarioController::class, 'index'])->name('usuario');
//Route::post('/medicion/lectura',[MedicionController::class, 'store'])->name('medicion.lectura');
Route::get('/medidor',[MedidorController::class, 'index'])->name('medidor.usuario');
Route::get('/medicion/ultima/{id}',[MedicionController::class, 'UltimaLectura']);
Route::get('/usuario/{texto}',[UsuarioController::class, 'buscarUsuario']);

//Route::get('/medicion/lectura',[MedicionController::class, 'store'])->name('medicon.lectura');

