<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;


use App\Http\Controllers\Api\Auth\LoginController;
use App\Http\Controllers\Api\Auth\RegisterController;
use App\Http\Controllers\Api\JournalController;
use App\Http\Controllers\Admin\JournalAccessController;

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

//Auth
Route::group(['prefix' => 'auth'], function () {
    Route::post('/login', [LoginController::class, 'login']);
    Route::post('/register/{role}', [RegisterController::class, 'register']);
});

Route::group(['middleware' => ['auth:api', 'role:super_admin']], function () {
    //Journal crud
    Route::apiResource('journals', JournalController::class);
    //Journal access url crud
    Route::apiResource('journal/access', JournalAccessController::class);
});
