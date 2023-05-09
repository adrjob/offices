<?php

namespace App\View\Components;

use Illuminate\View\Component;

class EditInvoices extends Component
{
    /**
     * Create a new component instance.
     *
     * @return void
     */
    public $display;
    public function __construct($display)
    {
        $this->display = $display;        
    }

    /**
     * Get the view / contents that represent the component.
     *
     * @return \Illuminate\Contracts\View\View|\Closure|string
     */
    public function render()
    {
        return view('components.edit-invoices');
    }
}
