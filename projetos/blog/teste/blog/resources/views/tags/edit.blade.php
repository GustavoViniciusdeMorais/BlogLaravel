@extends('main')

@section('title', ' | Edit Tag')

@section('content')

	<div class="row">
		<div class="col-md-8">
			{{ Form::model($tag, ['route' => ['tags.update', $tag->id], 'method' => 'PUT']) }}

				{{ Form::label('name', 'Name:') }}
				{{ Form::text('name', null, ['class' => 'form-control input-lg']) }}

				{{ Form::submit('Save Changes', ['class' => 'btn btn-primary btn-block', 'style' => 'margin-top:10px;']) }}
			{{ Form::close() }}
		</div>
	</div>

@endsection()