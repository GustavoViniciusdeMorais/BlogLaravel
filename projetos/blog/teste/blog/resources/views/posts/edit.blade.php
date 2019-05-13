@extends('main')

@section('title', ' | Editar Post')

@section('stylesheets')
	{!! Html::style('css/parsley.css') !!}
	{!! Html::style('css/select2.min.css') !!}

	<!-- Editor de texto -->
<script src="https://code.jquery.com/jquery-3.2.1.slim.min.js"></script>
<link href="https://cdnjs.cloudflare.com/ajax/libs/summernote/0.8.11/summernote-lite.css" rel="stylesheet">
<script src="https://cdnjs.cloudflare.com/ajax/libs/summernote/0.8.11/summernote-lite.js"></script>

@endsection

@section('content')
	
	<div class="row"> <!-- form -->
	{!! Form::model($post, ['route' => ['posts.update', $post->id], 'method' => 'PUT', 'files' => true]) !!}

		<div class="col-md-8">
			{{ Form::label('title', 'Title:') }}
			{{ Form::text('title', null, ["class" => 'form-control input-lg']) }}

			{{ Form::label('slug', 'Slug:', ['class' => 'form-spacing-top']) }}
			{{ Form::text('slug', null, ["class" => 'form-control']) }}

			{{ Form::label('category_id', 'Category:', ['class' => 'form-spacing-top']) }}
			{{ Form::select('category_id', $categories, null, ['class' => 'form-control']) }}

			{{ Form::label('tags', 'Tags:' , ['class' => 'form-spacing-top']) }}
			{{ Form::select('tags[]', $tags, null, ['class' => 'form-control select2-multi', 'multiple' => 'multiple']) }}

			<img src="{{ asset('images/' . $post->image) }}" height="40" width="80" /	>
			{{ Form::label('featured_image', 'Update Featured Image:', ['class' => 'form-spacing-top']) }}
			{{ Form::file('featured_image') }}

			{{ Form::label('body', 'Content:', ['class' => 'form-spacing-top']) }}
			{{ Form::textarea('body', null, ["class" => 'form-control', 'id' => 'summernote']) }}
			<!-- o blade com ! nao faz echo na tela -->

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

		<div class="col-md-4">
			<div class="well">
				<dl class="dl-horizontal">
					<dt>Created At:</dt>
					<dd>{{ date('d/m/Y h:ia', strtotime($post->created_at)) }}</dd>
				</dl>

				<dl class="dl-horizontal">
					<dt>Updated At:</dt>
					<dd>{{ date('d/m/Y h:ia', strtotime($post->updated_at)) }}</dd>
				</dl>
				<hr>
				<div class="row">
					<div class="col-sm-6">
						{!! Html::linkRoute('posts.show', 'Cancel', array($post->id), array('class' => 'btn btn-danger btn-block')) !!}
					</div>
					<div class="col-sm-6">
						{{ Form::submit('Save Changes', ['class' => 'btn btn-success btn-clock']) }}
					</div>
				</div>
			</div>
		{!! Form::close() !!}
	</div> <!-- end form -->

</div>

@endsection

@section('scripts')
	{!! Html::script('js/select2.min.js') !!}
	<script type="text/javascript">
		$('.select2-multi').select2();
		
	</script>
@endsection