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

    public function updateItemsQualityAndSellIn()
    {
        foreach ($this->items as $item) {
            $item->decreaseSellIn();
            $item->updateQuality();
        }
    }
}
