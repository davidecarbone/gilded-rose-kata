<?php

namespace GildedRose;

/**
 * Legendary items are not sellable; their quality is 80 and it never alters.
 */
class LegendaryItem extends Item
{
    const MIN_QUALITY = 80;
    const MAX_QUALITY = 80;
    const QUALITY_DECREASE_COEFFICIENT = 0;
    const SELL_IN_DECREASE_COEFFICIENT = 0;

    /**
     * @param string $name
     * @param int $sellIn
     * @param int $quality
     */
    public function __construct($name, $sellIn, $quality)
    {
        // Legendary items' quality is 80 and it never alters
        parent::__construct($name, $sellIn, self::MAX_QUALITY);
    }
}
