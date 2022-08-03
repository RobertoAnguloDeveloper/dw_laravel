<?php

use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Auth;
use App\Http\Controllers\ControladorUsuario;


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
    /*If an user is logged dont sent to login page */
    if (Auth::check()) {
        return redirect('/home');
    } else {
        return view('/auth/login');
    }
});

/*Send all request data to ControladorUsuario*/
Route::post('agregar', 'App\Http\Controllers\ControladorUsuario@agregar');


Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
