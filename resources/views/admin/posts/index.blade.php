@extends('layouts.admin')

@section('content')

	<h2>POSTS</h2>

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
			</tr>
		</thead>
		<tbody>

		@foreach($posts as $post)
			<tr>
				<td>{{$post->id}}</td>
				<td>{{$post->title}}</td>
				<td>{{$post->user->name}}</td>
				<td><img src="{{$post->photo->filename}}" height="50" alt=""></td>
				<td>{{$post->created_at}}</td>
				<td>{{$post->updated_at}}</td>
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