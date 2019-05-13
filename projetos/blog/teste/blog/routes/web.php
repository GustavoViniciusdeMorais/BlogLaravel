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

// Login routes
Route::get('auth/login', 'Auth\LoginController@showLoginForm')->name("login");
Route::post('auth/login', 'Auth\LoginController@login');
Route::post('auth/logout', 'Auth\LoginController@logout')->name("logout");

// Registration routes
Route::get('auth/register', 'Auth\RegisterController@showRegistrationForm');
Route::post('auth/register', 'Auth\RegisterController@register');

// Passwords Resets routes
Route::get('password/reset', 'Auth\ForgotPasswordController@showLinkRequestForm');
Route::post('password/email', 'Auth\ForgotPasswordController@sendResetLinkEmail');
Route::get('password/reset/{token}', 'Auth\ResetPasswordController@showResetForm');
Route::post('password/reset', 'Auth\ResetPasswordController@reset');

// Categories
Route::resource('categories', 'CategoryController', ['except' => ['create']]);

// Tags
Route::resource('tags', 'TagController', ['except' => ['create']]);

Route::get('blog/{slug}', ['as' => 'blog.single', 'uses' => 'BlogController@getSingle'])->where('slug', '[\w\d\-\_]+');
Route::get('contact', 'PagesController@getContact');

// Enviar emails
Route::get('feedback', 'PagesController@sendFeedback');
Route::post('feedback', 'PagesController@sendFeedback');

// Comments
Route::post('comments/{post_id}', ['as' => 'comments.store', 'uses' => 'CommentController@store']);
Route::get('comment/{id}/edit', ['as' => 'comments.edit', 'uses' => 'CommentController@edit']);
Route::put('comment/{id}', ['as' => 'comments.update', 'uses' => 'CommentController@update']);
Route::delete('comment/{id}', ['as' => 'comments.destroy', 'uses' => 'CommentController@destroy']);
Route::get('comments/{id}/delete', ['as' => 'comments.delete', 'uses' => 'CommentController@delete']);

Route::get('blog', ['uses' => 'BlogController@getIndex', 'as' => 'blog.index']);
Route::get('about', 'PagesController@getAbout');
Route::get('/', 'PagesController@getIndex');
Route::get('/home', 'PagesController@getIndex');
Route::get('create','PostController@create');
Route::get('posts','PostController@index');
Route::resource('posts', 'PostController');

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');
