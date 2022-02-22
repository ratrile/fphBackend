<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\MedicionController;
use App\Http\Controllers\UsuarioController;
use App\Http\Controllers\MedidorController;
use App\Http\Controllers\ReciboController;
use App\Http\Controllers\CuentaController;
use App\Http\Controllers\CuboCostoController;
use App\Http\Controllers\LoginController;
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
Route::get('/medicion/editar/{mes}/{anio}',[MedicionController::class, 'listaMedicionPeriodo']);
Route::get('/medicion/lista-ususrio-medidor',[MedicionController::class, 'medidorUsuario']);
Route::get('/recibo/lista-medidor-medicion/{idMedidor}',[ReciboController::class, 'medidorMedicion']);
Route::get('/recibo/lista-medidor-medicion-recibo/{idMedidor}',[ReciboController::class, 'medidorMedicionRecibo']);
Route::get('/recibo/pdf',[ReciboController::class, 'pdf']);
Route::post('/recibo/cobro',[ReciboController::class, 'store']);
Route::get('/recibo/cobro/cuerpo/{idMedicion}',[ReciboController::class, 'cuerpoRecibo']);
Route::get('/recibo/cobro/max-id',[ReciboController::class, 'maxId']);
Route::get('/recibo/impimirCopia/{idMedicion}',[ReciboController::class, 'copia']);
Route::post('/usuario/crear',[UsuarioController::class,'create']);
Route::post('/usuario/editar',[UsuarioController::class,'update']);
Route::get('/cuenta',[CuentaController::class,'create']);
Route::post('/cuenta/crear',[CuentaController::class,'create']);
Route::post('/usuario/editar',[CuentaController::class,'update']);
Route::post('/usuario/editarAct',[CuentaController::class,'updateActivo']);
Route::get('/configuracion/listaTarifa',[CuboCostoController::class,'index']);
Route::post('/configuracion/nuevaTarifa',[CuboCostoController::class,'create']);
Route::post('/configuracion/editTarifa',[CuboCostoController::class,'edit']);
Route::post('/configuracion/elegirTarifa',[CuboCostoController::class,'selecionar']);
Route::get('/configuracion/tarifaActual',[CuboCostoController::class,'tarifaActual']);
Route::post('/login',[LoginController::class,'acceder']);