<?php

use Illuminate\Support\Facades\Route;

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

Auth::routes(['register'=>false]);

Route::get('/home', 'HomeController@index')->name('home');

Route::group(['prefix'=>'admin','middleware'=>['auth','admin']],function(){
    Route::get('/','HomeController@admin')->name('admin');
});

Route::group(['prefix'=>'blogger','middleware'=>['auth','blogger']],function(){
    Route::get('/','HomeController@blogger')->name('blogger');
    Route::get('/list','CategoryController@index')->name('blogger.list');
    Route::get('/create','CategoryController@create')->name('blogger.create');
    Route::post('/store','CategoryController@store')->name('blogger.store');
});
