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

Route::middleware('auth:api')->get('/user', function (Request $request) {
    return $request->user();
});

Route::post('/login', 'UserController@login');
Route::post('/register', 'UserController@register');
Route::post('/profile_update', 'UserController@profile_update');
Route::post('/profile_view', 'UserController@profile_view');
Route::post('/categories_api','CategoriesController@Categories_api');
Route::post('/image_upload', 'BrandController@storeData');