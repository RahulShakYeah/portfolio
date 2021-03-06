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

Route::get('/','FrontEndController@sendTestimonial')->name('all');
Route::get('/blog','FrontEndController@getAllBlog')->name('get.blog');
Route::get('/blog/{id}/{slug}','FrontEndController@getSpecificBlog')->name('specific.blog');
Route::post('/search','FrontEndController@search')->name('blog.search');
Route::get('/contact','FrontEndController@contactView')->name('contact.view');
Route::post('/contactdata','FrontEndController@contactData')->name('contact.data');
Route::get('/video','FrontEndController@video')->name('video');
Route::get('/corona','CoronaController@index')->name('corona.index');
Route::get('/about','FrontEndController@aboutme')->name('about.me');
Route::get('/download',function(){
    $file = public_path()."/Rahul_CV.docx";
    $headers = array(
        'Content-Type: application/docx',
    );
    return Response::download($file,"Rahul_CV.docx",$headers);
});
Auth::routes(['register'=>false]);

Route::get('/home', 'HomeController@index')->name('home');

Route::group(['prefix'=>'admin','middleware'=>['auth','admin']],function(){
    Route::get('/','HomeController@admin')->name('admin');
    Route::get('/dashboard','UserController@dashboard')->name('dashboard');
    Route::resource('testimonial','TestimonialController');
    Route::resource('link','LinkController');
    Route::resource('portfolio','PortfolioController');
    Route::resource('user','UserController');
    Route::get('/password/{id}','UserController@openPasswordForm')->name('open.form');
    Route::post('/password/change','UserController@updatePassword')->name('update.password');
});

Route::group(['prefix'=>'blogger','middleware'=>['auth','blogger']],function(){
    Route::get('/','HomeController@blogger')->name('blogger');
    Route::get('/list','CategoryController@index')->name('blogger.list');
    Route::get('/create','CategoryController@create')->name('category.creation');
    Route::post('/store','CategoryController@store')->name('blogger.store');
    Route::get('/cat/edit/{id}','CategoryController@edit')->name('cat.edit');
    Route::post('/cat/update/{id}','CategoryController@update')->name('cat.update');
    Route::get('/{id}/delete','CategoryController@destroy')->name('blogger.destroy');
    Route::resource('blog','BlogController');
    Route::resource('video','VideoController');
    Route::resource('album','AlbumController');
    Route::resource('image','ImageController');
    Route::get('/image/add/{id}','ImageController@add')->name('image.add');
    Route::get('/image/list/{id}','ImageController@showImage')->name('show.list');
    Route::get('/album/name/edit/{id}','AlbumController@edit')->name('name.album');
    Route::post('/album/name/update','AlbumController@update')->name('name.update');
    Route::get('/video/edit/{id}','VideoController@edit')->name('edit.video');
    Route::post('/video/update','VideoController@update')->name('update.video');
});
