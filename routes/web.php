<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\TodoController;

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

Route::get('/', [TodoController::class, 'index']);

Route::prefix('todo')->group(function () {
  Route::post('create', [TodoController::class, 'create'])->name('todo.create');
  Route::post('update/{id}', [TodoController::class, 'update'])->name('todo.update');
  Route::post('delete{id}', [TodoController::class, 'delete'])->name('todo.delete');
});
