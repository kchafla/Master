<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\EdicioUserController;
use App\Http\Controllers\VideoController;
use App\Http\Controllers\RoomController;
use App\Http\Controllers\ReproductorController;
use App\Http\Controllers\MessageController;

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
Route::get('/update', function(){
    return view('edit');
})->name('update');
Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth'])->name('dashboard');

Route::get('/prueba', function(){
    return view('prueba');
});

Route::post('/crear', [RoomController::class, 'newroom'])->middleware('auth')->name('crear');

Route::get('/reproductor', [ReproductorController::class, 'reproductor'])->middleware('auth')->name('reproductor');
Route::post('/video', [VideoController::class, 'newvideo'])->middleware('auth')->name('video');
Route::get('/mensajes', [MessageController::class, 'recovermessage'])->middleware('auth')->name('mensajes');
Route::post('/mensaje', [MessageController::class, 'newmessage'])->middleware('auth')->name('mensaje');


Route::post('/updateUser', [EdicioUserController::class, 'edit']);
require __DIR__.'/auth.php';
