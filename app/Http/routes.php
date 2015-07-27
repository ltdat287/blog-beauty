<?php

/*
|--------------------------------------------------------------------------
| Application Routes
|--------------------------------------------------------------------------
|
| Here is where you can register all of the routes for an application.
| It's a breeze. Simply tell Laravel the URIs it should respond to
| and give it the controller to call when that URI is requested.
|
*/

// Blog pages
Route::get('/', function () {
    return redirect('/blog');
});
Route::get('blog', 'BlogController@index');
Route::get('blog/{slug}', 'BlogController@showPost');

//test api JSON response data;
Route::get('api/blogs', 'BlogController@getList');

//Admin pages
Route::get('admin', function () {
    return redirect('/admin/post');
});

// Route::get('/posts', );

Route::group(['namespace' => 'Admin', 'middleware' => 'auth'],
function () {
    resource('admin/post', 'PostController');
    resource('admin/tag', 'TagController');
    get('admin/upload', 'UploadController@index');
});

// Loggind in and log out
Route::get('/auth/login', 'Auth\AuthController@getLogin');
Route::post('/auth/login', 'Auth\AuthController@ ');
Route::get('/auth/logout', 'Auth\AuthController@getLogout');
