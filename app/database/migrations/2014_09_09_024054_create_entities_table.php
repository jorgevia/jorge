<?php

use \Illuminate\Database\Migrations\Migration;
use \Illuminate\Database\Schema\Blueprint;

class CreateEntitiesTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{

		Schema::create('entities', function(Blueprint $table)
		{
			//La idea de esto es que deben ser lugares físicos donde pueden desarrollarse actividades o no
			//Una actividad es cualquier evento organizado con día, fecha y lugar físico en el que se desarrolla
			$table->increments('entity_id'); //Primary key

			$table->char('name', 255)->unique();
			$table->string('description')->nullable();

			$table->string('email')->nullable();
			$table->string('address')->nullable();

			//A quién hay que dirigirse para hablar
			$table->string('contact')->nullable();

			//Google maps
			$table->string('latitude')->nullable();
			$table->string('longitude')->nullable();

			//Foreign keys
			$table->tinyInteger('zone_id')->unsigned()->default(1);

			$table->smallInteger('country_id')->unsigned()->default(1);
			$table->smallInteger('province_id')->unsigned()->default(1);
			$table->smallInteger('city_id')->unsigned()->default(1);

			//Se va a permitir agregar una imagen más tarde
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
		Schema::drop('entities');
	}

}
