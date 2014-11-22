<?php

Route::get('alo', function() {
	return 'ole';
});


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
		'uses' => 'SistemaMunicipios@index'
	));
});

Route::group(array('prefix' => '/'), function() {
	Route::get('/', array(
		'as' => 'index',
		'uses' => 'UsersController@showLogin'
	));
	Route::get('alo', array(
		'as' => 'alo',
		'uses' => 'UsersController@showLogin'
	));
});	