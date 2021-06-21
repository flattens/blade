<?php

namespace Flattens\Flattens\View\Components;

use Flattens\Flattens\View\Component;

class HorizontalRule extends Component
{
    /**
     * Render the view component.
     *
     * @return \Illuminate\Contracts\View\View
     */
    public function render()
    {
        return view('flattens::horizontal-rule', $this->data());
    }
}
