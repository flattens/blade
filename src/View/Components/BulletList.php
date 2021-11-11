<?php

namespace Flattens\Blade\View\Components;

use Flattens\Blade\View\Component;

class BulletList extends Component
{
    /**
     * The components content.
     *
     * @var \Flattens\Blade\View\Components\ListItem[]
     */
    public $items;

    /**
     * Create a new bullet list instance.
     *
     * @param \Flattens\Blade\View\Components\ListItem[] $items
     */
    public function __construct(array $items)
    {
        $this->items = $items;
    }

    /**
     * Render the view component.
     *
     * @return \Illuminate\Contracts\View\View
     */
    public function render()
    {
        return view('Flattens\Blade::bullet-list', $this->data());
    }
}
