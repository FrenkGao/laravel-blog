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
Route::get('/', 'BlogController@index');
Route::get('blog','BlogController@index');

//admin area
Route::get('admin',function(){
   return redirect('/admin/post');
});
Route::group(['namespace'=>'Admin','prefix'=>'admin','middleware'=>'auth'],function(){
    resource('post','PostController',['except'=>'show']);
    resource('tag','TagController',['except'=>'show']);
    //file uploads
    get('upload','UploadController@index');
    post('upload/file','UploadController@uploadFile');
    delete('upload/file','UploadController@deleteFile');
    post('upload/folder','UploadController@createFolder');
    delete('upload/folder','UploadController@deleteFolder');
    //modify password & name
    get('modify','UserController@modifyPassword');
    post('modify','UserController@updatePassword');
});

//auth and password
Route::controllers([
    'auth'=>'Auth\AuthController',
    'password'=>'Auth\PasswordController'
]);


Route::get('blog/{id}','BlogController@showPost');
//contact
Route::get('contact','ContactController@showForm');
Route::post('contact','ContactController@sendContactInfo');

//rss路由
Route::get('rss','BlogController@rss');
//站点地图
get('sitemap.xml', 'BlogController@siteMap');