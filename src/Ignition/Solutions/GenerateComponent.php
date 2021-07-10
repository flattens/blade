<?php

namespace Flattens\Ignition\Solutions;

use Facade\IgnitionContracts\Solution;
use Illuminate\Support\Facades\Artisan;
use Facade\IgnitionContracts\RunnableSolution;
use Flattens\Console\ComponentMakeCommand;

class GenerateComponent implements RunnableSolution, Solution
{
    /**
     * The component name.
     *
     * @var string
     */
    protected $component;

    /**
     * Get the solution title.
     *
     * @return string
     */
    public function getSolutionTitle(): string
    {
        return "Your `{$this->component}` component is missing.";
    }

    /**
     * Get the solution description.
     *
     * @return string
     */
    public function getSolutionDescription(): string
    {
        return '';
    }

    /**
     * Get the solution documentation links.
     *
     * @return array
     */
    public function getDocumentationLinks(): array
    {
        return [];
    }

    /**
     * Set the component name.
     *
     * @param string $component
     * @return $this
     */
    public function setComponent($component) : self
    {
        $this->component = $component;

        return $this;
    }

    /**
     * Get the parameters for the runnable solution.
     *
     * @return array
     */
    public function getRunParameters(): array
    {
        return [
            'name' => $this->component,
        ];
    }

    /**
     * Get the button text for the runnable solution.
     *
     * @return array
     */
    public function getRunButtonText(): string
    {
        return 'Generate component';
    }

    /**
     * Get the action description for the solution.
     *
     * @return string
     */
    public function getSolutionActionDescription(): string
    {
        return "Generate your component using `php artisan flattens:component {$this->component}`.";
    }

    /**
     * Run the solution
     *
     * @param array $parameters
     * @return void
     */
    public function run(array $parameters = [])
    {
        Artisan::call(ComponentMakeCommand::class, $parameters);
    }
}
