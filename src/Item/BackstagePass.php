<?php

namespace GildedRose\Item;

/**
 * Backstage passes increase in quality as their sellIn value approaches;
 * quality increases by 2 when there are 10 days or less and by 3 when there are 5 days or less;
 * quality drops to 0 when their sellIn value is minor than 0.
 */
class BackstagePass extends Item
{
    const SELL_IN_FIRST_THRESHOLD = 10;
    const SELL_IN_SECOND_THRESHOLD = 5;

    public function updateQuality()
    {
        if ($this->sellIn < 0) {
            $this->quality->dropToMinimum();
        } else {
            $this->quality->increase();

            if ($this->sellIn < self::SELL_IN_FIRST_THRESHOLD) {
                $this->quality->increase();
            }

            if ($this->sellIn < self::SELL_IN_SECOND_THRESHOLD) {
                $this->quality->increase();
            }
        }
    }
}
