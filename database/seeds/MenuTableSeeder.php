<?php

use Illuminate\Database\Seeder;

class MenuTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        \Illuminate\Support\Facades\DB::table('menus')->insert([
            'name'=>'Trang chu',
            'link'=>'frontend.index',
            'parent_id'=>0
        ]);
        \Illuminate\Support\Facades\DB::table('menus')->insert([
            'name'=>'Giam gia',
            'link'=>'giam gia link',
            'parent_id'=>0
        ]);
        \Illuminate\Support\Facades\DB::table('menus')->insert([
            'name'=>'Featured brands',
            'link'=>'brands link',
            'parent_id'=>0
        ]);
        \Illuminate\Support\Facades\DB::table('menus')->insert([
            'name'=>'Pages',
            'link'=>'page link',
            'parent_id'=>0
        ]);
        \Illuminate\Support\Facades\DB::table('menus')->insert([
            'name'=>'Shop',
            'link'=>'shop link',
            'parent_id'=>4
        ]);
        \Illuminate\Support\Facades\DB::table('menus')->insert([
            'name'=>'Product',
            'link'=>'product link',
            'parent_id'=>4
        ]);
        \Illuminate\Support\Facades\DB::table('menus')->insert([
            'name'=>'Contact',
            'link'=>'contact link',
            'parent_id'=>4
        ]);


        \Illuminate\Support\Facades\DB::table('menus')->insert([
            'name'=>'Blogs',
            'link'=>'blog link',
            'parent_id'=>0
        ]);
        \Illuminate\Support\Facades\DB::table('menus')->insert([
            'name'=>'Lien he',
            'link'=>'contact link',
            'parent_id'=>0
        ]);
    }
}
