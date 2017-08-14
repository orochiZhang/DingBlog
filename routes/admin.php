<?php


//Route::group(['namespace' => 'admin'],function ($router) {
//    $router->view('/article', 'admin/article/home');
//
//});
Route::view('/setting', 'admin/setting');
Route::view('/profile', 'admin/profile');
Route::view('/article', 'admin/article/home');

Route::get('/article/create', 'Admin\ArticleController@create');
Route::post('/article/create', 'Admin\ArticleController@store');


Route::put('/article/update/{id}', 'Admin\ArticleController@update');
Route::get('/article/update/{id}', 'Admin\ArticleController@edit');



