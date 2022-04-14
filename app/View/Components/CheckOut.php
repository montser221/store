<?php

namespace App\View\Components;

use Illuminate\View\Component;

class CheckOut extends Component
{
    public $subtotal;
    public $discount;
    /**
     * Create a new component instance.
     *
     * @return void
     */
    public function __construct($subtotal,$discount)
    {
        $this->subtotal=$subtotal;
        $this->discount=$discount;
    }

    /**
     * Get the view / contents that represent the component.
     *
     * @return \Illuminate\Contracts\View\View|\Closure|string
     */
    public function render()
    {
        return view('components.check-out');
    }
}
