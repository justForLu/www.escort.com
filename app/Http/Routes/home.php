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
    Route::post('/post_login', 'LoginController@login');
    Route::get('/register', 'RegisterController@register');
    Route::post('/post_register', 'RegisterController@postRegister');
    Route::get('/logout', 'LoginController@logout');

    Route::group(['middleware'=>'home.auth'],function (){
        Route::any('/index','IndexController@index');
        Route::any('/index/message','IndexController@message');
        Route::post('/file/uploadPic','FileController@uploadPic');

        Route::any('/escort/index','EscortController@index');
        Route::any('/escort/details/{id}','EscortController@detail');

        Route::any('/article/index/{position}','ArticleController@index');

        Route::any('/appointment/index','AppointmentController@index');
        Route::any('/appointment/list','AppointmentController@search_list');
        Route::any('/appointment/reserve','AppointmentController@reserve');

        Route::any('/user/find_password','UserController@findPassword');
        Route::any('/user/reset_password','UserController@resetPassword');
        Route::any('/user/index','UserController@index');
        Route::any('/user/escort_info','UserController@escort_info');
        Route::any('/user/escort_add','UserController@escort_add');
        Route::any('/user/escort_store','UserController@escort_store');
        Route::any('/user/escort_edit','UserController@escort_edit');
        Route::any('/user/escort_update','UserController@escort_update');
    });

});
