@extends('index')

@section('content')
	<div class="login">
		<div class="titleLogin">
			INGRESO
		</div>
		<div class="form">
			{{ Form::open(array('url' => 'usuarios/login')) }}

				<div class="bloque">
					{{ Form::label('username','Email') }}													
					{{ Form::text('username', null, array('class'=>'form-control', 'id'=>'username', 'required')) }}							
				</div>
				<div class="bloque">							
					{{ Form::label('password', 'Contraseña: ') }}							
					{{ Form::password('password', array('class'=>'form-control', 'id'=>'password', 'required')) }}							
				</div>
				<div class="bloque">
					<div class="remember">
						<label>Recordarme</label><input type="checkbox" name='rememberme' value='true' checked>						
					</div>
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

				@if(Session::has('login_error'))
					<div class="alert alert-danger"><i class="fa fa-times"></i>
 {{ Session::get('login_error') }}</div>
			    @endif

				<div class="areaSubmit">
					{{ Form::submit('Ingresar', array('class'=>'btn btn-orange')) }}
				</div>

			{{ Form::close() }}
		</div>
	</div>
	
@stop