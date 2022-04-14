<?php

namespace Database\Seeders;

use App\Models\Product;
use App\Models\ProductCategory;
use Illuminate\Database\Seeder;


class ProductSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */

     public function run()
    {
        for($i = 1; $i < 16 ; $i++)
        {
           Product::create([
            'name' => 'Laptop '.$i,
            'slug' => 'laptop-'.$i ,
            'details' => [13,14,15][array_rand([13,14,15])] .' inch ' .[1,2,3][array_rand([1,2,3])] .'TB ssd, 32GB Ram ' . random_int(1,10000) ,
            'price' => random_int(149999,249999),
            'description' => 'Lorem  '.$i.' ipsum dolor sit amet consectetur adipisicing elit. Consequuntur iusto eos porro dolor at fugiat ipsa, perspiciatis recusandae magnam dicta quod incidunt natus aliquid tempore veniam debitis odit accusamus esse?',
            'featured'=> rand(0,1),
            'featured'=> rand(0,1),
           ])->categories()->attach(1);
        }

      //   $product = Product::find(1);
      //   $product->categories()->attach(2);

        for($i = 1; $i < 16 ; $i++)
        {
           Product::create([
            'name' => 'Desktop '.$i,
            'slug' => 'desktop-'.$i ,
            'details' => [24,25,27][array_rand([24,25,27])] .' inch ' .[1,2,3][array_rand([1,2,3])] .'TB ssd, 32GB Ram ' . random_int(1,10000) ,
            'price' => random_int(100,249999),
            'description' => 'Lorem  '.$i.' ipsum dolor sit amet consectetur adipisicing elit. Consequuntur iusto eos porro dolor at fugiat ipsa, perspiciatis recusandae magnam dicta quod incidunt natus aliquid tempore veniam debitis odit accusamus esse?',
            'featured'=> rand(0,1),
           ])->categories()->attach(2);
        }
        
        for($i = 1; $i < 16 ; $i++)
        {
           Product::create([
            'name' => 'Mobile Phones '.$i,
            'slug' => 'mobile-phones-'.$i ,
            'details' => [16,32,64][array_rand([16,32,64])] .' GB ' .[7,8,9][array_rand([7,8,9])] .'Inch Screen, 4GHz Quad Core ',
            'price' => random_int(999,249999),
            'description' => 'Lorem  '.$i.' ipsum dolor sit amet consectetur adipisicing elit. Consequuntur iusto eos porro dolor at fugiat ipsa, perspiciatis recusandae magnam dicta quod incidunt natus aliquid tempore veniam debitis odit accusamus esse?',
            'featured'=> rand(0,1),
           ])->categories()->attach(3);
        }
        
        for($i = 1; $i < 16 ; $i++)
        {
           Product::create([
            'name' => 'Tablets '.$i,
            'slug' => 'tablets-'.$i ,
            'details' => [16,32,64][array_rand([16,32,64])] .' GB ' .[10,11,12][array_rand([10,11,12])] .'Inch Screen, 4GHz Quad Core ',
            'price' => random_int(140,249999),
            'description' => 'Lorem  '.$i.' ipsum dolor sit amet consectetur adipisicing elit. Consequuntur iusto eos porro dolor at fugiat ipsa, perspiciatis recusandae magnam dicta quod incidunt natus aliquid tempore veniam debitis odit accusamus esse?',
            'featured'=> rand(0,1),
           ])->categories()->attach(4);
        }
        
        for($i = 1; $i < 16 ; $i++)
        {
           Product::create([
            'name' => 'TVs '.$i,
            'slug' => 'tvs-'.$i ,
            'details' => [24,25,27][array_rand([24,25,27])] .' inch ' .[1,2,3][array_rand([1,2,3])] .'TB ssd, 32GB Ram ' ,
            'price' => random_int(199,249999),
            'description' => 'Lorem  '.$i.' ipsum dolor sit amet consectetur adipisicing elit. Consequuntur iusto eos porro dolor at fugiat ipsa, perspiciatis recusandae magnam dicta quod incidunt natus aliquid tempore veniam debitis odit accusamus esse?',
            'featured'=> rand(0,1),
           ])->categories()->attach(5);
        }
        
        for($i = 1; $i < 16 ; $i++)
        {
           Product::create([
            'name' => 'Camera '.$i,
            'slug' => 'camera-'.$i ,
            'details' => 'Full Frame DSlR , with 18-55mm Kit lens ' ,
            'price' => random_int(1490,249999),
            'description' => 'Lorem  '.$i.' ipsum dolor sit amet consectetur adipisicing elit. Consequuntur iusto eos porro dolor at fugiat ipsa, perspiciatis recusandae magnam dicta quod incidunt natus aliquid tempore veniam debitis odit accusamus esse?',
            'featured'=> rand(0,1),
           ])->categories()->attach(6);
        }
        
        for($i = 1; $i < 16 ; $i++)
        {
           Product::create([
            'name' => 'Applinces '.$i,
            'slug' => 'applinces-'.$i ,
            'details' => 'ipsum dolor sit amet consectetur adipisicing elit. Consequuntur ',
            'price' => random_int(1999,249999),
            'description' => 'Lorem  '.$i.' ipsum dolor sit amet consectetur adipisicing elit. Consequuntur iusto eos porro dolor at fugiat ipsa, perspiciatis recusandae magnam dicta quod incidunt natus aliquid tempore veniam debitis odit accusamus esse?',
            'featured'=> rand(0,1),
           ])->categories()->attach(7);
        }
    
    }
}
