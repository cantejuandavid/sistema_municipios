<?php

class Sitios extends BaseController {


	public function create($id)
	{
		$n = Municipio::find($id, array('nombre'));
		return View::make('sistema.createSitio')->with('id_municipio', $id)->with('nombre_municipio',$n->nombre);
	}

	public function index($id)
	{		
		$sitio = Sitio::find($id);				
		return View::make('sistema.showSitio', array('sitio'=>$sitio));		
	}

		public function store()
	{
		$name 	= Input::get('nombre');
		$b 		= Sitio::where('nombre','=', $name)->first();		
		if(count($b) == 0) {
			$n 					= new Sitio;
			$n->nombre 			= Input::get('nombre');						
			$n->id_municipio	= Input::get('id_municipio');			
			$n->corto 			= Input::get('corto');
			$n->descripcion 	= Input::get('descripcion');	
			$n->save();

			return Redirect::route('getSistema')
	                ->with('success', 'Has añadido el sitio turístico: '. $name);                    
		}
		else{
			return Redirect::back()
	                ->with('existe', 'Ya existe este sitio turístico: '. $name)                   
	                ->withInput();
		}
	}

	public function update($id)
	{
		$n 					= Sitio::find($id);			
		$n->nombre 			= Input::get('nombre');									
		$n->corto 			= Input::get('corto');
		$n->descripcion 	= Input::get('descripcion');	
								
		$n->save();
		
		return Redirect::back()
					->with('updated', 'Se ha actualizado con éxito este sitio turístico!')                   
	                ->withInput();
	}

	public function remove($id)
	{
		$m = Sitio::find($id);
		$m->delete();
		return Redirect::route('getSistema')
				->with('success', 'Se eliminó el sitio turístico: '.$m->nombre);
	}

}