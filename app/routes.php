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
});
Route::group(array('prefix'=>'sistema/municipio', 'before'=>'auth'), function() {
	Route::get('crear', array(
		'as' => 'createMunicipio',
		'uses' => 'Municipios@create'
	));
	Route::post('crear', array(
		'as' => 'guardarMunicipio',
		'uses' => 'Municipios@store'
	));
	Route::post('editar/{id}', array(
		'as' => 'updateMunicipio',
		'uses' => 'Municipios@update'
	));

	Route::get('eliminar/{id}', array(
		'as' => 'eliminarMunicipio',
		'uses' => 'Municipios@remove'
	));

	Route::get('{id}', array(
		'as' => 'showMunicipio',
		'uses' => 'Municipios@show'
	));
});
Route::group(array('prefix'=>'sistema/sitio', 'before'=>'auth'), function() {
	Route::get('crear/{id}', array(
		'as' => 'crearSitio',
		'uses' => 'Sitios@create'
	));

	Route::post('crear', array(
		'as' => 'guardarSitio',
		'uses' => 'Sitios@store'
	));
	Route::post('editar/{id}', array(
		'as' => 'updateSitio',
		'uses' => 'Sitios@update'
	));

	Route::get('eliminar/{id}', array(
		'as' => 'eliminarSitio',
		'uses' => 'Sitios@remove'
	));

	Route::get('{id}', array(
		'as' => 'showSitio',
		'uses' => 'Sitios@index'
	));
});
	

Route::group(array('prefix' => '/', 'before'=>'loginAuth'), function() {
	Route::get('/', array(
		'as' => 'index',
		'uses' => 'UsersController@showLogin'
	));
});	