@extends('main')

@section('title', ' | Posts')

@section('content')

	<div class="row">
		<div class="col-md-8 col-md-offset-2">
			<h1>Blog</h1>
		</div>
	</div>

	@foreach($posts as $post)
		<div class="row">
			<div class="col-md-8 col-md-offset-2">
				<h2>{{ $post->title }}</h2>
				<h5>Created at: {{ date('d/m/Y h:ia', strtotime($post->updated_at)) }}</h5>

				<p>{!! substr($post->body, 0, 400) !!} {{ strlen($post->body) > 400 ? "..." : "" }}</p>

				<a href="{{ url('blog/'.$post->slug) }}" class="btn btn-primary" >Read more.</a>
				<hr>
			</div>
		</div>
	@endforeach

	<div class="text-center">
		{!! $posts->links(); !!}
	</div>

@endsection()