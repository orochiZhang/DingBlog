<?php


//Route::group(['namespace' => 'admin'],function ($router) {
//    $router->view('/article', 'admin/article/home');
//
//});
Route::view('/setting', 'admin/setting');
Route::view('/profile', 'admin/profile');
//Route::view('/article', 'admin/article/home');

Route::group(['namespace' => 'Admin'],function ($router){
    $router->get('/article', 'ArticleController@index');
    $router->get('/article/page/{page}', 'ArticleController@index');
    $router->get('/article/tag/{id}', 'ArticleController@index');
    $router->get('/article/tag/{id}/page/{page}', 'ArticleController@index');
    $router->get('/article/create', 'ArticleController@create');
    $router->post('/article/create', 'ArticleController@store');

    $router->put('/article/update/{id}', 'ArticleController@update');
    $router->get('/article/update/{id}', 'ArticleController@edit');
    $router->delete('/article/destroy/{id}', 'ArticleController@destroy');

    $router->get('/tag/', 'TagController@index');
    $router->post('/tag/create', 'TagController@store');
});

