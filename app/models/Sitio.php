<?php

class Sitio extends Eloquent {

	/**
	 * The database table used by the model.
	 *
	 * @var string
	 */
	protected $table = 'sitios';

	/**
	 * The attributes excluded from the model's JSON form.
	 *
	 * @var array
	 */
	protected $fillable = array(
		'nombre', 
		'id_municipio', 
		'imagen',
		'descripción'
	);	

}
