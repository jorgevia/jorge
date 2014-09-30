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
			$table->increments('activity_id');
			$table->string('description')->nullable(); //activity name

			//Ver si va a ser un String o habrá otra tabla, por ahora strings
			$table->string('organizers')->nullable();
			//Estos datos tiene prioridad por sobre el salón
			$table->string('phones')->nullable();
			$table->string('email')->nullable();


			//Van en otras tableas
			//organizers
			//day, start,finish
			//$table->tinyInteger('day_id')->unsigned();
			//$table->time('start');
			//$table->time('finish');
			//Crear otra tabla con los días especiales
			//Crear otra tabla con los organizers

			//Foreign keys
			//$table->integer('entity_id')->unsigned()->references('entity_id')->on('entities');

			$table->timestamps();
			$table->engine = 'InnoDB';
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
