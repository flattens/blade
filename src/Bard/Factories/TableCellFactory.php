<?php

namespace Flattens\Flattens\Bard\Factories;

use Flattens\Flattens\Bard\Bard;
use Flattens\Flattens\Bard\Contracts\Factory;
use Flattens\Flattens\View\Components\TableCell;

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
     * @return \Flattens\Flattens\View\Component
     */
    public function viewComponent()
    {
        return new TableCell(
            Bard::make($this->attributes['content'])->components(),
            $this->attributes['attrs'] ?? []
        );
    }
}
