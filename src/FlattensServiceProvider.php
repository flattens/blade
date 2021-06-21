<?php

namespace Flattens\Flattens;

use Illuminate\Support\ServiceProvider;

class FlattensServiceProvider extends ServiceProvider
{
    public function boot()
    {
        $this->loadViewsFrom(__DIR__.'/../views', 'flattens');
    }
}
