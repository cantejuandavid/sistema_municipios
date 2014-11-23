@extends('index')

@section('content')
		{{ HTML::script('frameworks/ckeditor/ckeditor.js') }}
	<div class="sistema">
		<div class="buttons">
			{{ HTML::linkRoute('getSistema', 'Atrás','', array('class'=>'btn btn-red')) }}	
		</div>
		<div class="content">
			<div class="title">Nuevo Municipio</div>

			<div class="form">
				{{ Form::open(array('url' => 'sistema/municipio/crear')) }}

					<div class="bloque">
						{{ Form::label('nombre','Nombre:') }}													
						{{ Form::text('nombre', null, array('class'=>'form-control', 'id'=>'nombre', 'required')) }}							
					</div>
					<div class="bloque">
						{{ Form::label('otros_nombres','Otros nombres:') }}													
						{{ Form::text('otros_nombres', null, array('class'=>'form-control', 'id'=>'otros_nombres')) }}							
					</div>
					<div class="bloque">
						{{ Form::label('gentilicio','Gentilicio:') }}													
						{{ Form::text('gentilicio', null, array('class'=>'form-control', 'id'=>'gentilicio', 'required')) }}							
					</div>
					<div class="bloque">							
						{{ Form::label('habitantes', 'Habitantes: ') }}							
						{{ Form::password('habitantes', array('class'=>'form-control', 'id'=>'habitantes', 'required')) }}							
					</div>
					<div class="bloqueDescripcion">
						<label for="descripcion">Descripción: </label>
						<textarea name="descripcion" id="editor1" rows="10" cols="80" class="form-control">
				        	This is my textarea to be replaced with CKEditor.
				        </textarea>
				        <script>
				            CKEDITOR.replace( 'descripcion', {
							    language: 'es'
							});
				        </script>
					</div>

					@if($errors->has())
						<div class='alert alert-danger'>						
							<strong>Error!</strong><br>
							@foreach ($errors->all() as $error)
								@if($error == 'validation.required')									 
									Falta llenar {{ count($errors) }} campos, todos los campos son obligatorios					
									@break;
								@else					
									{{$error}}	<br>	
								@endif
							@endforeach
						</div>
					@endif	

					<div class="areaSubmit">
						{{ Form::submit('Crear', array('class'=>'btn btn-yellow')) }}
						<div>
							
						</div>
						
						
					</div>

				{{ Form::close() }}
			</div>
		</div>
		
	</div>

@stop