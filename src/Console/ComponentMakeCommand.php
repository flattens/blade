<?php

namespace Flattens\Blade\Console;

use Illuminate\Foundation\Console\ComponentMakeCommand as BaseComponentMakeCommand;

class ComponentMakeCommand extends BaseComponentMakeCommand
{
    /**
     * The console command name.
     *
     * @var string
     */
    protected $name = 'flattens:component';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Create a new flattens component class';

    /**
     * Get the stub file for the generator.
     *
     * @return string
     */
    protected function getStub()
    {
        return __DIR__.'/stubs/view-component.stub';
    }

    /**
     * Build the class with the given name.
     *
     * @param  string  $name
     * @return string
     */
    protected function buildClass($name)
    {
        if (! $this->option('inline')) {
            return str_replace(
                'view(\'components.'.$this->getView().'\')',
                'view(\'components.'.$this->getView().'\', $this->data())',
                parent::buildClass($name)
            );
        }

        parent::buildClass($name);
    }
}
