<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Api\AdminController;
use App\Http\Controllers\Api\ClienteController;


/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Aquí registras las rutas para tu API. Estas rutas se cargan por el
| RouteServiceProvider dentro del grupo de middleware "api".
|
*/

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});


Route::get('/administradores', [AdminController::class, 'mostrartodos']);
Route::post('/administradores', [AdminController::class, 'guardar']);
Route::get('/administradores/{id}', [AdminController::class, 'mostrar']);
Route::put('/administradores/{id}', [AdminController::class, 'actualizar']);
Route::patch('/administradores/{id}/inhabilitar', [AdminController::class, 'inhabilitar']);


Route::get('/clientes', [ClienteController::class, 'mostrartodos']);
Route::post('/clientes', [ClienteController::class, 'guardar']);
Route::get('/clientes/{id}', [ClienteController::class, 'mostrar']);
Route::put('/clientes/{id}', [ClienteController::class, 'actualizar']);
Route::patch('/clientes/{id}/inhabilitar', [ClienteController::class, 'inhabilitar']);
