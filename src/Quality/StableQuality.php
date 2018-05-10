<?php

namespace GildedRose\Quality;

class StableQuality extends Quality
{
    const QUALITY_DECREASE_COEFFICIENT = 0;

    public function increase()
    {
        // Stable quality cannot be altered
    }

    public function decrease()
    {
        // Stable quality cannot be altered
    }

    public function dropToMinimum()
    {
        // Stable quality cannot be altered
    }
}
