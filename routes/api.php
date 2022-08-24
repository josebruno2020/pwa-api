<?php

use App\Http\Controllers\AuthController;
use App\Http\Controllers\ChartController;
use App\Http\Controllers\ChatController;
use App\Http\Controllers\DoctorReportController;
use App\Http\Controllers\ExistentSicknessController;
use App\Http\Controllers\ForgotPasswordController;
use App\Http\Controllers\NurseReportController;
use App\Http\Controllers\PatientController;
use App\Http\Controllers\PatientStatusHistoryController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\VitalSignsController;
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
    Route::post('forgot-password', [ForgotPasswordController::class, 'forgotPassword']);
    Route::post('reset-password', [ForgotPasswordController::class, 'resetPassword']);

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
        Route::put('{id}', [PatientController::class, 'update']);
        Route::delete('{id}', [PatientController::class, 'delete']);

        Route::group(['prefix' => 'status-history'], function () {
            Route::post('', [PatientStatusHistoryController::class, 'create']);
            Route::get('{patientId}', [PatientStatusHistoryController::class, 'getByPatient']);
        });
    });

    Route::group(['prefix' => 'sickness'], function () {
        Route::get('{patientId}', [ExistentSicknessController::class, 'find']);
        Route::post('', [ExistentSicknessController::class, 'create']);
    });

    Route::group(['prefix' => 'reports'], function () {
        Route::group(['prefix' => 'nurse'], function () {
            Route::post('', [NurseReportController::class, 'create']);
            Route::get('{patientId}', [NurseReportController::class, 'getByPatient']);
            Route::put('{id}', [NurseReportController::class, 'update']);
            Route::delete('{id}', [NurseReportController::class, 'delete']);
        });

        Route::group(['prefix' => 'doctor'], function () {
            Route::post('', [DoctorReportController::class, 'create']);
            Route::get('{patientId}', [DoctorReportController::class, 'getByPatient']);
            Route::put('{id}', [DoctorReportController::class, 'update']);
            Route::delete('{id}', [DoctorReportController::class, 'delete']);
        });
    });

    Route::group(['prefix' => 'vital-signs'], function () {
        Route::post('', [VitalSignsController::class, 'create']);
        Route::get('{patientId}', [VitalSignsController::class, 'getByPatient']);
        Route::put('{id}', [VitalSignsController::class, 'update']);
        Route::delete('{id}', [VitalSignsController::class, 'delete']);
    });

    Route::group(['prefix' => 'charts'], function () {
        Route::get('{patientId}', [ChartController::class, 'getByPatient']);
    });

    Route::group(['prefix' => 'chat'], function() {
        Route::get('users', [ChatController::class, 'getUsers']);
        Route::post('', [ChatController::class, 'sendMessage']);
    });
});

