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

Route::prefix('auth')->group(function () {
    Route::post('login', 'App\Http\Controllers\AuthController@login');
    Route::post('logout', 'App\Http\Controllers\AuthController@logout');
    Route::post('refresh', 'App\Http\Controllers\AuthController@refresh');
    Route::post('me', 'App\Http\Controllers\AuthController@me');
});
    


Route::middleware('jwt.verify')->group(function() {
    Route::prefix('rbac')->group(function () {
        Route::post('create-role', 'App\Http\Controllers\RBACController@createRole');
        Route::post('add-permission-to-role', 'App\Http\Controllers\RBACController@addPermissionToRole');
    });
    
    Route::prefix('post')->group(function () {
        Route::post('create', 'App\Http\Controllers\PostController@create')->middleware('role:author');
    });
});