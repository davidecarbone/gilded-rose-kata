<?php

namespace GildedRose;

/**
 * Backstage passes increase in quality as their SellIn value approaches;
 * quality increases by 2 when there are 10 days or less and by 3 when there are 5 days or less;
 * quality drops to 0 when their SellIn value is minor than 0.
 */
class BackstagePass extends Item
{
    const SELL_IN_FIRST_THRESHOLD = 10;
    const SELL_IN_SECOND_THRESHOLD = 5;


    public function updateQuality()
    {
        if ($this->sellIn < 0) {
            $this->quality = self::MIN_QUALITY;
        } else {
            $this->increaseQuality();

            if ($this->sellIn < self::SELL_IN_FIRST_THRESHOLD) {
                $this->increaseQuality();
            }

            if ($this->sellIn < self::SELL_IN_SECOND_THRESHOLD) {
                $this->increaseQuality();
            }
        }

    }
}
