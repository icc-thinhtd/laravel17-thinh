<?php

use Illuminate\Database\Seeder;

class ProductsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $faker = \Faker\Factory::create();
        for ($i = 0 ; $i < 100; $i++){
            $name=$faker->text(15);
            \Illuminate\Support\Facades\DB::table('products')->insert([
                'name'  => $name,
                'slug'	=> \Illuminate\Support\Str::slug($name),
                'intro' => $faker->text(20),
                'image' => '/storage/products/product_avatar_'.$faker->numberBetween(0,4).'.png',
                'content' =>$faker->text(100),
                'review' =>$faker->text(100),
                'tag' => \Illuminate\Support\Str::slug($name),
                'price' => $faker->numberBetween(400000,800000),
                'price_status' => $faker->numberBetween(0,2),
                'status'=>1,
                'user_id'=> $faker->numberBetween(1,10),
                'category_id'=> $faker->numberBetween(1,10),
                'created_at' => \Carbon\Carbon::now()->format('Y-m-d H:i:s'),
                'updated_at' => \Carbon\Carbon::now()->format('Y-m-d H:i:s'),

            ]);
        }
    }
}
