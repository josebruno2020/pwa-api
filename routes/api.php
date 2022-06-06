<?php

use App\Http\Controllers\AuthController;
use App\Http\Controllers\ExistentSicknessController;
use App\Http\Controllers\PatientController;
use App\Http\Controllers\UserController;
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

Route::group([
    'middleware' => 'api',
    'prefix' => 'auth'
], function () {

    Route::post('login', [AuthController::class, 'login']);
    Route::post('logout', [AuthController::class, 'logout']);
    Route::post('change-password/{id}', [AuthController::class, 'changePassword']);
    Route::post('refresh', [AuthController::class, 'refresh']);
    Route::post('me', [AuthController::class, 'me']);

});

Route::group(['middleware' => 'auth:api'], function () {

    Route::group(['prefix' => 'users'], function () {
        Route::get('', [UserController::class, 'index']);
        Route::post('', [UserController::class, 'create']);
        Route::get('{id}', [UserController::class, 'show']);
        Route::put('{id}', [UserController::class, 'update']);
        Route::delete('{id}', [UserController::class, 'delete']);
    });

    Route::group(['prefix' => 'patients'], function () {
        Route::get('', [PatientController::class, 'index']);
        Route::post('', [PatientController::class, 'create']);
        Route::get('{id}', [PatientController::class, 'show']);
    });

    Route::group(['prefix' => 'sickness'], function () {
        Route::get('{patientId}', [ExistentSicknessController::class, 'find']);
        Route::post('', [ExistentSicknessController::class, 'create']);
    });
});

