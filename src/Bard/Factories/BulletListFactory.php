<?php

namespace Flattens\Bard\Factories;

use Flattens\Bard\Bard;
use Flattens\Bard\Contracts\Factory;
use Flattens\View\Components\BulletList;

class BulletListFactory implements Factory
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
     * @return \Flattens\View\Component
     */
    public function viewComponent()
    {
        return new BulletList(
            Bard::make($this->attributes['content'])->components()
        );
    }
}
