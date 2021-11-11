<?php

namespace Flattens\Blade\Tests\Bard;

use Flattens\Blade\Bard\Bard;
use Flattens\Blade\Tests\TestCase;
use Flattens\Blade\View\Components\Table;
use Flattens\Blade\View\Components\Heading;
use Flattens\Blade\View\Components\ListItem;
use Flattens\Blade\View\Components\TableRow;
use Flattens\Blade\View\Components\Paragraph;
use Flattens\Blade\View\Components\TableCell;
use Flattens\Blade\View\Components\Blockquote;
use Flattens\Blade\View\Components\BulletList;
use Flattens\Blade\View\Components\OrderedList;

class BardTest extends TestCase
{
    /** @test */
    public function it_tranforms_paragraphs_into_components()
    {
        $bard = new Bard([
            [
                'type' => 'paragraph',
                'content' => [
                    [
                        'type' => 'text',
                        'text' => 'Lorem ipsum dolor sit amet.'
                    ],
                ]
            ]
        ]);

        $this->assertEquals([new Paragraph('Lorem ipsum dolor sit amet.')], $bard->components());
    }

    /** @test */
    public function it_tranforms_headings_into_components()
    {
        $bard = new Bard([
            [
                'type' => 'heading',
                'attrs' => [
                    'level' => 3,
                ],
                'content' => [
                    [
                        'type' => 'text',
                        'text' => 'Lorem ipsum dolor sit amet'
                    ],
                ]
            ]
        ]);

        $this->assertEquals([new Heading('Lorem ipsum dolor sit amet', 3)], $bard->components());
    }

    /** @test */
    public function it_tranforms_bullet_lists_into_components_and_subcomponents()
    {
        $bard = new Bard([
            [
                'type' => 'bullet_list',
                'content' => [
                    [
                        'type' => 'list_item',
                        'content' => [
                            [
                                'type' => 'paragraph',
                                'content' => [
                                    [
                                        'type' => 'text',
                                        'text' => 'Lorem ipsum dolor sit amet.'
                                    ],
                                ]
                            ]
                        ]
                    ]
                ]
            ]
        ]);

    
        $this->assertEquals([
            new BulletList([new ListItem([new Paragraph('Lorem ipsum dolor sit amet.')])])
        ], $bard->components());
    }

    /** @test */
    public function it_tranforms_ordered_lists_into_components_and_subcomponents()
    {
        $bard = new Bard([
            [
                'type' => 'ordered_list',
                'content' => [
                    [
                        'type' => 'list_item',
                        'content' => [
                            [
                                'type' => 'paragraph',
                                'content' => [
                                    [
                                        'type' => 'text',
                                        'text' => 'Lorem ipsum dolor sit amet.'
                                    ],
                                ]
                            ]
                        ]
                    ]
                ]
            ]
        ]);

    
        $this->assertEquals([
            new OrderedList([new ListItem([new Paragraph('Lorem ipsum dolor sit amet.')])])
        ], $bard->components());
    }

    /** @test */
    public function it_tranforms_blockquotes_into_components()
    {
        $bard = new Bard([
             [
                 'type' => 'blockquote',
                 'content' => [
                     [
                        'type' => 'paragraph',
                        'content' => [
                            [
                                'type' => 'text',
                                'text' => 'Lorem ipsum dolor sit amet.'
                            ],
                        ]
                     ],
                 ]
             ]
         ]);
 
        $this->assertEquals([new Blockquote([new Paragraph('Lorem ipsum dolor sit amet.')])], $bard->components());
    }

    /** @test */
    public function it_tranforms_tables_into_components()
    {
        $bard = new Bard([
             [
                 'type' => 'table',
                 'content' => [
                     [
                        'type' => 'table-row',
                        'content' => [
                            [
                                'type' => 'table-cell',
                                'content' => [
                                    [
                                        'type' => 'paragraph',
                                        'content' => [
                                            [
                                                'type' => 'text',
                                                'text' => 'Lorem ipsum dolor sit amet.'
                                            ],
                                        ]
                                    ],
                                ]
                            ],
                        ]
                     ],
                 ]
             ]
         ]);
 
        $this->assertEquals([
            new Table([
                new TableRow([
                    new TableCell([
                        new Paragraph('Lorem ipsum dolor sit amet.')
                    ])
                ])
            ])
        ], $bard->components());
    }
}
