<?php

namespace Flattens\Flattens\Tests\View\Components;

use Flattens\Flattens\Tests\TestCase;
use Flattens\Flattens\View\Components\Table;
use Flattens\Flattens\View\Components\TableRow;
use Flattens\Flattens\View\Components\Paragraph;
use Flattens\Flattens\View\Components\TableCell;
use Flattens\Flattens\View\Components\Blockquote;

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
