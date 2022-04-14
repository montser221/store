<?php

namespace App\View\Components;

use App\Models\Product;
use Illuminate\View\Component;

class MightAlsoLike extends Component
{
    public $slug;
    /**
     * Create a new component instance.
     *
     * @return void
     */
    public function __construct($slug)
    {
        $this->slug=$slug;
    }


    /**
     * Get the view / contents that represent the component.
     *
     * @return \Illuminate\Contracts\View\View|\Closure|string
     */
    public function render()
    {
        $collectionOfProducts = Product::where('slug','!=',$this->slug)->take(4)->get();
        return view('components.might-also-like',['collectionOfProducts'=>$collectionOfProducts]);
    }
}
