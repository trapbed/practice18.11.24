<?php

use App\Http\Controllers\AuthController;
use App\Http\Controllers\PageController;
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

// Route::get('/', function () {
//     return view('welcome');
// });

Route::get('/', [PageController::class, 'index'])->name('index');

Route::get('/reg_show', [PageController::class, 'reg_show'])->name('reg_show');
Route::post('/reg', [AuthController::class, 'registration'])->name('registration');
Route::post('/auth', [AuthController::class, 'auth'])->name('auth');


Route::get('/logout', [AuthController::class, 'logout'])->name('logout');
