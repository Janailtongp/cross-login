<?php

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

// Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
//     return $request->user();
// });


Route::post('login', [App\Http\Controllers\Api\AuthController::class, 'login'])->name('login');

Route::group(['middleware' => ['apiJWT']], function(){
    Route::post('logout', [App\Http\Controllers\Api\AuthController::class, 'logout'])->name('logout');
    Route::get('users', [App\Http\Controllers\Api\UserController::class, 'index'])->name('users');
    //Route::post('refresh', 'AuthController@refresh');
    Route::post('me', [App\Http\Controllers\Api\AuthController::class, 'me'])->name('me');
});