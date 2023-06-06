<?php

use App\Http\Modules\Auth\Controllers\AuthController;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Auth Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "api" middleware group. Make something great!
|
*/

Route::prefix('auth')->group(function () {
    Route::group(['middleware' => 'auth:sanctum'], function () {
        Route::get('/test', function () {
            return "ok";
        });
    });

    Route::controller(AuthController::class)->group(function () {
        Route::post('login', 'login');
    });
});



