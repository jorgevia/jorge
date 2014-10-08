<?php

class DatabaseSeeder extends Seeder {

	/**
	 * Run the database seeds.
	 *
	 * @return void
	 */
	public function run()
	{
		Eloquent::unguard();
		$this->call('CategoriesTableSeeder');
		$this->command->info('Categories table seeded!');

		// $this->call('UserTableSeeder');
	}

}
