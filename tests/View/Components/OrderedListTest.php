<?php

namespace Flattens\Tests\View\Components;

use Flattens\Tests\TestCase;
use Flattens\View\Components\ListItem;
use Flattens\View\Components\Paragraph;
use Flattens\View\Components\OrderedList;

class OrderedListTest extends TestCase
{
    /** @test */
    public function it_renders_the_template()
    {
        $component = new OrderedList([
            new ListItem([new Paragraph('Lorem ipsum')]),
        ]);

        $component->withAttributes(['class' => 'list']);

        $this->assertEquals(
            '<ol class="list"><li class="item"><p class="item-value">Lorem ipsum</p></li></ol>',
            str_replace(PHP_EOL, '', (string) $component->render())
        );
    }
}
