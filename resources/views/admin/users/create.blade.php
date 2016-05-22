@extends('layouts.admin')

@section('content')

	<h2>New User</h2>

	<hr>

	@if(Session::has('user_created') || Session::has('user_deleted') || Session::has('user_updated'))
		<div class="alert alert-success">
			<p>{{Session('user_created')}}</p>
			<p>{{Session('user_deleted')}}</p>
			<p>{{Session('user_updated')}}</p>
		</div>
	@endif	

	@include('errors.announcement')	
	@include('errors.error')


	<div class="form-group">
		
		{!! Form::open(['method'=>'POST', 'action'=>'AdminUsersController@store', 'files'=>true]) !!}

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
				{!! Form::submit('Send', ['class'=>'btn btn-success']) !!}
			</div>			
			


		{!! Form::close() !!}



	</div>

@endsection
