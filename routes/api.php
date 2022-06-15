<?php

use App\Http\Controllers\Api\AdminController;
use App\Http\Controllers\API\ApiFriendsController;
use App\Http\Controllers\API\AuthController;
use App\Http\Controllers\API\NewsController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});

Route::post('/login', [AuthController::class, 'login']);

Route::get('/news', [NewsController::class, 'index']);
Route::post('/register', [AuthController::class, 'register']);

Route::get('/admin', [AdminController::class, 'index'])->middleware('admin');

Route::group(['middleware'=> ['auth:sanctum']], function(){
    Route::get('/news/create', [NewsController::class, 'create']);
    Route::post('/news/store', [NewsController::class, 'store']);
    Route::get('/news/{id}/edit',[NewsController::class, 'edit']);
    Route::post('/news/{id}', [NewsController::class, 'update']);
    Route::delete('/news/{id}', [NewsController::class, 'destroy']);
    Route::get('/owner', [NewsController::class, 'owner']);
});

Route::group(['middleware'=>'auth:sanctum'], function(){
    Route::get('/friend', [ApiFriendsController::class, 'index']);
    Route::post('/friend/store', [ApiFriendsController::class, 'store']);
    Route::get('/friend/{id}/edit', [ApiFriendsController::class, 'edit']);
    Route::post('/friend/{id}', [ApiFriendsController::class, 'update']);
    Route::delete('/friend/{id}', [ApiFriendsController::class, 'destroy']);
});
