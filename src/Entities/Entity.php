<?php

namespace Flattens\Entities;

use Flattens\Bard\Bard;
use Flattens\Entries\Entry;

class Entity
{
    /**
     * The entry of the entity.
     *
     * @var \Flattens\Entries\Entry
     */
    protected $entry;

    /**
     * Create a new entity instance.
     *
     * @param \Flattens\Entries\Entry $entry
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
     * @return \Flattens\View\Component[]
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
}
