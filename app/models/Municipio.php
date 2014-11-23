<?php

class Municipio extends Eloquent {

	/**
	 * The database table used by the model.
	 *
	 * @var string
	 */
	protected $table = 'municipios';

	/**
	 * The attributes excluded from the model's JSON form.
	 *
	 * @var array
	 */
	protected $fillable = array(
		'nombre', 
		'nit', 
		'codigo_dane',
		'gentilicio',
		'otros_nombres',
		'descripción'
	);	

}
