<?php

namespace GildedRose;

class GildedRose
{
    /** @var Item[] $items */
    private $items;


    /**
     * @param Item[] $items
     */
    public function __construct(array $items)
    {
        $this->items = $items;
    }

    /**
     * At the end of each day, update items quality and sellIn properties.
     */
    public function updateItemsMarketValue()
    {
        foreach ($this->items as $item) {
            $item->updateMarketValue();
        }
    }
}
