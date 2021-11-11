<?php

namespace Flattens\Blade\Bard\Contracts;

interface Factory
{
    /**
     * Set the factory attributes.
     *
     * @param array $attributes;
     * @return $this
     */
    public function with(array $attributes);

    /**
     * Create a new view component instance.
     *
     * @return \Flattens\Blade\View\Component
     */
    public function viewComponent();
}
