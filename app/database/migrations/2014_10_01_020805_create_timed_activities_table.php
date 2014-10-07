<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreateTimedActivitiesTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('timed_activities', function(Blueprint $table)
		{
			$table->increments('id');
			$table->string('description')->nullable();
			//day, start,finish
			//Acá podemos hacer lo siguiente
			// después de cada número seguirlo con el time
			$table->tinyInteger('day_id')->unsigned(); //days followwed by colons (0,1,2,3,4,5,6)
			$table->time('start');
			$table->time('finish');

			$table->integer('entity_id')->unsigned()->references('entity_id')->on('entities');
			$table->integer('activity_id')->unsigned()->references('activity_id')->on('activities');

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
		Schema::drop('timed_activities');
	}

}
