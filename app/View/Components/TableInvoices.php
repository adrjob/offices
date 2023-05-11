<?php

namespace App\View\Components;

use Illuminate\View\Component;

class TableInvoices extends Component
{
    /**
     * Create a new component instance.
     *
     * @return void
     */
    public $dd;
    public function __construct($dd)
    {
        $this->dd = $dd;
    }

    /**
     * Get the view / contents that represent the component.
     *
     * @return \Illuminate\Contracts\View\View|\Closure|string
     */
    public function render()
    {
        return view('components.table-invoices');
    }
}
