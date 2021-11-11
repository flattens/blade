<?php

namespace Flattens\Blade\Entities;

use Flattens\Blade\Bard\Bard;
use Flattens\Blade\Entries\Entry;

class Entity
{
    /**
     * The entry of the entity.
     *
     * @var \Flattens\Blade\Entries\Entry
     */
    protected $entry;

    /**
     * Create a new entity instance.
     *
     * @param \Flattens\Blade\Entries\Entry $entry
     */
    public function __construct(Entry $entry)
    {
        $this->entry = $entry;
    }

    /**
     * The associated template of the entity.
     *
     * @return string|null
     */
    public function template()
    {
        return $this->entry->template();
    }

    /**
     * The view components from the given key.
     *
     * @param string $key
     * @return \Flattens\Blade\View\Component[]
     */
    public function components($key)
    {
        return Bard::make($this->$key)->components();
    }

    /**
     * Get any property from the entry of the entity.
     *
     * @param string $property
     * @return mixed
     */
    public function __get($property)
    {
        return $this->entry->$property;
    }

    /**
     * Call any method from the entry of the entity.
     *
     * @param string $method
     * @param mixed $arguments
     * @return mixed
     */
    public function __call($method, $arguments)
    {
        return call_user_func_array([$this->entry, $method], $arguments);
    }
}
