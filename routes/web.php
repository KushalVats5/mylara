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

Route::get('/', function () {
    return view('home');
});

Route::get('auth/siteAdmin','Admin\AdminController@index');
Route::post('auth/adminLogin','Admin\AdminController@adminLogin');

Route::group(['middleware' => 'is-admin'], function () {
	Route::get('auth/admin/profile','Admin\AdminController@profile');
	Route::post('auth/admin/changepassword','Admin\AdminController@changepassword');
 	Route::get('auth/admin','Admin\AdminController@dashboard');
 	Route::get('auth/admin/adduser','Admin\AdminController@adduser');
 	Route::post('auth/admin/saveuser','Admin\AdminController@saveuser');
 	Route::post('auth/admin/updateuser','Admin\AdminController@updateuser');
 	Route::get('auth/admin/user/edit/{id}','Admin\AdminController@edituser');
 	Route::get('auth/admin/users','Admin\AdminController@userlist');
	Route::get('auth/admin/user/del/{id}','Admin\AdminController@deleteuser');
	Route::post('auth/admin/user/isactive','Admin\AdminController@isactive');
	
	Route::get('auth/admin/add/{type}','Admin\PostController@create');
	Route::get('auth/admin/add/{type}/{id}','Admin\PostController@create');
	Route::post('auth/admin/post/store','Admin\PostController@store');
	Route::post('auth/admin/post/update/{id}','Admin\PostController@update');
	Route::get('auth/admin/posts','Admin\PostController@showposts');
	Route::get('auth/admin/post/del/{id}','Admin\PostController@deletepost');


	Route::get('auth/admin/upload-image','Admin\FileController@index');
	Route::post('auth/admin/upload-image',['as'=>'image.upload','uses'=>'Admin\FileController@uploadImages']);

	Route::get('auth/admin/image-gallery', 'Admin\ImageGalleryController@index');
	Route::post('auth/admin/image-gallery', 'Admin\ImageGalleryController@upload');
	Route::delete('auth/admin/image-gallery/{id}', 'Admin\ImageGalleryController@destroy');
});

Route::group(['middleware' => 'is-subscriber'], function () {
   	Route::get('auth/dashboard','AuthController@successlogin');
   	Route::get('auth/successlogin','AuthController@successlogin');
});


Route::get('auth/login','AuthController@index');

Route::post('auth/checkauth','AuthController@checkauth');

Route::get('auth/logout','AuthController@logout');

Route::get('auth/register','RegisterController@index');

Route::post('/store','RegisterController@store');

Route::get('auth/user/edit/{id}','RegisterController@edit');

Route::post('user/update/','RegisterController@update');

Route::get('/post/{slug}', 'HomeController@showpost');
Auth::routes();

