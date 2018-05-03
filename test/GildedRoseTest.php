<?php

namespace GildedRose\Test;

use PHPUnit\Framework\TestCase;
use GildedRose\GildedRose;
use GildedRose\Item;

class GildedRoseTest extends TestCase
{
    public function testFoo()
    {
        $items = [
            new Item("foo", 0, 0)
        ];

        $gildedRose = new GildedRose($items);
        $gildedRose->updateItemsQualityAndSellIn();

        $this->assertEquals("foo", $items[0]->name);
    }
}
