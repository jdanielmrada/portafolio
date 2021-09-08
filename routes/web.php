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


Route::get('/', 'InicioController@index')->name('inicio');

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');
Route::resource('/user', 'UserController');
Route::resource('/category', 'CategoryController');
Route::resource('/article', 'ArticleController');
Route::post('/article/{article}', 'ArticleController@update')->name('upDate');
Route::post('/user/{user}', 'UserController@passwordEdit')->name('passwordEdit');

