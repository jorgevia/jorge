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
			$table->increments('id_entities'); //Primary key

			$table->char('name', 255)->unique(); //Add index to the na
			$table->string('description')->nullable();

			$table->string('email')->nullable();
			$table->string('address')->nullable();

			//Google maps
			$table->string('latitude')->nullable();
			$table->string('longitude')->nullable();

			//Foreign keys
			$table->tinyInteger('id_zone')->unsigned()->default(1);
			$table->tinyInteger('id_target')->unsigned()->default(1)->nullable(); //If teachs kids, adults, etc.
			$table->smallInteger('id_type')->unsigned();

			$table->smallInteger('id_country')->unsigned()->default(1);
			$table->smallInteger('id_province')->unsigned()->default(1);
			$table->smallInteger('id_city')->unsigned()->default(1);

			//Se va a permitir agregar una imagen más tarde
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
		Schema::drop('entities');
	}

}
