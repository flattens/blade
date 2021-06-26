<?php

namespace Flattens\Flattens;

use Flattens\Flattens\Console\ComponentMakeCommand;
use Flattens\Flattens\Entries\EntriesRepository;
use Illuminate\Support\ServiceProvider;

class FlattensServiceProvider extends ServiceProvider
{
    /**
     * Register container bindings.
     */
    public $bindings = [
        \Statamic\Contracts\Entries\EntryRepository::class => EntriesRepository::class
    ];

    /**
     * Boot any package services.
     */
    public function boot()
    {
        $this->handleViews();
        $this->registerCommands();
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
        ]);
    }
}
