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
	Route::get('about', function () { return view('pages.about'); });
	Route::get('contact', function () { return view('pages.contact'); });
	Route::get('/', 'postController@index');
	Route::resource('posts', 'PostController');
});
