@extends('layouts.admin')

@section('content')

	<h2>Edit User</h2>

	<hr>	

	@include('errors.announcement')	
	@include('errors.error')


	<div class="col-md-4">
		
		<img src="{{$user->photo->filename}}" alt="">

	</div>

	<div class="col-md-8">

	{!! Form::model($user, ['method'=>'PATCH', 'action'=>['AdminUsersController@update', $user->id], 'files'=>true]) !!}


			<div class="form-group">
				{!! Form::label('name', 'Name') !!}
				{!! Form::text('name', null, ['class'=>'form-control']) !!}				
			</div>

			<div class="form-group">
				{!! Form::label('email', 'Email') !!}
				{!! Form::email('email', null, ['class'=>'form-control']) !!}				
			</div>

			<div class="form-group">
				{!! Form::label('is_active', 'Active') !!}
				{!! Form::radio('is_active', '1') !!}	

				{!! Form::label('email', 'Inactive') !!}	
				{!! Form::radio('is_active', '0') !!}		
			</div>	

			<div class="form-group">
				{!! Form::label('role', 'Role') !!}
				{!! Form::select('role_id', $role) !!}		
			</div>			

			<div class="form-group">
				{!! Form::label('password', 'Password') !!}
				{!! Form::password('password', ['class'=>'form-control']) !!}				
			</div>	


			<div class="form-group">
				{!! Form:: label('filename', 'Profile Picture') !!}
				{!! Form::file('filename') !!}
			</div>						


			<div class="form-group">
				{!! Form::submit('Save', ['class'=>'btn btn-success']) !!}
			</div>	
		

	{!! Form::close() !!}		
	</div>


@endsection
