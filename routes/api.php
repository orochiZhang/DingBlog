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

Route::middleware('auth:api')->get('/user', function (Request $request) {
    return $request->user();
});

Route::group(['namespace' => 'Api'],function ($router){
    $router->get('/tag/all', 'TagController@all');
    $router->get('/type/all', 'TypeController@all');
    $router->get('/article/all', 'ArticleController@all');
    $router->get('/article/tag/{id}', 'ArticleController@showByTag');
});

Route::middleware('auth:api')->delete('/article/destroy/{id}', 'Admin\ArticleController@destroy');
