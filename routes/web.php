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

Route::get('/', [\App\Http\Controllers\PostController::class, "index"])->name("posts.index");
Route::get('/opprett', [\App\Http\Controllers\PostController::class, "create"])->name("posts.create");
Route::post('/opprett', [\App\Http\Controllers\PostController::class, "store"])->name("posts.store");
Route::get('/{post}', [\App\Http\Controllers\PostController::class, "show"])->name("posts.show");
Route::delete('/{post}', [\App\Http\Controllers\PostController::class, "destroy"])->name("posts.destroy");

