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

/////////////////////////////后台url
Route::get('base/index',"BaseController@index");
/**
 * 登录，验证码
 */
Route::post('b/login/login',"BaseController@login");
Route::get('b/login/verify',"BaseController@verify");
Route::get('b/login/out',"BaseController@logout");

/**
 * 用户
 */
Route::get('b/user/index', "ari\Controllers\logic\AdminController@index");
Route::post('b/user/save', "ari\Controllers\logic\AdminController@save");
Route::post('b/user/edit', "ari\Controllers\logic\AdminController@esave");
Route::post('b/user/del', "ari\Controllers\logic\AdminController@del");
Route::post('b/user/one', "ari\Controllers\logic\AdminController@one");

Route::post('b/user/index', "ari\Controllers\logic\AdminController@index");
Route::get('b/user/save', "ari\Controllers\logic\AdminController@save");
Route::get('b/user/edit', "ari\Controllers\logic\AdminController@esave");
Route::get('b/user/del', "ari\Controllers\logic\AdminController@del");
Route::get('b/user/one', "ari\Controllers\logic\AdminController@one");

/**
 * 部门
 */
Route::post('b/dept/index', "ari\Controllers\logic\DeptController@index");
Route::post('b/dept/save', "ari\Controllers\logic\DeptController@save");
Route::post('b/dept/edit', "ari\Controllers\logic\DeptController@esave");
Route::post('b/dept/del', "ari\Controllers\logic\DeptController@del");
Route::post('b/dept/one', "ari\Controllers\logic\DeptController@one");

Route::get('b/dept/index', "ari\Controllers\logic\DeptController@index");
Route::get('b/dept/save', "ari\Controllers\logic\DeptController@save");
Route::get('b/dept/edit', "ari\Controllers\logic\DeptController@esave");
Route::get('b/dept/del', "ari\Controllers\logic\DeptController@del");
Route::get('b/dept/one', "ari\Controllers\logic\DeptController@one");

/**
 * 菜单
 */
Route::post('b/menu/index', "ari\Controllers\logic\MenuController@index");
Route::post('b/menu/save', "ari\Controllers\logic\MenuController@save");
Route::post('b/menu/edit', "ari\Controllers\logic\MenuController@esave");
Route::post('b/menu/del', "ari\Controllers\logic\MenuController@del");
Route::post('b/menu/one', "ari\Controllers\logic\MenuController@one");

Route::get('b/menu/index', "ari\Controllers\logic\MenuController@index");
Route::get('b/menu/save', "ari\Controllers\logic\MenuController@save");
Route::get('b/menu/edit', "ari\Controllers\logic\MenuController@esave");
Route::get('b/menu/del', "ari\Controllers\logic\MenuController@del");
Route::get('b/menu/one', "ari\Controllers\logic\MenuController@one");
/**
 * 职位
 */
Route::post('b/pos/index', "ari\Controllers\logic\PositionController@index");
Route::post('b/pos/save', "ari\Controllers\logic\PositionController@save");
Route::post('b/pos/edit', "ari\Controllers\logic\PositionController@esave");
Route::post('b/pos/del', "ari\Controllers\logic\PositionController@del");
Route::post('b/pos/one', "ari\Controllers\logic\PositionController@one");

Route::get('b/pos/index', "ari\Controllers\logic\PositionController@index");
Route::get('b/pos/save', "ari\Controllers\logic\PositionController@save");
Route::get('b/pos/edit', "ari\Controllers\logic\PositionController@esave");
Route::get('b/pos/del', "ari\Controllers\logic\PositionController@del");
Route::get('b/pos/one', "ari\Controllers\logic\PositionController@one");

/**
 * 角色
 */
Route::post('b/role/index', "ari\Controllers\logic\RoleController@index");
Route::post('b/role/save', "ari\Controllers\logic\RoleController@save");
Route::post('b/role/edit', "ari\Controllers\logic\RoleController@esave");
Route::post('b/role/del', "ari\Controllers\logic\RoleController@del");
Route::post('b/role/one', "ari\Controllers\logic\RoleController@one");

Route::get('b/role/index', "ari\Controllers\logic\RoleController@index");
Route::get('b/role/save', "ari\Controllers\logic\RoleController@save");
Route::get('b/role/edit', "ari\Controllers\logic\RoleController@esave");
Route::get('b/role/del', "ari\Controllers\logic\RoleController@del");
Route::get('b/role/one', "ari\Controllers\logic\RoleController@one");



/**
 * 添加页
 */
Route::get('b/user/add', function (){
    return view('ari/admin/add');
});
/**
 * 修改页--需要参数传递
 */
Route::get('b/user/update', function (){
    return view('ari/admin/update');
});
///////////////////////////客户端url





