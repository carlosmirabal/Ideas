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
Route::get('/', [NoteController::class, 'inicio']);
Route::post('mostrar', [NoteController::class, 'mostrar']);
Route::post('crear', [NoteController::class, 'crear']);
Route::post('updateNotas', [NoteController::class, 'updateNotas']);
Route::post('notasContent', [NoteController::class, 'notasContent']);
Route::post('notasDelete', [NoteController::class, 'notasDelete']);
// Route::delete('/borrar/{id}', [NoteController::class, 'eliminar']);
// Route::put('/actualizar/{id}', [NoteController::class, 'actualizar']);