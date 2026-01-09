<?php

namespace App\View\Components;

use Closure;
use Illuminate\Contracts\View\View;
use Illuminate\View\Component;

class Layout extends Component
{
    /**
     * Create a new component instance.
     */
    public $fullWidth;
    public $hideHeader;

    public function __construct($fullWidth = false, $hideHeader = false)
    {
        $this->fullWidth = $fullWidth;
        $this->hideHeader = $hideHeader;
    }

    /**
     * Get the view / contents that represent the component.
     */
    public function render(): View|Closure|string
    {
        return view('components.layout');
    }
}
