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
    return view('frontend.index');
});

Auth::routes(['register'=>false]);

Route::get('/home', 'HomeController@index')->name('home');

Route::group(['prefix'=>'admin','middleware'=>['auth','admin']],function(){
    Route::get('/','HomeController@admin')->name('admin');
    Route::resource('testimonial','TestimonialController');
});

Route::group(['prefix'=>'blogger','middleware'=>['auth','blogger']],function(){
    Route::get('/','HomeController@blogger')->name('blogger');
    Route::get('/list','CategoryController@index')->name('blogger.list');
    Route::get('/create','CategoryController@create')->name('category.creation');
    Route::post('/store','CategoryController@store')->name('blogger.store');
    Route::get('/{id}/delete','CategoryController@destroy')->name('blogger.destroy');
    Route::get('/blog','BlogController@index')->name('blog.list');
    Route::get('/blog/create','BlogController@create')->name('blog.create');
    Route::post('/blog/store','BlogController@store')->name('blog.store');
    Route::get('/{id}/delete/blog','BlogController@destroy')->name('blog.delete');
    Route::get('/{id}/edit/blog','BlogController@edit')->name('blog.edit');
    Route::post('update/blog','BlogController@update')->name('blog.update');
    Route::resource('video','VideoController');
    Route::resource('album','AlbumController');
    Route::resource('image','ImageController');
    Route::get('/image/add/{id}','ImageController@add')->name('image.add');
    Route::get('/image/list/{id}','ImageController@showImage')->name('show.list');
});
