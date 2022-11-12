<?php

use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\FilmController;
use App\Http\Controllers\GenreController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\CartController;

use App\Http\Controllers\ApiFilmController;
use App\Http\Controllers\HistoryController;

// use App\Http\Controllers\Auth\LoginController;

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

// Route::get('template', function () {
//     return view('template');
// });

// Route::get('/login', [LoginController::class, 'sendLoginResponse']);
// Route::get('/login', [LoginController::class, 'sendFailedLoginResponse']);
Route::get('template', [HomeController::class, 'template']);
Route::post('uploadstore', [HomeController::class, 'uploadstore']);
Route::put('upava/{id}', [HomeController::class, 'uploadedit'])->name('upava');
Route::get('/', [FilmController::class, 'dashboard']);
Route::get('/dash', [FilmController::class, 'dashboard2']);

Route::get('detail/{id}', [FilmController::class, 'detail'])->name('detail');
Route::get('watch/{id}', [FilmController::class, 'watch'])->name('watch');
Route::get('category/{id}', [FilmController::class, 'category'])->name('category');
Route::post('rating', [FilmController::class, 'rating'])->name('rating');


Route::resource('film', FilmController::class);

Route::resource('genre', GenreController::class);
Route::get('deletegenre/{id}',[GenreController::class,'destroy'])->name('deletegenre');

Auth::routes();
Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

Route::put('update', [App\Http\Controllers\HomeController::class, 'update'])->name('update');

Route::get('/search', [FilmController::class, 'search'])->name('search');
Route::get('/category', [FilmController::class, 'category'])->name('category');
// Route::get('/film',[ApiFilmController::class,'getdata']);
;
Route::get('cart', [CartController::class, 'list'])->name('cart.list');
Route::get('midt', [CartController::class, 'midt']);
Route::post('cart', [CartController::class, 'list_post']);
// Route::post('cart', [CartController::class, 'add_cart'])->name('cart.store');
Route::post('cartlist/{id}', [CartController::class, 'add_cart']);
Route::post('cartlist2/{id}', [CartController::class, 'add_cart2']);

Route::get('delcart/{id}', [CartController::class, 'del_cart']);
Route::get('checkout', [CartController::class, 'checkout']);

Route::get('/aa',[ApiFilmController::class,'aaa']);

Route::get('history', [HistoryController::class,'index'])->name('history');
Route::get('trans', [HistoryController::class,'index2'])->name('trans');
