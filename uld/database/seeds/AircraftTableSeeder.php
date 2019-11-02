<?php

use Illuminate\Database\Seeder;
use Faker\Factory as Faker;

class AircraftTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
		factory(App\Aircraft::class, 20)->create();
	}
}
