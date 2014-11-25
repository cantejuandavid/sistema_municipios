@extends('index')

@section('content')
		{{ HTML::script('frameworks/ckeditor/ckeditor.js') }}
		{{ HTML::script('js/script.js') }}
	<div class="sistema">
		<div class="huilaTitle">
			HUILA
		</div>
		<div class="buttons">
			<a href="{{ URL::previous() }}" class="btn btn-red"><i class="fa fa-chevron-left"></i> Atrás</a>
			{{ HTML::decode(HTML::linkRoute('eliminarSitio', '<i class="fa fa-trash"></i> Eliminar',array($sitio->id), array('class'=>'btn btn-orange'))) }}	
			
		</div>
		<div class="content">
			<div class="title">{{ $sitio->nombre }}</div>

			<div class="form">
				{{ Form::model($sitio, array(
					'route' => array('updateSitio', $sitio->id), 
					'files'=>true)) 
				}}

					<fieldset>						
						<legend>Datos</legend>	
						<div class="bloque">
							{{ Form::label('nombre','Nombre:') }}													
							{{ Form::text('nombre', null, array('class'=>'form-control', 'id'=>'nombre', 'required')) }}							
						</div>						
					</fieldset>			
					<fieldset>						
						<legend>Reseña</legend>		
						<div class="bloque">																	
							{{ Form::textarea('corto', null, array('id'=>'corto', 'required', 'rows' => 5)) }}		
						</div>
					</fieldset>

					<fieldset>						
						<legend>Contenido</legend>	
						<div class="bloqueDescripcion">
							{{ Form::label('descripcion', 'Descripción') }}
							{{ Form::textarea('descripcion', null) }}
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
		    		@if(Session::has('updated'))
						<div class="success">
							<i class="fa fa-check"></i>
 							{{ Session::get('updated') }}
 						</div>
		    		@endif		
					<div class="areaSubmit">						
						{{ HTML::decode(Form::button('<i class="fa fa-check"></i> Guardar', array('class'=>'btn btn-yellow','type'=>'submit'))) }}
						<div>
							
						</div>
					</div>
				{{ Form::close() }}

			</div>
		</div>
		
	</div>

@stop
