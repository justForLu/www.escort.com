<?php

/*
|--------------------------------------------------------------------------
| Application Routes
|--------------------------------------------------------------------------
|
| Here is where you can register all of the routes for an application.
| It's a breeze. Simply tell Laravel the URIs it should respond to
| and give it the controller to call when that URI is requested.
|
*/
use Illuminate\Support\Facades\Route;


Route::get('home', function () {
    return redirect('/home/index');
});


Route::group(['prefix' => 'home', 'namespace' => 'Home'], function () {
    Route::get('/login', 'LoginController@index');
    Route::post('/login', 'LoginController@login');
//    Route::get('/register', 'LoginController@register');
    Route::any('/register', 'LoginController@register');
    Route::get('/logout', 'LoginController@logout');
    Route::any('/index','IndexController@index');


    Route::any('/appointment/index','AppointmentController@index');
    Route::any('/appointment/list','AppointmentController@search_list');
    Route::any('/appointment/reserve','AppointmentController@reserve');

    Route::any('/escort/index','EscortController@index');
    Route::any('/escort/details/{id}','EscortController@detail');

    Route::any('/user/index','UserController@index');
    Route::any('/user/order','UserController@order');

    Route::any('/article/index/{position}','ArticleController@index');
});
