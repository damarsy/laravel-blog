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
//route for blog tags
Route::get('blog/tag/{slug}', array('as' => 'blog.tag', 'uses' => 'BlogController@getTag'));

//route for CRUD of tags
Route::resource('tag', 'TagController', ['except' => ['edit', 'update']]);

//route for CRUD of categories
Route::resource('category', 'CategoryController', ['except' => ['edit', 'update']]);

//route for blog categories
Route::get('blog/category/{slug}', array('as' => 'blog.category', 'uses' => 'BlogController@getCategory'));

//route for authentication
Auth::routes();

//route for showing posts using slug
Route::get('blog/{slug}', array('as' => 'blog.show', 'uses' => 'BlogController@getShow'));

//route for CRUD of posts
Route::resource('post', 'PostController');

//route for contact page
Route::get('contact', 'PageController@getContact');
Route::post('contact', 'PageController@postContact');

//route for about page
Route::get('about', 'PageController@getAbout');

//route for home page
Route::get('/', 'PageController@getIndex');
