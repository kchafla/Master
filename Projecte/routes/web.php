<?php

use Illuminate\Support\Facades\Route;

use App\Http\Controllers\EdicioUserController;

use App\Http\Controllers\RoomController;
use App\Http\Controllers\SalasController;

use App\Http\Controllers\VideoController;
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

Route::get('/prueba', function(){
    return view('prueba');
});

Route::get('/dashboard', [SalasController::class, 'recoversalas'])->middleware('auth')->name('dashboard');
Route::get('/crear', [RoomController::class, 'newroom'])->middleware('auth')->name('crear');

Route::get('/sala/{id}', [ReproductorController::class, 'reproductor'])->middleware('auth');
Route::post('/sala/{id}/video', [VideoController::class, 'newvideo'])->middleware('auth');
Route::get('/sala/{id}/videos', [VideoController::class, 'recovervideo'])->middleware('auth');
Route::get('/sala/{id}/mensajes/{chat}', [MessageController::class, 'recovermessage'])->middleware('auth');
Route::post('/sala/{id}/mensaje/{chat}', [MessageController::class, 'newmessage'])->middleware('auth');

Route::post('/updateUser', [EdicioUserController::class, 'edit']);

require __DIR__.'/auth.php';
