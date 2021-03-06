<?php

namespace Flattens\Blade\Bard\Factories;

use Flattens\Blade\Bard\Bard;
use Flattens\Blade\Bard\Contracts\Factory;
use Flattens\Blade\View\Components\TableCell;

class TableCellFactory implements Factory
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
        return new TableCell(
            Bard::make($this->attributes['content'])->components(),
            $this->attributes['attrs'] ?? []
        );
    }
}
