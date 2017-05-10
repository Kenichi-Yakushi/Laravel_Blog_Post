<?php

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| This file is where you may define all of the routes that are handled
| by your application. Just tell Laravel the URIs it should respond
| to using a Closure or controller method. Build something great!
|
*/
use Illuminate\Http\Request;
use Illuminate\Foundation\Http\PostRequest;


Route::group(['middleware' => ['web']], function () {

  // Route::get('/', function () {
  //   return "hello";
  // });
  //
  // Route::get('/{name}', function($name){
  //   return 'hello! ' . $name;
  // });

  Route::get('/', 'PostsController@login');
  Route::post('/', 'PostsController@login');

  Route::get('/post', 'PostsController@index');
  Route::post('/post', 'PostsController@index');

  Route::get('/post/{id}', 'PostsController@article');
  Route::post('/post/{id}', 'PostsController@article');

  Route::get('/edit', 'PostsController@create');
  Route::post('/edit', 'PostsController@create');

  Route::get('/edit/{id}', 'PostsController@edit');
  Route::post('/edit/{id}', 'PostsController@edit');

  Route::get('/upload/{id}', 'UploadController@create');
  Route::post('/upload/{id}', 'UploadController@store');

  // Route::get('/edits', 'PostsController@store');
  // Route::post('/edits', 'PostsController@store');
  // Route::get('/edits/{id}', 'PostsController@store');
  // Route::post('/edits/{id}', 'PostsController@store');

  Route::get('/delete/{id}','PostsController@delete');
  Route::post('/delete/{id}','PostsController@delete');

  Route::delete('/delete/{id}','PostsController@destroy');

});

Auth::routes();

Route::get('/home', 'HomeController@index');
