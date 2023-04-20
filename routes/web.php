<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\loginController;
use App\Http\Controllers\singupController;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\FanController;
use App\Http\Controllers\humidityController;
use App\Http\Controllers\lightningController;
use App\Http\Controllers\temperatureController;
use App\Http\Controllers\usersController;
use GuzzleHttp\Middleware;

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

//Rutas Login
    Route::get('/register', [singupController::class, 'index'])
        ->middleware('guest')
        ->name('register.index');

    Route::post('/register', [singupController::class, 'store'])
        ->name('register.store');


    Route::get('/login', [loginController::class, 'index'])
        ->middleware('guest')
        ->name('login.index');

    Route::post('/login', [loginController::class, 'store'])
        ->name('login.store');

    Route::get('/admin', [AdminController::class, 'index'])
      //->middleware('auth.admin')       
        ->name('admin.index');

//Termina Rutas Login  

//usuarios
Route::get('/create', [usersController::class, 'create'])->name('users.create');

//humedad
Route::get('/create', [humidityController::class, 'create'])->name('humidity.create');

//temperatura
Route::get('/create', [temperatureController::class, 'create'])->name('temperature.create');

//iluminacion
Route::get('/create', [lightningController::class, 'create'])->name('lightning.create');

//humedad 
Route::get('/humedad', [humidityController::class, 'guardar']);

//temperatura 
Route::get('/temperatura', [temperatureController::class, 'guardar']);

//iluminacion 
Route::get('/iluminacion', [lightningController::class, 'guardar']);

//ventilador 
Route::get('/ventilador', [FanController::class, 'guardar']);



Route::resource('/users',usersController::class);
Route::resource('/humidity',humidityController::class);
Route::resource('/temperature',temperatureController::class);
Route::resource('/lightning',lightningController::class);
Route::resource('/fan',FanController::class);








