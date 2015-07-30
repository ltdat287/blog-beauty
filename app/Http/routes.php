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

Route::get('/test', function() {
    return view('test');
});

Route::get('/retest', function() {
    return Redirect::to('test')->with('message', 'You need login!');
});

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
    Route::resource('admin/post', 'PostController');
    Route::resource('admin/tag', 'TagController');

    // Add routes for upload file and folder
    Route::get('admin/upload', 'UploadController@index');
    Route::post('admin/upload/file', 'UploadController@uploadFile');
    Route::delete('admin/upload/file', 'UploadController@deleteFile');
    Route::post('admin/upload/folder', 'UploadController@createFolder');
    Route::delete('admin/upload/folder', 'UploadController@deleteFolder');
});

// Loggind in and log out
Route::get('/auth/login', 'Auth\AuthController@getLogin');
Route::post('/auth/login', 'Auth\AuthController@postLogin');
Route::get('/auth/logout', 'Auth\AuthController@getLogout');
