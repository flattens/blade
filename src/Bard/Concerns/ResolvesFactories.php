<?php

namespace Flattens\Blade\Bard\Concerns;

use Illuminate\Support\Str;

trait ResolvesFactories
{
    /**
     * Create a new factory instance.
     *
     * @return \Flattens\Blade\Bard\Contracts\Factory
     */
    protected function factory(string $type)
    {
        $className = (string) Str::of($type)->camel()->ucfirst()->prepend('Flattens\Blade\\Bard\\Factories\\')->append('Factory');

        return new $className;
    }
}
