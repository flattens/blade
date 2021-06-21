<?php

namespace Flattens\Flattens\Bard\Factories;

use Flattens\Flattens\Bard\Contracts\Factory;
use Flattens\Flattens\Bard\HandlesHtml;
use Flattens\Flattens\View\Components\Paragraph;

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
     * @return \Flattens\Flattens\View\Component
     */
    public function viewComponent()
    {
        $html = $this->transformToHtml($this->attributes['content'] ?? []);
        
        return new Paragraph($html);
    }
}
