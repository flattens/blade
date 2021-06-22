<?php

namespace Flattens\Flattens;

use Flattens\Flattens\Console\ComponentMakeCommand;
use Illuminate\Support\ServiceProvider;

class FlattensServiceProvider extends ServiceProvider
{
    public function boot()
    {
        $this->loadViewsFrom(__DIR__.'/../views', 'flattens');
        $this->registerCommands();

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
}
