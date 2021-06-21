<?php

namespace Flattens\Flattens\View\Components;

use Flattens\Flattens\View\Component;

class TableRow extends Component
{
    /**
     * The components content.
     *
     * @var \Flattens\Flattens\View\Components\TableCell[] $cells
     */
    public $cells;

    /**
     * Create a new table row instance.
     *
     * @param \Flattens\Flattens\View\Components\TableCell[] $cells
     */
    public function __construct(array $cells)
    {
        $this->cells = $cells;
    }

    /**
     * Render the view component.
     *
     * @return \Illuminate\Contracts\View\View
     */
    public function render()
    {
        return view('flattens::table-row', $this->data());
    }
}
