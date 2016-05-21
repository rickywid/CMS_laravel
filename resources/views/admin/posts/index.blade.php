@extends('layouts.admin')

@section('content')

	<h2>POSTS</h2>

	@if(Session::has('post_created') || Session::has('post_updated') || Session::has('post_deleted'))

		<div class="alert alert-success">
			<p>{{Session('post_created')}}</p>
			<p>{{Session('post_updated')}}</p>
			<p>{{Session('post_deleted')}}</p>
		</div>

	@endif	

	<table class="table">
		<thead>
			<tr>
				<th>ID</th>
				<th>Title</th>
				<th>Author</th>
				<th>Image</th>
				<th>Created</th>
				<th>Last Updated</th>
				<th>&nbsp;</th>
				<th>&nbsp;</th>
				<th>&nbsp;</th>
			</tr>
		</thead>
		<tbody>

		@foreach($posts as $post)
			<tr>
				<td>{{$post->id}}</td>
				<td>{{$post->title}}</td>
				<td>{{$post->user->name}}</td>
				<td><img src="{{$post->photo ? $post->photo->filename : 'http://placehold.it/400x400' }}" height="50" alt=""></td>
				<td>{{$post->created_at}}</td>
				<td>{{$post->updated_at}}</td>
				<td><a href="{{route('post.show', $post->id)}}" class="btn btn-success">View Post</a></td>
				<td><a href="{{route('admin.posts.edit', $post->id)}}" class="btn btn-info">Edit</a></td>				
				<td>
					
					{!! Form::open(['method'=>'delete', 'action'=>['AdminPostsController@destroy', $post->id]]) !!}

						{!! Form::submit('Delete', ['class'=>'btn btn-danger']) !!}

					{!! Form::close() !!}


				</td>				
			</tr>
		@endforeach
		</tbody>
	</table>
@endsection