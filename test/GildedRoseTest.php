<?php

namespace GildedRose\Test;

use GildedRose\Item\LegendaryItem;
use GildedRose\Quality\Quality;
use PHPUnit\Framework\TestCase;
use GildedRose\GildedRose;
use GildedRose\Item\Item;

class GildedRoseTest extends TestCase
{
    public function testFoo()
    {
        /** @var Item[] $items */
        $items = [
            new Item("foo", 0, new Quality(0))
        ];

        $gildedRose = new GildedRose($items);
        $gildedRose->updateItemsMarketValue();

        $itemProperties = $items[0]->basicProperties();

        $this->assertEquals("foo", $itemProperties['name']);
    }

    public function testLegendaryItemsFixedQuality()
    {
        $item = new LegendaryItem("Sulfuras", 0, new Quality(10));
        $itemProperties = $item->basicProperties();

        $this->assertEquals(LegendaryItem::STABLE_QUALITY, $itemProperties['quality']);
    }
}
