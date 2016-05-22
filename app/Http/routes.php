<?php

use Illuminate\Support\Facades\Auth;

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

// User Login/Registration
Route::auth();

// Root path
Route::get('/', ['uses'=>'PostsController@index']);

// Posts
Route::resource('/post', 'PostsController');

// Logged In User Profile
Route::resource('/admin/user', 'UserProfileController');

// Logged In User Profile Edit Page
Route::get('/admin/users/{id}/edit', ['uses'=>'AdminUsersController@edit']);

// Logged In User Profile Edit/Update Patch Route
Route::patch('/admin/users/{id}', ['uses'=>'AdminUsersController@update']);

// Comment Replies Route
Route::post('/post/reply', ['uses'=>'PostRepliesController@store']);


// Admin Routes
Route::group(['middleware'=>'admin'], function(){
	

	Route::get('/admin', ['as'=>'admin.index', function(){


		$user = Auth::user();

		return view('admin.index', compact('user'));		
	}]);

	Route::resource('/admin/posts', 'AdminPostsController');
	Route::resource('/admin/users', 'AdminUsersController');

	Route::resource('/admin/categories', 'AdminCategoriesController');
	Route::resource('/admin/media', 'AdminMediasController');
	Route::resource('/admin/comments', 'AdminCommentsController');
	Route::resource('/admin/replies', 'RepliesController');
});


