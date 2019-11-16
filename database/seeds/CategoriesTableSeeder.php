<?php

use Illuminate\Database\Seeder;

class CategoriesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $cat_parent=['Điện thoại','Máy tính','Máy ảnh','Phụ kiện','Tin tức'];
        foreach ($cat_parent as $category) {
            \Illuminate\Support\Facades\DB::table('categories')->insert([
                'name'=>$category,
                'slug'=>\Illuminate\Support\Str::slug($category),
                'parent_id'=>0,
                'status'=>1,
                'created_at'=>\Carbon\Carbon::now(),
                'updated_at'=>\Carbon\Carbon::now()
            ]);
        }
        // danh muc dien thoai
        $cat_mobile=['Apple','Samsung','Huawei','Oppo','Xiaomi','Sony','Asus','HTC','LG','Blackberry'];
        foreach ($cat_mobile as $category) {
            \Illuminate\Support\Facades\DB::table('categories')->insert([
                'name'=>$category,
                'slug'=>\Illuminate\Support\Str::slug($category),
                'parent_id'=>1,
                'status'=>1,
                'created_at'=>\Carbon\Carbon::now(),
                'updated_at'=>\Carbon\Carbon::now()
            ]);
        }
        //
        $cat_computer=['Macbook','Hp','Asus','Dell','Lenovo','acer','msi'];
        foreach ($cat_computer as $category) {
            \Illuminate\Support\Facades\DB::table('categories')->insert([
                'name'=>$category,
                'slug'=>\Illuminate\Support\Str::slug($category),
                'parent_id'=>2,
                'status'=>1,
                'created_at'=>\Carbon\Carbon::now(),
                'updated_at'=>\Carbon\Carbon::now()
            ]);
        }
        //
        $cat_camera=['Canon','Nikon','Sony'];
        foreach ($cat_camera as $category) {
            \Illuminate\Support\Facades\DB::table('categories')->insert([
                'name'=>$category,
                'slug'=>\Illuminate\Support\Str::slug($category),
                'parent_id'=>3,
                'status'=>1,
                'created_at'=>\Carbon\Carbon::now(),
                'updated_at'=>\Carbon\Carbon::now()
            ]);
        }
        $cat_phu_kien=['Bao da ốp lưng','Sạc dự phòng','Thẻ nhớ','Tai nghe','Loa bluetooth','Sạc - Cáp'];
        foreach ($cat_phu_kien as $category) {
            \Illuminate\Support\Facades\DB::table('categories')->insert([
                'name'=>$category,
                'slug'=>\Illuminate\Support\Str::slug($category),
                'parent_id'=>4,
                'status'=>1,
                'created_at'=>\Carbon\Carbon::now(),
                'updated_at'=>\Carbon\Carbon::now()
            ]);
        }
    }
}
