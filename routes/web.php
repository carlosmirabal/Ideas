<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\NoteController;

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

// Route::get('/', function () {
//     return view('welcome');
// });
Route::get('/mostrar', [NoteController::class, 'mostrar']);
Route::post('/crear', [NoteController::class, 'crear']);
Route::delete('/borrar/{id}', [NoteController::class, 'eliminar']);
Route::put('/actualizar/{id}', [NoteController::class, 'actualizar']);