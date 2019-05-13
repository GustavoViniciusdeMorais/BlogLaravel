@extends('main')

@section('title',' | Create new Post')

@section('stylesheets')

{!! Html::style('css/parsley.css') !!}
{!! Html::style('css/select2.min.css') !!}

<!-- Editor de texto -->
<script src="https://code.jquery.com/jquery-3.2.1.slim.min.js"></script>
<link href="https://cdnjs.cloudflare.com/ajax/libs/summernote/0.8.11/summernote-lite.css" rel="stylesheet">
<script src="https://cdnjs.cloudflare.com/ajax/libs/summernote/0.8.11/summernote-lite.js"></script>

@endsection

@section('content')

<div class="row">
	<div class="col-md-8 col-md-offset-2">
		<h1>Create New Post</h1>
		<hr>

		{!! Form::open(['route' => 'posts.store', 'data-parsley-validate' => '', 'files' => true]) !!}
		{{ Form::label('title', 'Title:') }}
		{{ Form::text('title', null, array('class' => 'form-control', 'required' => '', 'maxlength' => '254')) }}

		{{ Form::label('slug', 'Slug:') }}
		{{ Form::text('slug', null, array('class' => 'form-control', 'required' => '', 'minlength' => '5', 'maxlength' => '254')) }}

		{{ Form::label('category', 'Category:') }}
		<select class="form-control" name="category_id">
			@foreach($categories as $category)

			<option value="{{ $category->id }}"> {{ $category->name }} </option>

			@endforeach
		</select>

		{{ Form::label('tags', 'Tags:') }}
		<select class="form-control select2-multi" name="tags[]" multiple="multiple">
			@foreach($tags as $tag)

			<option value="{{ $tag->id }}"> {{ $tag->name }} </option>

			@endforeach
		</select>

		{{ Form::label('featured_image', 'Upload Featured Image:') }}
		{{ Form::file('featured_image') }}

		{{ Form::label('body', 'Post Body:') }}
		{{ Form::textarea('body', null, array('class' => 'form-control', 'required' => '', 'id' => 'summernote')) }}

		{{ Form::submit('Create Post', array('class' => 'btn btn-success btn-lg btn-block', 'style' => 'margin-top: 20px;')) }}
		{!! Form::close() !!}

		<!-- Editor de texto -->
		<!--
			colocar 'id' => 'summernote' no array do Form::textarea
		-->
		<script>
			$('#summernote').summernote({
				placeholder: 'Hello stand alone ui',
				tabsize: 2,
				height: 100
			});
		</script>
	</div>
</div>

@endsection

@section('scripts')
{!! Html::script('js/select2.min.js') !!}
<script type="text/javascript">
	$('.select2-multi').select2();
</script>
	<!--<script src="https://cloud.tinymce.com/5/tinymce.min.js"></script>
		<script>tinymce.init({selector:'textarea'});</script> -->
@endsection
