<?php

use App\Http\Controllers\AuthController;
use App\Http\Controllers\GiphyController;
use App\Http\Controllers\UserFavoriteGifController;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "api" middleware group. Make something great!
|
*/

Route::post('/login', [AuthController::class, 'login']);

Route::controller('auth:api')->middleware('user.logged')->group(function(){
    Route::get('giphy/search', [GiphyController::class, 'search']);
    Route::get('giphy/{id}', [GiphyController::class, 'getById']);

    Route::get('user/favorite', [UserFavoriteGifController::class, 'getAll']);
    Route::post('user/{user_id}/favorite', [UserFavoriteGifController::class, 'save']);
});
