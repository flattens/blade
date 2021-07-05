<?php

namespace Flattens\Tests\View\Components;

use Flattens\Tests\TestCase;
use Flattens\View\Components\Table;
use Flattens\View\Components\TableRow;
use Flattens\View\Components\Paragraph;
use Flattens\View\Components\TableCell;
use Flattens\View\Components\Blockquote;

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
