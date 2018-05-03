<?php

namespace GildedRose;

/**
 * Aged items increase in quality as their SellIn value approaches.
 */
class AgedItem extends Item
{
    public function updateQuality()
    {
        $this->increaseQuality();

        if ($this->sellIn < 0) {
            $this->increaseQuality();
        }
    }
}
