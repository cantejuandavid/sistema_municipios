@extends('index')

@section('content')
		{{ HTML::script('frameworks/ckeditor/ckeditor.js') }}
		{{ HTML::script('js/script.js') }}
	<div class="sistema">
		<div class="buttons">
			{{ HTML::linkRoute('getSistema', 'Atrás',null, array('class'=>'btn btn-red')) }}	
			{{ HTML::linkRoute('eliminarMunicipio', 'Eliminar',array($municipio->id), array('class'=>'btn btn-green')) }}	
		</div>
		<div class="content">
			<div class="title">{{ $municipio->nombre }}</div>
			<div class="form">
				{{ Form::model($municipio, array(
					'route' => array('updateMunicipio', $municipio->id),
					'method' => 'post',
					'enctype' => 'multipart/form-data')) }}


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
					<div class="bloqueDescripcion">
						{{ Form::label('descripcion', 'Descripción') }}
						{{ Form::textarea('descripcion', null) }}
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
						{{ Form::submit('Guardar', array('class'=>'btn btn-yellow')) }}
						<div>
							
						</div>
					</div>
				{{ Form::close() }}

			</div>
		</div>
		
	</div>

@stop