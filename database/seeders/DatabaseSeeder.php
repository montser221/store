<?php

namespace Database\Seeders;

use App\Models\Product;
use App\Models\User;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        // User::factory(10)->create();
        $this->call([
            productCategorySeeder::class,
            ProductSeeder::class,
            CouponsTableSeeder::class,
         ]);
        
        // $product = Product::find(1);
        // $product->categories()->attach(2);

    }
}
