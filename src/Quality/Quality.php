<?php

namespace GildedRose\Quality;

class Quality
{
    const MIN_QUALITY = 0;
    const MAX_QUALITY = 50;
    const QUALITY_INCREASE_COEFFICIENT = 1;
    const QUALITY_DECREASE_COEFFICIENT = 1;

    /** @var int */
    private $quality;

    /**
     * @param int $quality
     */
    public function __construct($quality)
    {
        $this->quality = $quality;
    }

    public function getValue()
    {
        return $this->quality;
    }

    public function increase()
    {
        if ($this->quality < self::MAX_QUALITY) {
            $this->quality = $this->quality + static::QUALITY_INCREASE_COEFFICIENT;
        }
    }

    public function decrease()
    {
        if ($this->quality > self::MIN_QUALITY) {
            $this->quality = $this->quality - static::QUALITY_DECREASE_COEFFICIENT;
        }
    }

    public function dropToMinimum()
    {
        $this->quality = self::MIN_QUALITY;
    }
}
