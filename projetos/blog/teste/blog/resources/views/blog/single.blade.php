@extends('main')

@section('title', ' | '.$post->title)

@section('content')

	<div class="row">
		I am in the single
		<div class="col-md-8 col-md-offset-2">
			<img src="{{ asset('images/' . $post->image) }}" height="400" width="800" />
			<h1>{{ $post->title }}</h1>
			<p class="lead">{!! $post->body !!}</p>
			<hr>
			<p>Posted in: {{ $post->category->name }}</p>
		</div>
	</div>

	<div class="row">
		<div class="col-md-8 col-md-offset-2">
			<hr>
			<h1 class="comments-title">
				<span class="glyphicon glyphicon-comment">
				</span>
				{{ $post->comments()->count() }} Comentarios
			</h1><br>
			@foreach($post->comments as $comment)
				<div class="comment">
					<div class="author-info">
						<!-- <img src="/images/ironman.jpg" class="author-image"> -->
						<img class="author-image" src="{{ "https://www.gravatar.com/avatar/" . md5(strtolower(trim($comment->email))) . "?s=50&d=robohash" }}">
						<div class="author-name">
							<h4>{{ $comment->name }}</h4>
							<p class="author-time">{{ date('F nS, Y - g:i', strtotime($comment->created_at)) }}</p>
						</div>
					</div>
					<div class="comment-content">
						{{ $comment->comment }}
					</div>
				</div>
			@endforeach
		</div>
	</div>

	<div class="row">
		<div id="comment-form" class="col-md-8 col-md-offset-2" style="margin-top: 50px;">
			{{ Form::open(['route' => ['comments.store', $post->id], 'method' => 'POST']) }}
				<div class="row">
					<div class="col-md-6">
						{{ Form::label('name', 'Name:') }}
						{{ Form::text('name', null, ['class' => 'form-control']) }}
					</div>
					<div class="col-md-6">
						{{ Form::label('email', 'Email:') }}
						{{ Form::text('email', null, ['class' => 'form-control']) }}
					</div>
					<div class="col-md-12">
						{{ Form::label('comment', 'Comment:') }}
						{{ Form::textarea('comment', null, ['class' => 'form-control', 'rows' => '5']) }}

						{{ Form::submit('Add comment', ['class' => 'btn btn-success btn-block', 'style' => 'margin-top:50px;']) }}
					</div>
				</div>
			{{ Form::close() }}
		</div>
	</div>

@endsection()