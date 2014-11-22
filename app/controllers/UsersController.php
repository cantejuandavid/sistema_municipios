<?php

class UsersController extends BaseController {

	public function showLogin() {
		return View::make('usuarios.login');
	}


	public function login()
	{
		$datos = Input::all();
		$rememberme = Input::get('rememberme') == 'true' ? true : false;

		$reglas = array(
			'username' 	=> 'required',
			'password'	=> 'required',
		);

		$validator = Validator::make($datos, $reglas);

		if($validator->fails())
		{
			return Redirect::route('index')
						->withErrors($validator)
						->withInput();
		}
		
		if(Auth::attempt(array(
			'username' => Input::get('username'),
			'password' => Input::get('password')
			), $rememberme))
        {            	
        	return Redirect::route('getSistema');                                 	            
        }

        return Redirect::route('loginUser')
                    ->with('login_error', 'Usuario y/o contraseña son incorrectos')
                    ->withInput();
	}

}