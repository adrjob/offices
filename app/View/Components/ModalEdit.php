<?php

namespace App\View\Components;

use Illuminate\View\Component;

class ModalEdit extends Component
{
    /**
     * Create a new component instance.
     *
     * @return void
     */
    public $dataURL;
    public $title;
    public $action;
    public function __construct($dataURL, $title, $action)
    {
        $this->dataURL = $dataURL;
        $this->title = $title;
        $this->action = $action;
    }

    /**
     * Get the view / contents that represent the component.
     *
     * @return \Illuminate\Contracts\View\View|\Closure|string
     */
    public function render()
    {
        return view('components.modal-edit');
    }
}
