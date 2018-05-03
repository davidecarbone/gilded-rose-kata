<?php

namespace GildedRose;

/**
 * Legendary items never have to be sold and never decrease in quality.
 */
class LegendaryItem extends Item
{
    public function updateQuality()
    {
        // Legendary items never decrease quality
    }

    public function decreaseSellIn()
    {
        // Legendary items never decrease sellIn
    }
}
