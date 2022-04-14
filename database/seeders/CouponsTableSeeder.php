<?php

namespace Database\Seeders;

use App\Models\Coupun;
use Illuminate\Database\Seeder;

class CouponsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Coupun::create([
            'code'=>'ABC123',
            'type'=>'fixed',
            'value'=>3000
        ]);
       
        Coupun::create([
            'code'=>'DEF456',
            'type'=>'percent',
            'value'=>50
        ]);
    }
}
