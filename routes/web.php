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
	Route::get('login', ['uses'=>'Auth\LoginController@getLogin', 'as'=>'login']);
	Route::post('login', ['uses'=>'Auth\LoginController@postLogin', 'as'=>'login']);
	Route::get('logout', ['uses'=>'Auth\LoginController@getLogout', 'as'=>'logout']);

	// User routes
	Route::resource('user', 'UserController', ['except'=>['create', 'store']]);

	// Authentication routes
	Route::get('register', ['uses'=>'Auth\RegisterController@getRegister', 'as'=>'register']);
	Route::post('register', ['uses'=>'Auth\RegisterController@postRegister', 'as'=>'register']);

	// Category Routes
	Route::resource('categories', 'CategoryController', ['except'=>['create']]);

	// Tags Routes
	Route::resource('tags', 'TagController', ['except'=>['create']]);

	// Blog Routes for frontend
	Route::get('/blog/{slug}', ['as'=>'blog.single', 'uses'=>'BlogController@getSingle'])->where( 'slug', '[\w\d\-\_]+');
	Route::get('/blog', ['uses'=>'BlogController@index', 'as'=>'blog']);

	// Post routes for backend
	Route::resource('posts', 'PostController');

	// Post routes for backend
	Route::resource('comments', 'CommentController', ['except'=>['create']]);

	Route::resource('messages', 'MessageController', ['except'=>['create']]);

	// Mail templates
	Route::get('mailable', 'PageController@mailTemplate');
	

	// Static pages
	Route::get('about', 'PageController@about');
	Route::get('contact', ['as' => 'contact', 'uses'=>'MessageController@show']);
	Route::post('contact', ['as' => 'contact', 'uses' => 'MessageController@save']);
	// Route::get('/{slug}', ['as'=>'single', 'uses'=>'blogController@getSingle'])->where( 'slug', '[\w\d\-\_]+');
	Route::get('/', 'PageController@home');
});
