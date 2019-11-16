<?php

use Illuminate\Database\Seeder;

class ColorTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $colors_vn=['Đen','Trắng','Hồng','Vàng','Xanh biển'];
        $colors_en=['black','white','pink','yellow','blue'];
        foreach ($colors_vn as $key => $color) {
            \Illuminate\Support\Facades\DB::table('colors')->insert([
                'name_vn'=>$color,
                'name_en'=>$colors_en[$key]
            ]);
        }
    }
}
