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

	// Authentication routes
	Route::get('auth/login', ['uses'=>'Auth\LoginController@getLogin', 'as'=>'login']);
	Route::post('auth/login', ['uses'=>'Auth\LoginController@postLogin', 'as'=>'login']);
	Route::get('auth/logout', ['uses'=>'Auth\LoginController@getLogout', 'as'=>'logout']);

	// User routes
	Route::get('users', ['uses'=>'UserController@index', 'as'=>'users']);
	Route::get('user/{id}', ['uses'=>'UserController@edit', 'as'=>'users.edit']);
	Route::put('user/{id}', ['uses'=>'UserController@store', 'as'=>'users.edit']);
	Route::delete('users/{id}', ['uses'=>'UserController@destroy', 'as'=>'users.delete']);

	// Authentication routes
	Route::get('auth/register', ['uses'=>'Auth\RegisterController@getRegister', 'as'=>'register']);
	Route::post('auth/register', ['uses'=>'Auth\RegisterController@postRegister', 'as'=>'register']);

	// Category Routes
	Route::resource('categories', 'CategoryController', ['except'=>['create']]);

	// Tags Routes
	Route::resource('tags', 'TagController', ['except'=>['create']]);

	// Blog Routes for frontend
	Route::get('/blog/{slug}', ['as'=>'blog.single', 'uses'=>'blogController@getSingle'])->where( 'slug', '[\w\d\-\_]+');
	Route::get('/blog', ['uses'=>'blogController@index', 'as'=>'blog']);

	// Post routes for backend
	Route::resource('posts', 'PostController');

	// Mail templates
	Route::get('mailable', 'PageController@mailTemplate');
	

	// Static pages
	Route::get('about', 'pageController@about');
	Route::get('contact', ['as' => 'contact', 'uses'=>'pageController@getContact']);
	Route::post('contact', ['as' => 'contact', 'uses' => 'pageController@postContact']);
	Route::get('/{slug}', ['as'=>'single', 'uses'=>'blogController@getSingle'])->where( 'slug', '[\w\d\-\_]+');
	Route::get('/', 'pageController@home');
});
