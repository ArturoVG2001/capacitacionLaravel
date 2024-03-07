<?php

use Illuminate\Support\Facades\Route;
//use App\Http\Controllers\TestController;
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

Route::get("/", [App\Http\Controllers\TestController::class, 'test']);

Route::get('/custom', function () {
    $msj = "mensaje desde el servidor c:";

    $data = ['msj' => $msj,'edad'=> 15];
    return view('custom', $data);

});

Route::get('/bienvenida', function () {
    return view('welcome');
});

Route::get('/escribeme', function () {
    return "contactame";
})->name("contacto");