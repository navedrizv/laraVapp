<?php

use Illuminate\Database\Seeder;
use Faker\Factory as Faker;

class CapacitiesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
  //       $faker = Faker::create();

  //   	foreach (range(1,10) as $index) {
	 //        DB::table('capacities')->insert([
	 //            'aircraft_id' => 1,
	 //            'weight_min' => $faker->weight_min,
	 //            'weight_max' => $faker->weight_max,
	 //            'height_min' => $faker->height_min,
		// 		'height_max' => $faker->height_max,
		// 		'width_min' => $faker->width_min,
		// 		'width_max' => $faker->width_max,
		// 		'length_min' => $faker->length_min,
		// 		'length_max' => $faker->length_max
	 //        ]);
		// }

		factory(App\Capacity::class, 50)->create();
    }
}
