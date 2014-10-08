<?php

use Faker\Factory as Faker;

class CategoriesTableSeeder extends Seeder {

	public function run()
	{
		$faker = Faker::create();
		DB::table('categories')->delete();
		foreach(range(1, 10) as $index)
		{
			Category::create([
				'description' => $faker->text($maxNbChars = 30)
			]);
		}
	}
}