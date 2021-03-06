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

Route::get('/', 'HomeController@index')->name('home');

Route::get('/create', 'HomeController@create')->name('create');
Route::post('/save', 'HomeController@save')->name('save');
Route::get('/view/{id}', 'HomeController@view')->name('view');

Route::get('/manage', 'HomeController@manage')->name('manage');
Route::post('/publish', 'HomeController@publish')->name('publish');