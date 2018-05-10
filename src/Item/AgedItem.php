<?php

namespace GildedRose\Item;

/**
 * Aged items increase in quality as their sellIn value approaches.
 */
class AgedItem extends Item
{
    public function updateQuality()
    {
        $this->quality->increase();

        // Once the sell by date has passed, quality increases twice as fast
        if ($this->sellIn < 0) {
            $this->quality->increase();
        }
    }
}
