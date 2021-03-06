@extends('layouts.admin')


@section('content')

	<h1>ADMIN AREA</h1>

	<hr>

	<div class="alert alert-warning">
		<p>

		This area is restricted to Administrators only. If you are not an Administrator, please leave immediately or face the consequences. 

		</p>
	</div>

	@include('errors.announcement')	

	<b><p class="pull-right">Logged in as: {{Auth::user()->name}}</p></b>

	<h4>OVERVIEW OF APPLICATION</h4>

	<p>
		A CMS application built with PHP's Laravel framework. 
	</p>

	<hr>

	<h4>FEATURES</h4>
	<ul>
		<li>CRUD actions for Users, Posts, Comments, Comments Replies, Media Files</li>
		<li>User login and registration</li>
		<li>Confirmation of comments before displaying on post page</li>
		<li>Allow only logged in users to leave comments on blog posts</li>
		<li>Form Validations</li>
		<li>Restrict admin area to Administrators and active users only</li>
		<li>Password resets</li>
		<li>View and edit logged in user's profile page</li>
	</ul>


	<p>View <a href="https://github.com/rickywid/CMS_laravel">source</a> on Github</p>
@endsection 