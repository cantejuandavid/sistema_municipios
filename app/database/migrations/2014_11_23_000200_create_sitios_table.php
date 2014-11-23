<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateSitiosTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('sitios', function(Blueprint $table) {
			$table->increments('id');
			$table->string('nombre', 100);
			$table->string('descripcion');		
			$table->string('id_municipio', 100);					
			$table->string('imagen', 100);
			$table->timestamps();
		});
	}

	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		//
	}

}
