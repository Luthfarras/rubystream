<?php

use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\FilmController;
use App\Http\Controllers\GenreController;
use App\Http\Controllers\HomeController;

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
// Route::get('genre', function () {
//     return view('genre');
// });
Route::get('profile', function () {
    return view('profile');
});

Route::get('dashboard', [FilmController::class, 'dashboard']);


Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
