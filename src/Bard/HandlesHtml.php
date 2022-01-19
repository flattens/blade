<?php

namespace Flattens\Blade\Bard;

use Flattens\Blade\Facades\Entry;
use Illuminate\Support\Str;
use Illuminate\Support\HtmlString;
use Statamic\Assets\Asset;

trait HandlesHtml
{
    /**
     * The available html tags.
     *
     * @var array
     */
    protected $availableTags = [
        'bold' => 'strong',
        'code' => 'code',
        'italic' => 'i',
        'link' => 'a',
        'strike' => 'strike',
        'subscript' => 'sub',
        'superscript' => 'sup',
        'underline' => 'u',
    ];

    /**
     * A map to link types to methods.
     *
     * @var array
     */
    protected $availableMethods = [
        'text' => 'transformText',
        'hard_break' => 'transformBreak',
    ];

    /**
     * A map to link instance types to its belonging facades.
     *
     * @var array
     */
    protected $availableRelations = [
        'entry' => Entry::class,
        'asset' => Asset::class,
    ];

    /**
     * Transform content to html.
     *
     * @param array $content
     * @return \Illuminate\Support\HtmlString
     */
    public function transformToHtml(array $content)
    {
        $html = implode('', array_map(function ($part) {
            return $this->{$this->availableMethods[$part['type']]}($part);
        }, $content));

        return new HtmlString($html);
    }

    /**
     * Prepare a html string.
     *
     * @param array $part
     * @return string
     */
    protected function transformText(array $part)
    {
        $tags = $this->createTags($part['marks'] ?? []);

        return sprintf($tags, $part['text']);
    }

    /**
     * Prepare a html string.
     *
     * @param array $part
     * @return string
     */
    protected function transformBreak(array $part)
    {
        return '<br />';
    }

    /**
     * Create html tags and attributes from marks.
     *
     * @param array $marks
     * @return string
     */
    protected function createTags(array $marks)
    {
        $tags = '%s';

        foreach ($marks as $mark) {
            $tag = $this->availableTags[$mark['type']];
            $attrs = $this->createAttributes($mark['attrs'] ?? []);
            $tags = sprintf($tags, "<{$tag}{$attrs}>%s</{$tag}>");
        }

        return $tags;
    }

    /**
     * Create an attributes string.
     *
     * @param array $attrs
     * @return string
     */
    protected function createAttributes(array $attrs)
    {
        $attrs = array_map(function ($key, $value) {
            if ($value) {
                return $this->createAttributeString($key, $value);
            }
        }, array_keys($attrs), $attrs);

        return count($attrs) ? ' '.implode(' ', $attrs) : '';
    }

    /**
     * Create an attribute string from the given key value pair.
     *
     * @param string $key
     * @param string $value
     * @return string
     */
    protected function createAttributeString($key, $value)
    {
        if(Str::startsWith($value, $prefix = 'statamic://')) {
            [$type, $id] = explode('::', Str::after($value, $prefix));

            $instance = $this->availableRelations[$type]::find($id);

            $value = $instance->url();
        }

        return "{$key}=\"{$value}\"";
    }
}
