<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ProductCategory extends Model
{

    use HasFactory;
    protected $primaryKey = 'id';

    public function products()
    {
        return $this->belongsToMany(Product::class,'category_product','category_id','category_id');
    }
}
