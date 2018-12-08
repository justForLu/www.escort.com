<?php
/**
 * Created by PhpStorm.
 * User: Administrator
 * Date: 2018/12/8
 * Time: 15:51
 */

use Illuminate\Support\Facades\Route;


Route::get('home', function () {
    return redirect('/home/index');
});


Route::group(['prefix' => 'home', 'namespace' => 'Home'], function () {
    Route::any('/index','IndexController@index');

    Route::group(['middleware'=>'api'],function (){
        Route::any('/index/index','IndexController@index');
        Route::any('/course/index','CourseController@index');
        Route::any('/course/details/{id}','CourseController@details');
        Route::any('/news/index','NewsController@index');
        Route::any('/news/details/{id}','NewsController@details');
        Route::any('/news/mall','NewsController@mall');
    });
});