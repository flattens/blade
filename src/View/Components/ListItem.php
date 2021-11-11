<?php

namespace Flattens\Blade\View\Components;

use Flattens\Blade\View\Component;

class ListItem extends Component
{
    /**
     * The components content.
     *
     * @var \Flattens\Blade\View\Component[]
     */
    public $content;

    /**
     * Create a new list item instance.
     *
     * @param \Flattens\Blade\View\Component[]|\Flattens\Blade\View\Component
     */
    public function __construct($content)
    {
        $this->content = is_array($content) ? $content : [$content];
    }

    /**
     * Render the view component.
     *
     * @return \Illuminate\Contracts\View\View
     */
    public function render()
    {
        return view('Flattens\Blade::list-item', $this->data());
    }
}
