<?php

declare(strict_types=1);

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

Route::prefix('v1')->group(function () {
    Route::get('outgoing', [\App\Http\Controllers\Api\V1\OutgoingController::class, 'index']);
    Route::apiResource('phone', \App\Http\Controllers\Api\V1\PhoneController::class);
    Route::apiResource('sms', \App\Http\Controllers\Api\V1\SmsController::class);
    Route::apiResource('email', \App\Http\Controllers\Api\V1\EmailController::class);
});
