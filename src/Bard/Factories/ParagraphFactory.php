<?php

namespace Flattens\Bard\Factories;

use Flattens\Bard\Contracts\Factory;
use Flattens\Bard\HandlesHtml;
use Flattens\View\Components\Paragraph;

class ParagraphFactory implements Factory
{
    use HandlesHtml;

    /**
     * The factory attributes.
     *
     * @var array $attributes
     */
    protected $attributes = [];

    /**
     * Set the factory attributes.
     *
     * @param $attributes
     * @return $this
     */
    public function with(array $attributes)
    {
        $this->attributes = $attributes;

        return $this;
    }

    /**
     * Create a new view component instance.
     *
     * @return \Flattens\View\Component
     */
    public function viewComponent()
    {
        $html = $this->transformToHtml($this->attributes['content'] ?? []);
        
        return new Paragraph($html);
    }
}
