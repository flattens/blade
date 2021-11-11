<?php

namespace Flattens\Blade\Bard\Factories;

use Flattens\Blade\Bard\Bard;
use Illuminate\Support\Collection;
use Flattens\Blade\Bard\Contracts\Factory;
use Flattens\Blade\View\Components\Blockquote;
use Flattens\Blade\View\Components\CodeBlock;

class CodeBlockFactory implements Factory
{
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
        $text = Collection::make($this->attributes['content'])->pluck('text')->first();

        return new CodeBlock($text);
    }
}
