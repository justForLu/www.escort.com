<?php
/**
 * Created by PhpStorm.
 * User: Administrator
 * Date: 2018/12/11
 * Time: 0:49
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
        Route::resource('/news', 'NewsController');
        Route::resource('/check_category', 'CheckCategoryController');
        Route::get('/getChildrenCategory', 'CheckCategoryController@getChildrenCategory');
        Route::resource('/check_content', 'CheckContentController');
        Route::resource('/course', 'CourseController');
    });
});

