<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateMunicipiosTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('municipios', function(Blueprint $table) {
			$table->increments('id');
			$table->string('nombre', 100);
			$table->string('otros_nombres', 100);		
			$table->string('gentilicio', 100);
			$table->string('habitantes', 100);
			$table->string('nit', 100);		
			$table->string('codigo_dane', 100);
			$table->string('descripcion', 100);
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
