<?php

namespace Flattens\Blade\View\Components;

use Flattens\Blade\View\Component;

class Blockquote extends Component
{
    /**
     * The components content.
     *
     * @var \Flattens\Blade\View\Component[]
     */
    public $content;

    /**
     * Create a new blockquote instance.
     *
     * @param \Flattens\Blade\View\Component[] $content
     */
    public function __construct(array $content)
    {
        $this->content = $content;
    }

    /**
     * Render the view component.
     *
     * @return \Illuminate\Contracts\View\View
     */
    public function render()
    {
        return view('Flattens\Blade::blockquote', $this->data());
    }
}
