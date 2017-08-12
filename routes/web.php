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

//Route::get('/', function () {
//    return view('home');
//});
Route::view('/', 'home');

Route::group(['namespace' => 'Auth'],function ($router){
    $router->get ('/login', 'LoginController@showLoginForm');
    $router->post('/login', 'LoginController@login');
    $router->get ('/register', 'RegisterController@showRegistrationForm');
    $router->post('/register', 'RegisterController@register');
});

//Route::view('/admin', 'admin/home');

Route::get('/article/tag/{id}', 'Home\ArticleController@showByTag');
Route::get('/article/{id}', 'Home\ArticleController@show');



