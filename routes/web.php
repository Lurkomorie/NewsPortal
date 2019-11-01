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


Auth::routes();

Route::get('/', 'HomeController@index')->name('/');

Route::resource('link','LinkController')->middleware('auth');
Route::resource('category','CategoryController')->middleware('auth');

Route::post('link/confirm/{id}', 'LinkController@confirm')->name('confirm')->middleware('auth');

/*Route::get('link/create','LinkController@create')->name('link/create')->middleware('auth');
Route::post('/link', 'LinkController@store')->middleware('auth');

Route::get('link/delete/{id}', 'LinkController@destroy')->name('link/delete');
Route::get('/link/edit/{id}', 'LinkController@edit')->middleware('auth');*/

Route::get('admin/home', 'HomeController@admin')->name('admin.home')->middleware('admin');

