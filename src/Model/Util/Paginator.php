<?php

namespace VentureLeap\LeapOneSymfonySdk\Model\Util;

class Paginator
{
    private array $items;
    private int $count;

    public function __construct(array $items, int $count)
    {
        $this->items = $items;
        $this->count = $count;
    }

    public function getItems(): array
    {
        return $this->items;
    }

    public function getCount(): int
    {
        return $this->count;
    }
}
