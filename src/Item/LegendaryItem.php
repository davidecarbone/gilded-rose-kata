<?php

namespace GildedRose\Item;

use GildedRose\Quality\Quality;
use GildedRose\Quality\StableQuality;

/**
 * Legendary items are not sellable; their quality is 80 and it never alters.
 */
class LegendaryItem extends Item
{
    const SELL_IN_DECREASE_COEFFICIENT = 0;
    const STABLE_QUALITY = 80;

    /**
     * @param string $name
     * @param int $sellIn
     * @param Quality $quality
     */
    public function __construct($name, $sellIn, Quality $quality)
    {
        // Legendary items' quality is 80 and it never alters
        parent::__construct($name, $sellIn, new StableQuality(self::STABLE_QUALITY));
    }
}
