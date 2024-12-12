<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\PageController;
use App\Http\Controllers\UserController;
use Illuminate\Support\Facades\Auth;
/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::get('/', function () {
    return view('welcome');
});

Route::middleware(['auth', 'role:admin'])->group(function () {
    Route::get('/page1', [PageController::class, 'page1'])->name('pages.page1');
    Route::resource('users', UserController::class);
});


Route::get('/page2', [PageController:: class, 'page2'])->name('pages.pages2');

Route::get('/page3', [PageController:: class, 'page3'])->name('pages.pages3');

route::resource(name: 'users', controller: UserController::class);

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
