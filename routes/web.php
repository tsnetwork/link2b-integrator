<?php

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

Route::middleware('auth')->group(function (){
    Route::get('/',[\App\Http\Controllers\Integrador\MainController::class,'index']);

    Route::resource('/clientes',\App\Http\Controllers\Integrador\CustomerController::class);
});

Auth::routes();




//Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
