<?php

namespace Flattens\Flattens;

use Flattens\Flattens\Entries\Entry;
use Flattens\Flattens\Console\EntityMakeCommand;
use Flattens\Flattens\Console\ComponentMakeCommand;

class FlattensServiceProvider extends \Illuminate\Support\ServiceProvider
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
        if (! $this->app->runningInConsole()) {
            return;
        }

        $this->commands([
            ComponentMakeCommand::class,
            EntityMakeCommand::class,
        ]);
    }
}
