<?php

namespace Flattens\Flattens\View\Components;

use Flattens\Flattens\View\Component;

class TableHeader extends Component
{
    /**
     * The components content.
     *
     * @var \Flattens\Flattens\View\Component[]
     */
    public $content;

    /**
     * Create a new table header instance.
     *
     * @param array @var \Flattens\Flattens\View\Component[]
     * @param array $attributes
     */
    public function __construct(array $content, $attributes = [])
    {
        $this->content = $content;

        $this->withAttributes($attributes);
    }

    /**
     * Render the view component.
     *
     * @return \Illuminate\Contracts\View\View
     */
    public function render()
    {
        return view('flattens::table-header', $this->data());
    }
}
