<?php

namespace Flattens\Flattens\Tests;

use Flattens\Flattens\FlattensServiceProvider;

class TestCase extends \Orchestra\Testbench\TestCase
{
    protected function getPackageProviders($app)
    {
        return [FlattensServiceProvider::class];
    }
}
