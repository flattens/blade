<?php

namespace Flattens;

use Flattens\Entries\Entry;
use Flattens\Console\EntityMakeCommand;
use Flattens\Console\ComponentMakeCommand;

class ServiceProvider extends \Illuminate\Support\ServiceProvider
{
    /**
     * Boot any package services.
     */
    public function boot()
    {
        $this->handleViews();
        $this->registerCommands();

        $this->app->bind(\Statamic\Contracts\Entries\Entry::class, Entry::class);
    }

    /**
     * Handle the package views.
     */
    protected function handleViews()
    {
        $path = __DIR__.'/../views';

        $this->loadViewsFrom($path, 'flattens');

        $this->publishes([
            $path => resource_path('views/vendor/flattens')
        ], 'flattens-views');
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
}
