<?php

namespace GildedRose\Test;

use GildedRose\LegendaryItem;
use PHPUnit\Framework\TestCase;
use GildedRose\GildedRose;
use GildedRose\Item;

class GildedRoseTest extends TestCase
{
    public function testFoo()
    {
        /** @var Item[] $items */
        $items = [
            new Item("foo", 0, 0)
        ];

        $gildedRose = new GildedRose($items);
        $gildedRose->updateItemsMarketValue();

        $itemProperties = $items[0]->basicProperties();

        $this->assertEquals("foo", $itemProperties['name']);
    }

    public function testLegendaryItemsFixedQuality()
    {
        $item = new LegendaryItem("Sulfuras", 0, 10);
        $itemProperties = $item->basicProperties();

        $this->assertEquals(LegendaryItem::MAX_QUALITY, $itemProperties['quality']);
    }
}
