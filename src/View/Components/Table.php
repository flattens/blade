<?php

namespace Flattens\View\Components;

use Flattens\View\Component;

class Table extends Component
{
    /**
     * The components content.
     *
     * @var \Flattens\View\Components\TableRow[] $rows
     */
    public $rows;

    /**
     * Create a new table instance.
     *
     * @param \Flattens\View\Components\TableRow[] $rows
     */
    public function __construct(array $rows)
    {
        $this->rows = $rows;
    }

    /**
     * Render the view component.
     *
     * @return \Illuminate\Contracts\View\View
     */
    public function render()
    {
        return view('flattens::table', $this->data());
    }
}
