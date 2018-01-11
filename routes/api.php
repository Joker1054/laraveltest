<?php

use Illuminate\Http\Request;

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

Auth::routes();

Route::group([

    'middleware' => 'jwt'

], function ($router) {

    Route::resource('items', ItemsController::class, [ 'except' => [ 'edit', 'create' ]]);
    Route::post('users/{id}', 'UsersController@changeAvatar');
    Route::put('password/change-password', 'Auth\ResetPasswordController@changePassword');
    Route::resource('users', UsersController::class, [ 'except' => [ 'create', 'store', 'edit']]);

});

