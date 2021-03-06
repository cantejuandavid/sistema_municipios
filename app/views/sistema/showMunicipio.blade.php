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
			{{ HTML::decode(HTML::linkRoute('eliminarMunicipio', '<i class="fa fa-trash"></i> Eliminar',array($municipio->id), array('class'=>'btn btn-orange'))) }}	
			
			{{ HTML::decode(HTML::linkRoute('crearSitio', '<i class="fa fa-plus"></i> Añadir Sitio',array($municipio->id), array('class'=>'btn btn-green'))) }}	

			<div class="sitios_turisticos">
				<div class="title_ul">Sitios turísticos: </div>
				<ul>
					@if(count($sitios) > 0)
						@foreach ($sitios as $s)							
							<li>{{ HTML::linkRoute('showSitio', $s->nombre,array($s->id)) }}</li>
						@endforeach									
					@else
						<li class="noSitios">¡No hay sitios aún en este municipio!</li>
					@endif
				</ul>
			</div>
			
		</div>
		<div class="content">
			<div class="title">{{ $municipio->nombre }}</div>
			<div class="form">
				{{ Form::model($municipio, array(
					'route' => array('updateMunicipio', $municipio->id), 
					'files'=>true)) 
				}}

					<fieldset>						
						<legend>Datos</legend>	
						<div class="bloque">
							{{ Form::hidden('id', null, array('id'=>'id')) }}	
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
