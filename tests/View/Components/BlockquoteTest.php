<?php

namespace Flattens\Blade\Tests\View\Components;

use Flattens\Blade\Tests\TestCase;
use Flattens\Blade\View\Components\Blockquote;
use Flattens\Blade\View\Components\Paragraph;

class BlockquoteTest extends TestCase
{
    /** @test */
    public function it_renders_the_template()
    {
        $component = new Blockquote([new Paragraph('Lorem ipsum')]);

        $component->withAttributes(['class' => 'quote']);

        $this->assertEquals(
            '<blockquote class="quote"><p class="quote-data">Lorem ipsum</p></blockquote>',
            str_replace(PHP_EOL, '', (string) $component->render())
        );
    }
}
