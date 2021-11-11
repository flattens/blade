<?php

namespace Flattens\Blade\Tests\View\Components;

use Flattens\Blade\Tests\TestCase;
use Flattens\Blade\View\Components\Paragraph;

class ParagraphTest extends TestCase
{
    /** @test */
    public function it_renders_the_template()
    {
        $component = new Paragraph('Lorem ipsum dolor sit amet, consetetur sadipscing elitr, sed diam voluptua.');

        $component->withAttributes(['class' => 'paragraph']);

        $this->assertEquals('<p class="paragraph">Lorem ipsum dolor sit amet, consetetur sadipscing elitr, sed diam voluptua.</p>', (string) $component->render());
    }
}
