<?php

namespace Flattens\Bard\Concerns;

use Illuminate\Support\Str;

trait ResolvesFactories
{
    /**
     * Create a new factory instance.
     *
     * @return \Flattens\Bard\Contracts\Factory
     */
    protected function factory(string $type)
    {
        $className = (string) Str::of($type)->camel()->ucfirst()->prepend('Flattens\\Bard\\Factories\\')->append('Factory');

        return new $className;
    }
}
