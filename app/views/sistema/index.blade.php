@extends('index')

@section('content')
	
	<div class="sistema">
		<div class="buttons">
			{{ HTML::linkRoute('logout', 'Salir','', array('class'=>'btn btn-red')) }}
			{{ HTML::linkRoute('createMunicipio', 'Crear municipio',array(), array('class'=>'btn btn-yellow')) }}
		</div>
		<div class="content">

			<div class="municipios">
				<div class="title">Municipios: </div>
				@if(count($municipios) > 0)
					<ul>				
						@foreach ($municipios as $m)	
							<li>
								{{ HTML::linkRoute('showMunicipio', $m->nombre, array($m->id)) }}
							</li>
						@endforeach
					</ul>						
				@else
					<div>No hay municipios creados aún.</div>

				@endif
				<div class="actual">Actualemente hay {{ count($municipios) }} municipios</div>
			</div>
			<div class="sitios">
				<div class="title">Sitios Turísticos: </div>
				@if(count($sitios) > 0)

					<ul>				
						@foreach ($sitios as $s)	
							<li>
								{ HTML::linkRoute('showMunicipio', $s->nombre, array($s->id)) }}
							</li>
						@endforeach
					</ul>
						
				@else
					<div>No hay sitios turísticos creados aún.</div>

				@endif
				<div class="actual">Actualemente hay {{ count($sitios) }} sitios</div>
			</div>


			@if(Session::has('success'))
				<div class="success"><i class="fa fa-check"></i>
 {{ Session::get('success') }}</div>
		    @endif			
		</div>

	</div>
@stop