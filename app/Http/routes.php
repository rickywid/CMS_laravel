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

Route::get('/', ['uses'=>'PostsController@index']);
Route::resource('/post', 'PostsController');
Route::resource('/admin/user', 'UserProfileController');


Route::auth();

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


