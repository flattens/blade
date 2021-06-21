<?php

namespace Flattens\Flattens\Bard\Concerns;

use Illuminate\Support\Str;

trait ResolvesFactories
{
    /**
     * Create a new factory instance.
     *
     * @return \Flattens\Flattens\Bard\Contracts\Factory
     */
    protected function factory(string $type)
    {
        $className = (string) Str::of($type)->camel()->ucfirst()->prepend('Flattens\\Flattens\\Bard\\Factories\\')->append('Factory');

        return new $className;
    }
}
