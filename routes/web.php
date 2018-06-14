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

Route::get('/', function () {
    return view('welcome');
});

/*Route::get('base/index',function (){
    return view('welcome');
});*/


Route::get('base/index',"BaseController@index");

Route::get('admin/index', "ari\Controllers\AdminController@index");

Route::post('admin/save', "ari\Controllers\AdminController@save");
/**
 * 添加页
 */
Route::get('admin/add', function (){
    return view('ari/admin/add');
});
/**
 * 修改页--需要参数传递
 */
Route::get('admin/edit', function (){
    return view('ari/admin/update');
});


