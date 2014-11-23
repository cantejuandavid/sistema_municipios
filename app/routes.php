<?php

Route::group(array('prefix' => 'usuarios'), function(){
	Route::post('login', array(
		'as'	=> 'login',
		'uses'	=> 'UsersController@login'
	));
	Route::get('logout', array(
		'as'	=> 'logout',
		'uses'	=> 'UsersController@logout'
	));
});


Route::group(array('prefix'=>'sistema', 'before'=>'auth'), function() {
	Route::get('/', array(
		'as' => 'getSistema',
		'uses' => 'Municipios@index'
	));
	Route::get('municipio/crear', array(
		'as' => 'createMunicipio',
		'uses' => 'Municipios@create'
	));
	Route::post('municipio/crear', array(
		'as' => 'guardarMunicipio',
		'uses' => 'Municipios@store'
	));
	Route::get('municipio/editar', array(
		'as' => 'editMunicipio',
		'uses' => 'Municipios@edit'
	));
	Route::post('municipio/editar', array(
		'as' => 'updateMunicipio',
		'uses' => 'Municipios@update'
	));

	Route::get('municipio/eliminar/{id}', array(
		'as' => 'eliminarMunicipio',
		'uses' => 'Municipios@remove'
	));


	

	Route::get('sitio/crear', array(
		'as' => 'createSitioTuristico',
		'uses' => 'Sitios@create'
	));

	Route::get('municipio/{id}', array(
		'as' => 'showMunicipio',
		'uses' => 'Municipios@show'
	));

});


Route::group(array('prefix' => '/', 'before'=>'loginAuth'), function() {
	Route::get('/', array(
		'as' => 'index',
		'uses' => 'UsersController@showLogin'
	));
});	