<?php

use Illuminate\Database\Seeder;

class SaleTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $faker = \Faker\Factory::create();
         \Illuminate\Support\Facades\DB::table('sales')->insert([
                'product_id' => 223,
                'sale_off' => $faker->numberBetween(1,5)*10,
                'quantity' =>$faker->numberBetween(10,20),
                'sold' =>$faker->numberBetween(1,9),
                'day_start' =>$faker->dateTimeBetween($startDate = '-1 week', $endDate = 'now'),
                'day_stop' =>$faker->dateTimeBetween($startDate = 'now', $endDate = '+1 week'),
                'created_at' => \Carbon\Carbon::now()->format('Y-m-d H:i:s'),
                'updated_at' => \Carbon\Carbon::now()->format('Y-m-d H:i:s'),

            ]);
        }
}
