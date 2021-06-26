<?php

namespace Flattens\Flattens\Entries;

use Statamic\Contracts\Entries\Entry;
use Statamic\Stache\Repositories\EntryRepository;
use Statamic\Contracts\Entries\EntryRepository as Contract;

class EntriesRepository extends EntryRepository implements Contract
{
    public static function bindings(): array
    {
        return array_merge(parent::bindings(), [
            \Statamic\Contracts\Entries\Entry::class => Entry::class,
        ]);
    }
}
