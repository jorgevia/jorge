<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreateActivityEntityTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		//Timed activities pivot
		Schema::create('activity_entity', function(Blueprint $table)
		{
			$table->increments('id');
			$table->string('description')->nullable();

			//Foreign keys
			$table->integer('activity_id')->unsigned()->index();
			$table->foreign('activity_id')->references('id')->on('activities');
			$table->integer('entity_id')->unsigned()->index();
			$table->foreign('entity_id')->references('id')->on('entities');

			$table->tinyInteger('day_id')->unsigned(); //days followwed by colons (0,1,2,3,4,5,6)
			$table->time('start');
			$table->time('finish');

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
		Schema::drop('activity_entity');
	}

}
