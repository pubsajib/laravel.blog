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

// Backend
// Route::group(['middleware' => ['web', 'adminAuth']], function() {});

// Frontend
Route::group(['middleware' => ['web']], function () {

	// Blog Routes for frontend
	// Route::get('/blog/{slug}', 'blogController@getSingle')->name('blog.single')->where( 'slug', '[\w\d\-\_]+');
	Route::get('/blog/{slug}', ['as'=>'blog.single', 'uses'=>'blogController@getSingle'])->where( 'slug', '[\w\d\-\_]+');
	Route::get('/blog', ['uses'=>'blogController@index', 'as'=>'blog']);

	// Static pages
	Route::get('about', 'pageController@about');
	Route::get('contact', 'pageController@contact');
	Route::get('/', 'pageController@home');

	// Post routes for backend
	Route::resource('posts', 'PostController');
});
