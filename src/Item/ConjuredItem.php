<?php

namespace GildedRose\Item;

use GildedRose\Quality\Quality;
use GildedRose\Quality\DoubleDecreasingQuality;

/**
 * Conjured items degrade in quality twice as fast as normal items.
 */
class ConjuredItem extends Item
{
    /**
     * @param string $name
     * @param int $sellIn
     * @param Quality $quality
     */
    public function __construct($name, $sellIn, Quality $quality)
    {
        $quality = new DoubleDecreasingQuality($quality->getValue());

        parent::__construct($name, $sellIn, $quality);
    }
}
