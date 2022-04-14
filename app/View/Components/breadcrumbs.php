<?php

namespace App\View\Components;

use Illuminate\View\Component;

class breadcrumbs extends Component
{
    public $name;

    public ?string $slug;
    /**
     * Create a new component instance.
     *
     * @return void
     */
    public function __construct($name ,$slug="")
    {
        $this->name=$name;
        $this->slug=$slug;

    }

    /**
     * Get the view / contents that represent the component.
     *
     * @return \Illuminate\Contracts\View\View|\Closure|string
     */
    public function render()
    {
        if(!empty($this->slug)):
            $sl = '<li class="breadcrumb-item active" aria-current="page">'. $this->slug .'</li>';

        else:
            $sl= "";
        endif;
        return <<<blade
            <div class="bg-custom-light">
            <nav class="container  p-3 " style="--bs-breadcrumb-divider: '>';" aria-label="breadcrumb">
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a class="text-secondary"  href="/">Home</a></li>
                <li class="breadcrumb-item " aria-current="page"> $this->name </li>
                $sl
            </ol>
            </nav>
            </div>
        blade;
    }
}
