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

Route::get('/', function () {
    return redirect('/admin/index');
});
Route::get('admin', function () {
    return redirect('/admin/index');
});
Route::get('/getImg/{id}/{w?}/{h?}', function ($id,$w,$h) {
    return redirect()->route('getImg', ['id'=>$id,'w'=>$w,'h'=>$h]);
});


Route::group(['prefix' => 'admin', 'namespace' => 'Admin'], function (){

    Route::get('/login', 'LoginController@index');
    Route::post('/login', 'LoginController@login');
    Route::get('/logout', 'LoginController@logout');
    Route::get('/getImg/{id}/{w?}/{h?}', ['as' => 'getImg', 'uses' => 'FileController@getImg']);


    Route::group(['middleware' => ['admin.auth','admin.log']], function(){
        Route::resource('/index', 'IndexController@index');

        Route::resource('/manager', 'ManagerController');
        Route::resource('/permission', 'PermissionController');
        Route::resource('/menu', 'MenuController');
        Route::resource('/role', 'RoleController');
        Route::match(['get', 'post'],'/role/authority/{id?}', 'RoleController@authority');
        Route::post('/file/uploadPic','FileController@uploadPic');
        Route::post('/file/uploadFile','FileController@uploadFile');
        Route::resource('/config', 'ConfigController');
        Route::resource('/advertisement', 'AdvertisementController');
        Route::resource('/article', 'ArticleController');
        Route::resource('/feedback', 'FeedbackController');
        Route::resource('/link', 'LinkController');
        Route::resource('/user', 'UserController');
        Route::resource('/escort', 'EscortController');
        Route::resource('/order', 'OrderController');
        Route::resource('/appointment', 'AppointmentController');
        Route::resource('/cash', 'CashController');
        Route::resource('/cash_config', 'CashConfigController');
        Route::resource('/evaluate', 'EvaluateController');
    });
});


