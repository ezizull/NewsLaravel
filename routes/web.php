<?php

use App\Http\Controllers\AdminController;
use App\Http\Controllers\FriendsController;
use App\Http\Controllers\HomeController;
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

Route::get('/', [HomeController::class, 'index'])->name('home');

Route::group(['middleware'=>['auth:sanctum','admin']], function(){
    Route::get('/admin', [AdminController::class, 'index'])->name('admin');
});

Route::group(['middleware'=>'auth:sanctum'], function(){
    Route::get('/friends', [FriendsController::class, 'index'])->name('friends');
});

require __DIR__.'/auth.php';
