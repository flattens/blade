<?php

namespace Flattens\Flattens\Bard;

use Flattens\Flattens\Bard\Concerns\ResolvesFactories;

class Bard
{
    use ResolvesFactories;

    /**
     * The bard sections.
     *
     * @var array
     */
    protected $sections;

    /**
     * Create a new bard instance.
     */
    public function __construct(array $sections)
    {
        $this->sections = $sections;
    }

    /**
     * Create a new bard instance.
     *
     * @return self
     */
    public static function make(array $sections)
    {
        return new static($sections);
    }
    
    /**
     * Get the bard sections as components.
     *
     * @return \Flattens\Flattens\View\Component[]
     */
    public function components()
    {
        return array_map(function ($attributes) {
            return $this->factory($attributes['type'])->with($attributes)->viewComponent();
        }, $this->sections);
    }
}
