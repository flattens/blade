<?php

namespace Flattens\Blade\Tests\View\Components;

use Flattens\Blade\Tests\TestCase;
use Flattens\Blade\View\Components\Heading;

class HeadingTest extends TestCase
{
    /** @test */
    public function it_renders_the_template()
    {
        $component = new Heading('Lorem ipsum dolor sit amet.', 3);

        $component->withAttributes(['class' => 'heading']);

        $this->assertEquals('<h3 class="heading">Lorem ipsum dolor sit amet.</h3>', (string) $component->render());
    }
}
