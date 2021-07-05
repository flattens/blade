<?php

namespace Flattens\View\Components;

use Flattens\View\Component;

class Heading extends Component
{
    /**
     * The components content.
     *
     * @var string|Illuminate\Support\HtmlString
    */
    public $text;

    /**
     * The heading level.
     *
     * @var int
     */
    public $level;

    /**
     * Create a new heading instance.
     *
     * @param \Illuminate\Support\HtmlString $text
     * @param int $level
     */
    public function __construct($text, $level = 2)
    {
        $this->text = $text;
        $this->level = $level;
    }
    
    /**
     * Render the view component.
     *
     * @return \Illuminate\Contracts\View\View
     */
    public function render()
    {
        return view('flattens::heading', $this->data());
    }
}
