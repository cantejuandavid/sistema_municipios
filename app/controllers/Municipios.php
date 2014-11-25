<?php

class Municipios extends BaseController {

	public function index()
	{
		$municipios = Municipio::get(array('id', 'nombre'));		
		$sitios = Sitio::all();	
		return View::make('sistema.index', array('municipios'=>$municipios,'sitios'=>$sitios));
	}

	public function show($id)
	{		
		$b = Municipio::find($id);	
		$sitios = Sitio::where('id_municipio','=',$b->id)->get();			
		return View::make('sistema.showMunicipio', array('municipio'=>$b,'sitios'=>$sitios));
	}

	public function create()
	{
		return View::make('sistema.createMunicipio');
	}

	public function store()
	{
		$name = Input::get('nombre');
		$b = Municipio::where('nombre','=', $name)->first();		
		if(count($b) == 0) {
			$n 					= new Municipio;
			$n->nombre 			= Input::get('nombre');
			$n->otros_nombres 	= Input::get('otros_nombres');
			$n->gentilicio 		= Input::get('gentilicio');	
			$n->habitantes		= Input::get('habitantes');			
			$n->descripcion 	= Input::get('descripcion');	
			$n->save();

			return Redirect::route('getSistema')
	                ->with('success', 'Has añadido al municipio de '. $name);                    
		}
		else{
			return Redirect::back()
	                ->with('existe', 'Ya existe el municipio de '. $name)                   
	                ->withInput();
		}
	}

	public function update($id)
	{
		$n 					= Municipio::find($id);			
		$n->otros_nombres 	= Input::get('otros_nombres');
		$n->gentilicio 		= Input::get('gentilicio');
		$n->habitantes 		= Input::get('habitantes');
		$n->descripcion		= Input::get('descripcion');			
								
		$n->save();

		
		return Redirect::back()
					->with('updated', 'Se ha actualizado con éxito este municipio!')                   
	                ->withInput();
	}

	public function remove($id)
	{
		$m = Municipio::find($id);
		$m->delete();
		return Redirect::route('getSistema')
				->with('success', 'Se eliminó el municipio de '.$m->nombre);
	}

}