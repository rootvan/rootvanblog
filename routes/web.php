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
    return redirect('home');
});

Auth::routes();

//POSTS

//Tüm Postları Görüntüle
Route::get('/home', 'PostController@index')->name('home');

//Yeni Post oluştur Sayfası
Route::get('/posts/create','PostController@create');

//Yeni Post Oluştur
Route::post('/posts/create','PostController@store');

//Düzenle Sayfası

Route::get('/posts/{post}/edit','PostController@edit');


//Düzenle
Route::post('/posts/{post}','PostController@update');

//Tekil Post Görüntüle
Route::get('/posts/{post}', 'PostController@show');

//Sil
Route::delete('posts/{post}', 'PostController@destroy');





