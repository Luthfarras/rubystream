<?php

use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\FilmController;
use App\Http\Controllers\GenreController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\CartController;

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

// Route::get('/', function () {
//     return view('dashboard');
// });

// Route::get('dashboard', function () {
//     return view('dashboard');
// });

Route::get('template', function () {
    return view('template');
});

// Route::get('template', [HomeController::class, 'template']);
Route::get('/', [FilmController::class, 'dashboard']);
Route::get('/dash', [FilmController::class, 'dashboard2']);

Route::get('detail/{id}', [FilmController::class, 'detail'])->name('detail');

Route::resource('film', FilmController::class);

Route::resource('genre', GenreController::class);
Route::get('deletegenre/{id}',[GenreController::class,'destroy'])->name('deletegenre');

Auth::routes();
Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

Route::put('update', [App\Http\Controllers\HomeController::class, 'update'])->name('update');

Route::get('/search', [FilmController::class, 'search'])->name('search');
// Route::get('/film',[ApiFilmController::class,'getdata']);

Route::get('cart', [CartController::class, 'list'])->name('cart.list');
// Route::post('cart', [CartController::class, 'add_cart'])->name('cart.store');
Route::post('cartlist/{id}', [CartController::class, 'add_cart']);

Route::get('/aa',[ApiFilmController::class,'aaa']);
