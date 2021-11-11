<?php

namespace Flattens\Blade\View;

use Exception;
use Throwable;
use Illuminate\Support\Str;
use Facade\IgnitionContracts\Solution;
use Facade\IgnitionContracts\ProvidesSolution;
use Flattens\Blade\Ignition\Solutions\GenerateComponent;

class ComponentNotFoundException extends Exception implements ProvidesSolution
{
    /**
     * The full class name of the missing component.
     */
    protected $className;

    /**
     * Create a new exception instance.
     *
     * @param string $class
     * @param \Throwable|null $previous
     * @return void
     */
    public function __construct(string $class, Throwable $previous = null)
    {
        $this->className = Str::afterLast($class, '\\');
        parent::__construct(sprintf('Class "%s" not found.', $class), 0, $previous);
    }

    /**
     * Get the solution for the exception.
     *
     * @return \Facade\IgnitionContracts\Solution
     */
    public function getSolution() : Solution
    {
        return tap(new GenerateComponent(), function ($solution) {
            $solution->setComponent($this->className);
        });
    }
}
