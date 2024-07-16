<?php

use App\Http\Controllers\AuthController;
use App\Http\Controllers\GiphyController;
use Illuminate\Http\Request;
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

// Route::middleware('auth:api')->get('/user', function (Request $request) {
    // return $request->user();
// });

Route::post('/login', [AuthController::class, 'login']);

Route::controller('auth:api')->group(function(){
    Route::get('giphy/search', [GiphyController::class, 'search']);
    Route::get('giphy/{id}', [GiphyController::class, 'getById']);
});
