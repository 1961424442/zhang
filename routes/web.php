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


// Route::get('/', function () {
//     return view('welcome');
// });

// 中间件
// Route::get('/', function () {
// 	session(['pid'=>8]);
// 	// request()->session()->forget('pid');
	
//     return view('welcome',['name'=>"牙哥公司"]);
// });

Route::get('/admin','AdminController@index');
Route::get('/admin','AdminController@add');

//用户管理
Route::prefix('/user')->group(function(){
    //添加视图页面
    Route::get('create','UserController@create');
    //添加处理展示
    Route::post('save','UserController@save');
    //列表展示页面
    Route::get('index','UserController@index');
    //删除处理页面
    Route::get('del/{id}','UserController@del');
    //修改展示页面
    Route::get('edit/{id}','UserController@edit');
    //修改处理页面
    Route::post('update','UserController@update');
});

//学生表
Route::prefix('/xue')->group(function(){
    //添加
    Route::get('create','XueController@create');
    //添加处理
    Route::post('save','XueController@save');
    //展示
    Route::get('index','XueController@index');
    //删除
    Route::get('del/{xue_id}','XueController@del');
    //修改
    Route::get('edit/{xue_id}','XueController@edit');
     //修改处理页面
     Route::post('update','XueController@update');
});

//登录注册
Route::prefix('/login')->group(function(){
    //注册表单页面
    Route::get('create','LoginController@create');
    //注册接受页面
    Route::post('save','LoginController@save');
    //登录页面
    Route::get('add','LoginController@add');
    //登录处理页面
    Route::post('address','LoginController@addres') -> name('address');
});

//商品详情
Route::prefix('/goods')->middleware(['checklogin'])->group(function(){
    //商品添加页面
    Route::get('create','GoodsController@create')->name('create');
    //商品添加处理页面
    Route::any('save','GoodsController@save')->name('save');
    //图片上传
    Route::any('upload','GoodsController@upload')->name('upload');
    //商品展示页面
    Route::get('index','GoodsController@index')->name('index');
    //删除页面
    Route::get('del/{goods_id}','GoodsController@del')->name('del');
    //修改展示页面
    Route::any('edit/{goods_id}','GoodsController@edit')->name('edit');
    //修改处理页面
    Route::any('update','GoodsController@update')->name('update');
});

//商品地址
Route::prefix('/cate')->group(function(){
    //添加页面
    Route::get('create','CateController@create')->name('create');
});

//前台首页
Route::get('/','Index\IndexController@index');

//前台登录页面
Route::prefix('/login')->group(function(){
    //登录页面
    Route::get('login','Index\LoginController@login');
    //注册页面
    Route::get('loginAdd','Index\LoginController@loginAdd');
    
});