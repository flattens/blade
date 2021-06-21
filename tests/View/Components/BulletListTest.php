<?php

namespace Flattens\Flattens\Tests\View\Components;

use Flattens\Flattens\Tests\TestCase;
use Flattens\Flattens\View\Components\BulletList;
use Flattens\Flattens\View\Components\ListItem;
use Flattens\Flattens\View\Components\Paragraph;

class BulletListTest extends TestCase
{
    /** @test */
    public function it_renders_the_template()
    {
        $component = new BulletList([
            new ListItem([new Paragraph('Lorem ipsum')]),
        ]);

        $component->withAttributes(['class' => 'bullets']);

        $this->assertEquals(
            '<ul class="bullets"><li class="item"><p class="item-value">Lorem ipsum</p></li></ul>',
            str_replace(PHP_EOL, '', (string) $component->render())
        );
    }
}