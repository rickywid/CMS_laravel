@extends('layouts.admin')

@section('content')

	<h2>{{$user->name}}</h2>

	<hr>

	<div class="col-sm-4">
		<img src="{{$user->photo->filename}}" class="img-responsive" alt="">

		<hr>
		
		<div class="alert alert-success">
			<ul>
				<li><b>Joined: </b>{{$user->created_at->toCookieString()}}</li>
				<li><b>Blog Posts Count: </b>{{count($user->posts()->get())}}</li>
				<li><b>User Role: </b>{{$user->role->name}}</li>
			</ul>			
		</div>

	</div>

	<div class="col-sm-8">

		<h3>Blog Posts</h3>
			
		@foreach($posts as $post)

			<table class="table">
				<thead>
					<tr>
						<th>Title</th>
						<th>Created</th>
					</tr>
				</thead>
				<tbody>
					<tr>
						<td><a href="{{route('post.show', $post->id)}}">{{$post->title}}</a></td>
						<td>{{$post->created_at}}</td>
					</tr>
				</tbody>

			</table>	

		@endforeach

	</div>


@endsection