<?php

use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Auth;


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

Route::resource('usuarios','\App\Http\Controllers\ControladorUsuario');
Route::resource('gastos','\App\Http\Controllers\ControladorGasto');

Route::get('/', function () {
    /*If an user is logged dont sent to login page */
    if (Auth::check()) {
        return redirect('/home');
    } else {
        return view('/auth/login');
    }
});

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
