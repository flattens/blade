<?php

namespace Flattens\Blade\Assets;

use Statamic\Contracts\Assets\AssetContainer;
use Statamic\Facades\AssetContainer as ContainerFacade;

class Asset
{
    /**
     * The asset container.
     *
     * @var \Statamic\Contracts\Assets\AssetContainer
     */
    protected $container;

    /**
     * Create a new asset instance.
     *
     * @param \Statamic\Contracts\Assets\AssetContainer $container
     * @return void
     */
    public function __construct(AssetContainer $container)
    {
        $this->container = $container;
    }

    /**
     * Get all assets in the given directory.
     *
     * @param string $folder
     * @param bool $recursive
     * @return \Statamic\Assets\AssetCollection
     */
    public function all($folder = '/', $recursive = false)
    {
        return $this->container->assets($folder, $recursive);
    }

    /**
     * Find an asset by its path.
     *
     * @param string $path
     * @return \Statamic\Assets\Asset
     */
    public function find($path)
    {
        return $this->container->asset($path);
    }

    /**
     * Get the image url from the given path.
     *
     * @param string $path
     * @param array|null $params
     * @return string
     */
    public function url($path, $params = null)
    {
        return $this->find($path)->manipulate($params)->build();
    }

    /**
     * Get the current asset container.
     *
     * @return \Statamic\Contracts\Assets\AssetContainer
     */
    public function container()
    {
        return $this->container;
    }

    /**
     * Make a new asset instance.
     *
     * @param string $container
     * @return self
     */
    public static function in(string $container)
    {
        return new static(ContainerFacade::find($container));
    }
}
