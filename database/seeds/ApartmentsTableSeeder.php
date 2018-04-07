<?php

use Illuminate\Database\Seeder;
use App\Apartment;

class ApartmentsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $faker = \Faker\Factory::create();

        // Create 50 product records
        for ($i = 0; $i < 50; $i++) {
            Apartment::create([
                'name' => $faker->title,
                'address' => $faker->paragraph,
                'img_link' => $faker->paragraph,
                'status_id' => $faker->randomNumber(1),
                'key_counts' => $faker->randomNumber(1),
            ]);
        }
    }
}
