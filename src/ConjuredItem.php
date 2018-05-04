<?php

namespace GildedRose;

/**
 * Conjured items degrade in quality twice as fast as normal items.
 */
class ConjuredItem extends Item
{
    const QUALITY_DECREASE_COEFFICIENT = 2;
}
