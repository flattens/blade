<?php

namespace Flattens\Flattens\Entries;

use Flattens\Flattens\Bard\Bard;

class Entity
{
    /**
     * The entry of the entity.
     *
     * @var \Flattens\Flattens\Entries\Entry
     */
    protected $entry;

    /**
     * The live preview support of the entity.
     *
     * @var bool
     */
    public $livePreview = true;

    /**
     * Create a new entity instance.
     *
     * @param \Flattens\Flattens\Entries\Entry $entry
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
        return null;
    }

    /**
     * The view components from the given key.
     *
     * @param string $key
     * @return \Flattens\Flattens\View\Component[]
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
