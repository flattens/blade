<?php

namespace Flattens\Bard;

use Flattens\Bard\Concerns\ResolvesFactories;

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
     *
     * @param array $sections
     */
    public function __construct(array $sections)
    {
        $this->sections = $sections;
    }

    /**
     * Create a new bard instance.
     *
     * @param array|null $sections
     * @return self
     */
    public static function make($sections)
    {
        return new static($sections ?? []);
    }
    
    /**
     * Get the bard sections as components.
     *
     * @return \Flattens\View\Component[]
     */
    public function components()
    {
        return array_map(function ($attributes) {
            return $this->factory($attributes['type'])->with($attributes)->viewComponent();
        }, $this->sections);
    }
}
