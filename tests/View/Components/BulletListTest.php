<?php

namespace Flattens\Blade\Tests\View\Components;

use Flattens\Blade\Tests\TestCase;
use Flattens\Blade\View\Components\BulletList;
use Flattens\Blade\View\Components\ListItem;
use Flattens\Blade\View\Components\Paragraph;

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
