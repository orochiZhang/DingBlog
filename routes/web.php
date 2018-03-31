<?php

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

Route::view('/404', 'errors.404');

Route::group(['namespace' => 'Home'],function ($router) {
    $router->get('/', 'ArticleController@all');
    $router->get('/article/all/page/{page}', 'ArticleController@all');
    $router->get('/article/tag/{id}', 'ArticleController@showByTag');
    $router->get('/article/tag/{id}/page/{page}', 'ArticleController@showByTag');
    $router->get('/article/{id}', 'ArticleController@show');
});


Route::group(['namespace' => 'Auth'],function ($router){
    $router->get ('/login', 'LoginController@showLoginForm');
    $router->post('/login', 'LoginController@login');
    $router->post('/logout', 'LoginController@logout');
    $router->get ('/register', 'RegisterController@showRegistrationForm');
    $router->post('/register', 'RegisterController@register');
});
