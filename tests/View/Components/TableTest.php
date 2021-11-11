<?php

namespace Flattens\Blade\Tests\View\Components;

use Flattens\Blade\Tests\TestCase;
use Flattens\Blade\View\Components\Table;
use Flattens\Blade\View\Components\TableRow;
use Flattens\Blade\View\Components\Paragraph;
use Flattens\Blade\View\Components\TableCell;
use Flattens\Blade\View\Components\Blockquote;

class TableTest extends TestCase
{
    /** @test */
    public function it_renders_the_template()
    {
        $component = new Table([
            new TableRow([
                new TableCell([
                    new Paragraph('Lorem ipsum')
                ])
            ])
        ]);

        $component->withAttributes(['class' => 'table']);

        $this->assertEquals(
            '<table class="table"><tr class="row"><td ><p class="table-data">Lorem ipsum</p></td></tr></table>',
            str_replace(PHP_EOL, '', (string) $component->render())
        );
    }
}
