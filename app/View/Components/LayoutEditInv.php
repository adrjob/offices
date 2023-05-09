<?php

namespace App\View\Components;

use Illuminate\View\Component;

class LayoutEditInv extends Component
{
    /**
     * Create a new component instance.
     *
     * @return void
     */
    public $data;
    public $country;
    public function __construct($country, $data)
    {
        $this->country = $country;
        $this->data = $data;
    }

    /**
     * Get the view / contents that represent the component.
     *
     * @return \Illuminate\Contracts\View\View|\Closure|string
     */
    public function render()
    {
        return view('components.layout-edit-inv');
    }
}
