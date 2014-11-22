<?php

class UsersTableSeeder extends Seeder {

	public function run()
	{
		
		User::create(array(
			'username' => 'cantejuandavid@gmail.com',				
			'password' => Hash::make('juan'),
			'first_name' => 'juan david',
			'last_name' => 'vargas cante'				
		));
			
	}

}