<?php

namespace Flattens\Entries;

use Illuminate\Http\Response;
use Illuminate\Support\Facades\View;
use Flattens\Entities\Entity;
use Flattens\Entities\Factory as EntityFactory;
use Statamic\Entries\Entry as BaseEntry;
use Statamic\Contracts\Entries\Entry as Contract;

class Entry extends BaseEntry implements Contract
{
    /**
     * The concrete definition of the entry.
     *
     * @var \Flattens\Entities\Entity
     */
    protected $entity;

    /**
     * The preview state of the entry.
     *
     * @var bool
     */
    protected $preview = false;

    /**
     * The preview state of the entry.
     *
     * @var bool
     */
    protected $template = 'default';

    /**
     * Get the entity of the entry.
     *
     * @return \Flattens\Entities\Entity
     */
    public function entity()
    {
        if (! $this->entity) {
            $this->entity = EntityFactory::make($this);
        }

        return $this->entity;
    }

    /**
     * Get any data from the entry.
     *
     * @param string $key
     * @return mixed
     */
    public function get($key, $fallback = null)
    {
        if ($this->preview) {
            return $this->getSupplement($key);
        }

        return parent::get($key, $fallback);
    }

    /**
     * The live preview url of the entry.
     *
     * @return string|null
     */
    public function livePreviewUrl()
    {
        return $this->cpUrl('collections.entries.preview.edit');
    }

    /**
     * Convert the entry instance to an array.
     *
     * @return array
     */
    public function toArray()
    {
        return $this->values();
    }

    /**
     * Convert the entry instance to an http response.
     *
     * @return \Illuminate\Http\Response
     */
    public function toResponse($request)
    {
        $content = View::make(
            $this->entity()->template(),
            ['content' => $this->entity()]
        )->render();
        
        return new Response($content);
    }

    /**
     * Convert the entry to a live preview response.
     *
     * @return \Illuminate\Http\Response
     */
    public function toLivePreviewResponse($request, $extras)
    {
        $this->preview = true;

        return $this->toResponse($request);
    }
}
