<?php

namespace Flattens\View\Components;

use Flattens\View\Component;

class TableCell extends Component
{
    /**
     * The components content.
     *
     * @var \Flattens\View\Component[]
     */
    public $content;

    /**
     * Create a new table cell instance.
     *
     * @param array @var \Flattens\View\Component[]
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
        return view('flattens::table-cell', $this->data());
    }
}
