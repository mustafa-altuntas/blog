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




Route::get('/','Front\HomepageController@index')->name('homepage');
Route::get('sayfa','Front\HomepageController@index');
Route::get('/kategori/{category}','Front\HomepageController@category')->name('category');
Route::get('/{category}/{slug}','Front\HomepageController@single')->name('single');
Route::get('/{slug}','Front\HomepageController@page')->name('page');
