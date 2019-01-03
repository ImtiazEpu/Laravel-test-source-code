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

Route::get('/', 'Backend\FrontController@index')->name('index');

Route::group(['middleware' => 'auth'], function () {
	Route::get('/dashboard', 'Backend\FrontController@showDashboard')->name('dashboard');
	Route::get('/logout', 'Backend\FrontController@logout')->name('logout');
});

Route::get('/register', 'Backend\FrontController@showRegistrationForm')->name('register');
Route::post('/register', 'Backend\FrontController@procssRegistration');

Route::get('/login', 'Backend\FrontController@showLoginForm')->name('login');
Route::post('/login', 'Backend\FrontController@procssLogin');

Route::get('/post', 'Backend\FrontController@post')->name('post');

//Categories
Route::get('/categories', 'Backend\CategoryController@index')->name('categories.index');
Route::get('/categories/add', 'Backend\CategoryController@create')->name('categories.create');
Route::post('/categories', 'Backend\CategoryController@store')->name('categories.store');
Route::get('/categories/{id}', 'Backend\CategoryController@show')->name('categories.show');
Route::get('/categories/{id}/edit', 'Backend\CategoryController@edit')->name('categories.edit');
Route::put('/categories/{id}', 'Backend\CategoryController@update')->name('categories.update');
Route::delete('/categories/{id}', 'Backend\CategoryController@delete')->name('categories.delete');

//Post

Route::resource('/posts', 'Backend\PostController');

// Route::name('backend.')->namespace('Backend')->prefix('backend')->group(function () {
// 	Route::get('/', 'FrontController@index')->name('index');
// 	Route::get('/users', 'UsersController@index')->name('users.index');

// 	Route::resource('posts', 'PostsController');

// });
