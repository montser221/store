<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    use HasFactory;
    protected $primaryKey = 'id';

    public function categories()
    {
        return $this->belongsToMany(ProductCategory::class,'category_product','product_id','category_id');
    }
    
    public function presentPrice()       
    {
        return  number_format($this->price / 100,2);
    }

    public function scopeRandom($query)
    {
        return $query->inRandomOrder();
    }

    protected $fillable = ['slug','price','name','details','description','product_category_id'];
}
