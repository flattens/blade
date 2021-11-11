<?php

namespace Flattens\Blade\Bard\Factories;

use Illuminate\Support\Arr;
use Illuminate\Support\Stringable;
use Illuminate\Support\Facades\App;
use Flattens\Blade\Bard\Contracts\Factory;
use Flattens\Blade\View\ComponentNotFoundException;

class SetFactory implements Factory
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
        return $this->buildComponent();
    }

    /**
     * Get nested data from the factory attributes.
     *
     * @param string $key
     * @return mixed
     */
    protected function data($key = null)
    {
        $values = Arr::get($this->attributes, "attrs.values");

        return $key ? $values[$key] : $values;
    }

    /**
     * Build the view component.
     *
     * @return \Flattens\Blade\View\Component
     */
    protected function buildComponent()
    {
        $className = $this->getClassName();

        if (! class_exists($className)) {
            throw new ComponentNotFoundException($className);
        }
        
        return new $className($this->data());
    }

    /**
     * Get the full component class name.
     *
     * @return string
     */
    protected function getClassName()
    {
        $className = new Stringable($this->data('type'));
        return $this->getNamespace() . (string) $className->camel()->ucfirst();
    }

    /**
     * Get the components namespace.
     *
     * @return string
     */
    protected function getNamespace()
    {
        return App::getNamespace() . 'View\\Components\\';
    }
}
