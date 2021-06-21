<?php

namespace Flattens\Flattens\Tests\View\Components;

use Flattens\Flattens\Tests\TestCase;
use Flattens\Flattens\View\Components\Paragraph;

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
