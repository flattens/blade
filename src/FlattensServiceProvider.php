<?php

namespace Flattens\Flattens;

use Flattens\Flattens\Console\ComponentMakeCommand;
use Illuminate\Support\ServiceProvider;

class FlattensServiceProvider extends ServiceProvider
{
    public function boot()
    {
        $this->registerCommands();
        $this->loadViewsFrom($this->viewsPath(), 'flattens');

        $this->publishes([
            $this->viewsPath() => resource_path('views/vendor/flattens'),
        ], 'flattens-views');
    }

    protected function registerCommands()
    {
        if (! $this->app->runningInConsole()) {
            return;
        }

        $this->commands([
            ComponentMakeCommand::class,
        ]);
    }

    protected function viewsPath()
    {
        return __DIR__.'/../views';
    }
}
