<?php

namespace Flattens\Blade;

use Flattens\Blade\Entries\Entry;
use Statamic\Entries\EntryCollection;
use Flattens\Blade\Console\EntityMakeCommand;
use Flattens\Blade\Console\ComponentMakeCommand;

class ServiceProvider extends \Illuminate\Support\ServiceProvider
{
    /**
     * Boot any package services.
     */
    public function boot()
    {
        $this->handleViews();
        $this->registerCommands();
        $this->extendEntryCollection();

        $this->app->bind(\Statamic\Contracts\Entries\Entry::class, Entry::class);
    }

    /**
     * Handle the package views.
     */
    protected function handleViews()
    {
        $path = __DIR__.'/../views';

        $this->loadViewsFrom($path, 'Flattens\Blade');

        $this->publishes([
            $path => resource_path('views/vendor/Flattens\Blade')
        ], 'Flattens\Blade-views');
    }

    /**
     * Register any package console commands.
     */
    protected function registerCommands()
    {
        $this->commands([
            ComponentMakeCommand::class,
            EntityMakeCommand::class,
        ]);
    }

    /**
     * Macro methods to the EntryCollection.
     *
     * @return void
     */
    protected function extendEntryCollection()
    {
        // Add a structure method to the collection.
        EntryCollection::macro('structure', function ($collection = null, $site = 'default') {
            $collection = $collection ?: $this->first()->collectionHandle();

            $tree = \Statamic\Facades\Collection::findByHandle($collection)->structure()->in($site);
            $ids = collect($tree->tree())->pluck('entry')->toArray();

            return $this->sortBy(fn ($entry) => array_search($entry->id(), $ids));
        });

        // Add a entities method to the collection.
        EntryCollection::macro('entities', fn () => $this->map->entity());
    }
}
