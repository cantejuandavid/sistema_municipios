@extends('index')

@section('content')
		{{ HTML::script('frameworks/ckeditor/ckeditor.js') }}
		{{ HTML::script('js/script.js') }}
	<div class="sistema">
		<div class="huilaTitle">
			HUILA
		</div>
		<div class="buttons">
			{{ HTML::decode(HTML::linkRoute('getSistema', '<i class="fa fa-chevron-left"></i> Atrás',null, array('class'=>'btn btn-red'))) }}	
		</div>
		<div class="content">
			<div class="title">Nuevo Municipio</div>
			<div class="form">
				{{ Form::open(array('url' => 'sistema/municipio/crear', 'id'=>'crearMunicipio')) }}
					<fieldset>						
						<legend>Datos</legend>	
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
							{{ Form::text('habitantes', null, array('class'=>'form-control', 'id'=>'habitantes', 'required')) }}							
						</div>	
					</fieldset>		
					<fieldset>						
						<legend>Descripción</legend>			
						<div class="bloqueDescripcion">							
							<textarea name="descripcion" id="descripcion" rows="5" cols="80" class="form-control">
					        	Descripción breve del municipio.
					        </textarea>
					        <script>
					            CKEDITOR.replace( 'descripcion', {
								    language: 'es'
								});
					        </script>
						</div>
					</fieldset>

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
					
					@if(Session::has('existe'))
						<div class="errors">
							<i class="fa fa-exclamation-triangle"></i>
 							{{ Session::get('existe') }}
 						</div>
		    		@endif			
					<div class="areaSubmit">
						{{ HTML::decode(Form::button('<i class="fa fa-check"></i> Crear', array('class'=>'btn btn-yellow','type'=>'submit'))) }}
						<div>
							
						</div>
					</div>

				{{ Form::close() }}
			</div>
		</div>
		
	</div>

@stop