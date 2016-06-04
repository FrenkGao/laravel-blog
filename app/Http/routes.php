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
//blog pages
Route::get('/', function () {
    return redirect('/blog');
});
Route::get('blog','BlogController@index');
Route::get('blog/{slug}','BlogController@showPost');

//admin area
Route::get('admin',function(){
   return redirect('/admin/post');
});
Route::group(['namespace'=>'Admin','prefix'=>'admin','middleware'=>'auth'],function(){
    resource('post','PostController');
    resource('tag','TagController',['except'=>'show']);
    get('upload','UploadController@index');
});

//login and logout
Route::group(['namespace'=>'Auth','prefix'=>'auth'],function(){
    get('login','AuthController@getLogin');
    post('login','AuthController@postLogin');
    get('logout','AuthController@getLogout');
});
