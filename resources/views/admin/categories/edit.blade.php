@extends('layouts.admin')



@section('content')

	<h1>Edit Category</h1>

	<hr>	

		<div class="col-sm-6">
			{!! Form::model($category, ['method'=>'PATCH', 'action'=>['AdminCategoriesController@update', $category->id]]) !!}

				<div class="form-group">
					{!! Form::label('name', 'Category Name') !!}
					{!! Form::text('name', null, ['class'=>'form-control']) !!}					
				</div>

				
				<div class="form-group">
					{!! Form::submit('Save', ['class'=>'btn btn-primary']) !!}	
				</div>
				

			{!! Form::close() !!}
		</div>	

@endsection