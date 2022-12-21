<?php

namespace App\View\Components\Body\Table;

use Illuminate\View\Component;

class Col extends Component
{
    /**
     * The template route.
     *
     * @var string
     */
    public $class;

    /**
     * Create a new component instance.
     *
     * @return void
     */
    public function __construct($class = null)
    {
        if (empty($class)) {
            $this->class = '';
        } else {
            $this->class = '-'.$class;
        }
    }

    /**
     * Get the view / contents that represent the component.
     *
     * @return \Illuminate\Contracts\View\View|\Closure|string
     */
    public function render()
    {
        return view('components.body.table.col');
    }
}
