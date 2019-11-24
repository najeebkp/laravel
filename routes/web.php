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

Route::get('', 'HomeController@index');
Route::get('/new-post',['uses'=>'PostController@create']);
Route::post('/new-post', [
'uses'=>'PostController@postCreatePost',
'as'=>'post.create'
]);
Route::get('/posts','PostController@show');
Route::get('/post_details/{slug}',['as'=>'blog.single','uses'=>'PostController@details'])->where('slug','[\w\d\-\_]+');
Route::get('/category/{category}',['as'=>'blog.single','uses'=>'PostController@category'])->where('category','[\w\d\-\_]+');
Route::get('/post_list_admin','PostController@mypost')->name('postlist');
Route::get('/post_details/{slug}/edit',['uses'=>'PostController@edit','as'=>'post.edit']);
Route::post('/post_details/{slug}/edit',['uses'=>'PostController@update','as'=>'post.update']);
Route::get('/post_details/{slug}/delete',['uses'=>'PostController@delete','as'=>'post.delete']);
Route::get('/changePassword/{id}',['uses'=>'PostController@showChangePasswordForm','as'=>'wordpass']);
Route::post('/changePassword/{id}',['uses'=>'PostController@changepass','as'=>'wordpass.change']);
Auth::routes();
Route::get('/home', 'HomeController@index')->name('home');
