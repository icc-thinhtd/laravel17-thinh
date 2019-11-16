<?php

use Illuminate\Database\Seeder;

class BannerTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $faker = \Faker\Factory::create();
        for ($i = 0 ; $i < 4; $i++){
            $name = 'Ưu đãi '.$i;
            \DB::table('banners')->insert([
                'name' => $name,
                'slug'=>\Illuminate\Support\Str::slug($name),
                'path' => '/storage/banners/banner-0'.$i.'.png',
                'pos' => 0,
                'status' => 1,
                'user_id' => 1,
                'created_at' => \Carbon\Carbon::now()->format('Y-m-d H:i:s'),
                'updated_at' => \Carbon\Carbon::now()->format('Y-m-d H:i:s'),
            ]);
        }
    }
}
