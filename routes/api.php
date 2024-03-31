<?php

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

Route::group(['prefix' => 'v1', 'namespace' => 'App\Http\Controllers'],  function(){
    Route::apiResource('users', UserController::class);
    Route::apiResource('programs', ProgramController::class);
    Route::apiResource('challenges', ChallengeController::class);
    Route::apiResource('company', CompanyController::class);
});
