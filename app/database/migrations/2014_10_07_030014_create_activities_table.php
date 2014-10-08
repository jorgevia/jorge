<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreateActivitiesTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('activities', function(Blueprint $table)
		{
			$table->increments('id');
			$table->string('description')->nullable(); //activity name

			//Ver si va a ser un String o habrá otra tabla, por ahora strings
			$table->string('organizers')->nullable();

			//Estos datos tiene prioridad por sobre el salón
			$table->string('phones')->nullable();
			$table->string('email')->nullable();

			$table->integer('category_id')->unsigned()->index();
			$table->foreign('category_id')->references('id')->on('categories'); //Analizar el tema de cascada

			//Crear otra tabla con los días especiales
			//Target adults, kids, teens
			$table->tinyInteger('target_id')->unsigned()->default(1)->nullable(); //without table

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
		Schema::drop('activities');
	}

}
