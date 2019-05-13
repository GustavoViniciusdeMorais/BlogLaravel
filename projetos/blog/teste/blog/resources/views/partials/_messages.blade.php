@if (Session::has('success'))
	
	<div class="alert alert-success" role="alert">
		<strong>Success:</strong> {{ Session::get('success') }}
	</div>

@endif

@if (count($errors) > 0)
<!-- Ele sempre retorna algum tipo de erro
		Por isso para validar o erro vamos fazer
		contagem de valores dentro do array errors
		se for mais que 0 entra no if
 -->
 	<div class="alert alert-danger" role="alert">
 		<strong>Errors:</strong><ul>
 		@foreach($errors->all() as $error)
 			<li>{{ $error }}</li>
 		@endforeach
 		</ul>
 	</div>

@endif