<?php

use App\Http\Controllers\Administradorcontroller;
use App\Http\Controllers\ClienteController;
use App\Http\Controllers\HotelController;
use App\Http\Controllers\PaquetesController;
use App\Http\Controllers\TourController;
use App\Http\Controllers\VuelosController;
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

Route::get('/', function () {
    return view('welcome');
});

//Route::view('/administradores','/admin/index');
//Route::view('/administradores/crear','/admin/create');

//Route::view('/clientes','/clientes/index');
Route::view('/clientes/crear','/clientes/create');

//Route::view('/vuelos','/vuelos/index');
Route::view('/vuelos/crear','/vuelos/create');

Route::view('/reservaciones','/reservacion/index');
Route::view('/reservaciones/crear','/reservacion/create');

// Route::view('/paquetes','/paquetes/index');
Route::view('/paquetes/crear','/paquetes/create');

//Route::view('/hoteles','/hotel/index');
Route::view('/hoteles/crear','/hotel/create');

//Route::view('/tours','/tour/index');
Route::view('/tours/crear','/tour/create');

Route::view('/plantilla','plantilla/base');

Route::get('/paquetes/index',[PaquetesController::class,'mostrartodos']);

Route::get('/admin/index',[Administradorcontroller::class,'mostrartodos']);
Route::get('/admin/crear',[Administradorcontroller::class,'crear']);
Route::post('/admin/guardar',[Administradorcontroller::class,'guardar']);

Route::get('/hotel/index',[HotelController::class,'mostrartodos']);

Route::get('/vuelos/index',[VuelosController::class,'mostrartodos']);

Route::get('/tour/index',[TourController::class,'mostrartodos']);

Route::get('/clientes/index',[ClienteController::class,'mostrartodos']);
Route::get('/clientes/crear',[ClienteController::class,'crear']);
Route::post('/clientes/guardar',[ClienteController::class,'guardar']);