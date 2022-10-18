<?php

use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;
<<<<<<< HEAD
use App\Http\Controllers\FilmController;
=======
use App\Http\Controllers\HomeController;
>>>>>>> 0fb496af33f1f0042b0a363cf938a7125d5fc8e3

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
<<<<<<< HEAD
Route::resource('film', FilmController::class);
=======
// Route::get('/', function () {
//     return view('template');
// });
// Route::get('dashboard', function () {
//     return view('dashboard');
// });
// Route::get('profile', function () {
//     return view('profile');
// });

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
>>>>>>> 0fb496af33f1f0042b0a363cf938a7125d5fc8e3
