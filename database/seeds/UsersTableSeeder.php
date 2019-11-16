<?php

use Illuminate\Database\Seeder;

class UsersTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        \Illuminate\Support\Facades\DB::table('users')->insert([
            'name'=>'Admin',
            'email'=>'admin@gmail.com',
            'password'=>bcrypt('123456'),
            'is_admin'=>1,
            'status'=>1,
            'created_at'=>\Carbon\Carbon::now(),
            'updated_at'=>\Carbon\Carbon::now()
        ]);
        $faker = \Faker\Factory::create();
        for ($i = 0 ; $i < 20; $i++){
            \DB::table('users')->insert([
                'password' => bcrypt('123456'),
                'name'  => $faker->text(20),
                'email' => $faker->unique()->safeEmail,
                'created_at' => \Carbon\Carbon::now()->format('Y-m-d H:i:s'),
                'updated_at' => \Carbon\Carbon::now()->format('Y-m-d H:i:s'),
            ]);
        }
    }
}
