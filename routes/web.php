<?php

use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', function (){
    echo "Welcome";
});


Route::get('clearcache', function () {
    Artisan::call('view:clear');
    Artisan::call('route:clear');
    Artisan::call('config:cache');
    Artisan::call('config:clear');
});

Route::get('storage', function () {
    Artisan::call('storage:link');
});

Route::get('test1', [\App\Http\Controllers\TestController::class, 'add']);
Route::get('getUser/{user}', [\App\Http\Controllers\TestController::class, 'getUser']);

Route::get('createUser', [\App\Http\Controllers\TestController::class, 'createUser']);
