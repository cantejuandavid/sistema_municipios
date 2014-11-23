<?php

class Municipios extends BaseController {

	public function index()
	{
		$municipios = Municipio::all();		
		$sitios = Sitio::all();	
		return View::make('sistema.index', array('municipios'=>$municipios,'sitios'=>$sitios));
	}

	public function create()
	{
		return View::make('sistema.createMunicipio');
	}

}