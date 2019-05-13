@extends('main')

@section('title', ' | '.$comment->name)

@section('content')
	
	<div class="row">
		<div class="col-md-8 col-md-offset-2">
			<h1>Edit Comment</h1>	

			{{ Form::model($comment, ['route' => ['comments.update', $comment->id], 'method' => 'PUT']) }}

				{{ Form::label('name', 'Name:') }}
				{{ Form::text('name', null, ['class' => 'form-control', 'disable' => '']) }}

				{{ Form::label('email', 'Email:') }}
				{{ Form::text('email', null, ['class' => 'form-control', 'disable' => '']) }}

				{{ Form::label('comment', 'Comment:') }}
				{{ Form::textarea('comment', null, ['class' => 'form-control', 'disable' => '']) }}

				{{ Form::submit('Update Comment', ['class' => 'btn btn-block btn-success', 'style' => 'margin-top: 15px;']) }}

			{{ Form::close() }}
		</div>
	</div>

@endsection()