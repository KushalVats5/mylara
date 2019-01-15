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

// Admin login
Route::get('auth/siteAdmin','Admin\AdminController@index');
// Admin login success
Route::post('auth/adminLogin','Admin\AdminController@adminLogin');
// Admin middelware
Route::group(['middleware' => 'is-admin'], function () {
	// Show admin profile
	Route::get('auth/admin/profile','Admin\AdminController@profile');
	// Update change password
	Route::post('auth/admin/changepassword','Admin\AdminController@changepassword');
	// Admin dashboard
 	Route::get('auth/admin','Admin\AdminController@dashboard');
 	// Admin add user
 	Route::get('auth/admin/adduser','Admin\AdminController@adduser');
 	// Admin save user
 	Route::post('auth/admin/saveuser','Admin\AdminController@saveuser');
 	// Admin edit user
 	Route::get('auth/admin/user/edit/{id}','Admin\AdminController@edituser');
 	// Admin update user
 	Route::post('auth/admin/updateuser','Admin\AdminController@updateuser');
 	// Admin all users list
 	Route::get('auth/admin/users','Admin\AdminController@userlist');
 	// Admin delete specific user
	Route::get('auth/admin/user/del/{id}','Admin\AdminController@deleteuser');
	// Admin change status
	Route::post('auth/admin/user/isactive','Admin\AdminController@isactive');
	
	// Add post
	Route::get('auth/admin/add/post','Admin\PostController@create')->name('add-post');
	// Add page
	Route::get('auth/admin/add/page','Admin\PostController@create')->name('add-page');
	// Edit post
	Route::get('auth/admin/add/post/{id}','Admin\PostController@create')->name('edit-post');
	// Edit Page
	Route::get('auth/admin/add/page/{id}','Admin\PostController@create')->name('edit-page');
	// Save post & page
	Route::post('auth/admin/post/store','Admin\PostController@store');
	// Update post & page
	Route::post('auth/admin/post/update/{id}','Admin\PostController@update');
	// Show All post
	Route::get('auth/admin/posts','Admin\PostController@index');
	// Show All page
	Route::get('auth/admin/pages','Admin\PostController@pages')->name('pages');
	// Delete post
	Route::get('auth/admin/post/del/{id}','Admin\PostController@deletepost');
	// Add category
	Route::get('auth/admin/category',['uses'=>'Admin\CategoryController@manageCategory']);
	// Save category
	Route::post('auth/admin/add-category',['as'=>'add.category','uses'=>'Admin\CategoryController@addCategory']);
	// Upload images 
	Route::post('images-upload', 'Admin\PostController@imagesUploadPost')->name('images.upload');
	// Delete slide ( post / page )
	Route::post('auth/admin/del/slide', 'Admin\PostController@delslide');
	
	Route::get('auth/admin/country', 'Admin\CountryStateCityController@index')->name('add.country');
	Route::post('auth/admin/store', 'Admin\CountryStateCityController@store')->name('country.store');

	Route::get('auth/admin/state', 'Admin\CountryStateCityController@state')->name('add.state');
	Route::post('auth/admin/storestate', 'Admin\CountryStateCityController@storestate')->name('state.store');

	Route::get('auth/admin/city', 'Admin\CountryStateCityController@city')->name('add.city');
	Route::get('auth/admin/city/{id}', 'Admin\CountryStateCityController@city')->name('edit.city');
	Route::post('auth/admin/storecity', 'Admin\CountryStateCityController@storecity')->name('city.store');

	Route::get('auth/admin/get-state-list','Admin\CountryStateCityController@getStateList')->name('get.statelist');;
});

// Subscriber middelware
Route::group(['middleware' => 'is-subscriber'], function () {
	// User dashboard
   	Route::get('auth/dashboard','AuthController@successlogin');
   	// User login success
   	Route::get('auth/successlogin','AuthController@successlogin');
});

// User Login
Route::get('auth/login','AuthController@index')->name('user-login');
// User check authentication
Route::post('auth/checkauth','AuthController@checkauth');
// User logout
Route::get('auth/logout','AuthController@logout');
// User register
Route::get('auth/register','RegisterController@index');
// User save
Route::post('/store','RegisterController@store');
// User edit
Route::get('auth/user/edit/{id}','RegisterController@edit');
// User update
Route::post('user/update/','RegisterController@update');
// Display single post
Route::get('/post/{slug}', 'PostController@index');
// Display contact us page
Route::get('contact-us', 'ContactUSController@contactUS');
// Save contact us page query
Route::post('contact-us', ['as'=>'contactus.store','uses'=>'ContactUSController@contactUSPost']);

Route::post('/comment/store', 'CommentController@store')->name('comment.add');
Route::post('/reply/store', 'CommentController@replyStore')->name('reply.add');
// 404 page
Route::get('/404', function () {
    return view('404');
});
Auth::routes();

