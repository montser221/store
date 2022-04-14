<?php

namespace Database\Seeders;

use App\Models\ProductCategory;
use Carbon\Carbon;
use Illuminate\Database\Seeder;
use Illuminate\Support\Str;

class productCategorySeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $now = Carbon::now()->toDateTimeString();
        ProductCategory::insert([
            ['category_name'=> 'Laptops','slug'=>'laptops','created_at'=>$now,'updated_at'=>$now],
            ['category_name'=> 'Desktops','slug'=>'desktops','created_at'=>$now,'updated_at'=>$now],
            ['category_name'=> 'Mobile Phones','slug'=>'mobile-phones','created_at'=>$now,'updated_at'=>$now],
            ['category_name'=> 'Tablets','slug'=>'tablets','created_at'=>$now,'updated_at'=>$now],
            ['category_name'=> 'TVs','slug'=>'tvs','created_at'=>$now,'updated_at'=>$now],
            ['category_name'=> 'Digital Cameras','slug'=>'digital-cameras','created_at'=>$now,'updated_at'=>$now],
            ['category_name'=> 'Applinces','slug'=>'applinces','created_at'=>$now,'updated_at'=>$now],
        ]);
    }
}
