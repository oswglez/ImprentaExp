<?php

use Illuminate\Support\Facades\Route;

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

Route::resource('usuarios', 'UserController');

Route::resource('printers', 'PrinterController');

Route::resource('tareas', 'tareaController');

Route::resource('troquels', 'troquelController');

Route::resource('franjas', 'franjaController');

Route::resource('materials', 'materialController');

Route::resource('log_systems', 'log_systemController');

Route::resource('clients', 'clientController');

Route::resource('orders', 'orderController');

Route::get('/orders/main', function () {
    return view('orders.main');
});

