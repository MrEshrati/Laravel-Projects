<?php

namespace App\View\Components;

use App\Models\DigitalContent;
use Illuminate\View\Component;

class CardProduct extends Component
{
    /**
     * Create a new component instance.
     *
     * @return void
     */

    public $products;

    public function __construct(){
        
        $this -> products = DigitalContent::paginate(6);
    }

    /**
     * Get the view / contents that represent the component.
     *
     * @return \Illuminate\Contracts\View\View|\Closure|string
     */
    public function render()
    {
        return view('components.card-product');
    }
}
