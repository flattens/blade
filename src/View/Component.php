<?php

namespace Flattens\Blade\View;

use Illuminate\Support\Str;
use Illuminate\View\Component as ViewComponent;

abstract class Component extends ViewComponent
{
    public function name()
    {
        $path = explode('\\', get_called_class());

        return Str::kebab(array_pop($path));
    }

    public function styles(array $styles)
    {
        if (! array_key_exists($this->name(), $styles)) {
            return $this;
        }

        return $this->withAttributes(['class' => $styles[$this->name()]]);
    }
}
