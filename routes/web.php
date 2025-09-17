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
//Route::view('/clientes/crear','/clientes/create');

//Route::view('/vuelos','/vuelos/index');
//Route::view('/vuelos/crear','/vuelos/create');

Route::view('/reservaciones','/reservacion/index');
Route::view('/reservaciones/crear','/reservacion/create');

// Route::view('/paquetes','/paquetes/index');
//Route::view('/paquetes/crear','/paquetes/create');

//Route::view('/hoteles','/hotel/index');
//Route::view('/hoteles/crear','/hotel/create');

//Route::view('/tours','/tour/index');
//Route::view('/tours/crear','/tour/create');

Route::view('/plantilla','plantilla/base');

Route::get('/paquetes/index',[PaquetesController::class,'mostrartodos']);
Route::get('/paquetes/crear',[PaquetesController::class,'crear']);
Route::post('/paquetes/guardar',[PaquetesController::class,'guardar']);

Route::get('/admin/index',[Administradorcontroller::class,'mostrartodos']);
Route::get('/admin/crear',[Administradorcontroller::class,'crear']);
Route::post('/admin/guardar',[Administradorcontroller::class,'guardar']);

Route::get('/Hotel/index',[HotelController::class,'mostrartodos']);
Route::get('/Hotel/crear',[HotelController::class,'crear']);
Route::post('/Hotel/guardar',[HotelController::class,'guardar']);

Route::get('/vuelos/index',[VuelosController::class,'mostrartodos']);
Route::get('/vuelos/crear',[VuelosController::class,'crear']);
Route::post('/vuelos/guardar',[VuelosController::class,'guardar']);

Route::get('/tour/index',[TourController::class,'mostrartodos']);
Route::get('/tour/crear',[TourController::class,'crear']);
Route::post('/tour/guardar',[TourController::class,'guardar']);

Route::get('/clientes/index',[ClienteController::class,'mostrartodos']);
Route::get('/clientes/crear',[ClienteController::class,'crear']);
Route::post('/clientes/guardar',[ClienteController::class,'guardar']);