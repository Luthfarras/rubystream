<?php

use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\FilmController;
use App\Http\Controllers\GenreController;
use App\Http\Controllers\HomeController;

use App\Http\Controllers\ApiFilmController;

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
// Route::resource('film', FilmController::class);
Route::get('template', function () {
    return view('template');
});
Route::get('film', function () {
    return view('film/film');
});
Route::resource('genre', GenreController::class);
Route::get('deletegenre/{id}',[GenreController::class,'destroy'])->name('deletegenre');

Route::get('dashboard', [FilmController::class, 'dashboard']);


Auth::routes();
Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

Route::put('update', [App\Http\Controllers\HomeController::class, 'update'])->name('update');

Route::get('/film',[ApiFilmController::class,'getdata']);

Route::get('/aa',[ApiFilmController::class,'aaa']);

