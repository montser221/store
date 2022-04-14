<?php

namespace App\View\Components;

use Illuminate\View\Component;
use App\Models\Product;
class Shop extends Component
{
    public  $products;
    public  $categories;
    public  $categoryName;
    /**
     * Create a new component instance.
     *
     * @return void
     */
    public function __construct($products,$categories,$categoryName)
    {
        $this->products =$products;
        $this->categories =$categories;
        $this->categoryName =$categoryName;
    }


    /**
     * Get the view / contents that represent the component.
     *
     * @return \Illuminate\Contracts\View\View|\Closure|string
     */
    public function render()
    {
        return view('components.shop');
    }
}
