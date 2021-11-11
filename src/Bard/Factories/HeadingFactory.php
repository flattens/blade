<?php

namespace Flattens\Blade\Bard\Factories;

use Flattens\Blade\Bard\Contracts\Factory;
use Flattens\Blade\Bard\HandlesHtml;
use Flattens\Blade\View\Components\Heading;

class HeadingFactory implements Factory
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
     * @return \Flattens\Blade\View\Component
     */
    public function viewComponent()
    {
        $html = $this->transformToHtml($this->attributes['content']);

        return new Heading($html, $this->attributes['attrs']['level']);
    }
}
