<?php

namespace GildedRose;

/**
 * All items have a SellIn value which denotes the number of days we have to sell the item;
 * all items have a Quality value which denotes how valuable the item is;
 * once the sell by date has passed, quality degrades twice as fast;
 * the quality of an item is never negative;
 * the quality of an item is never more than 50.
 */
class Item
{
    const MIN_QUALITY = 0;
    const MAX_QUALITY = 50;
    const QUALITY_INCREASE_COEFFICIENT = 1;
    const QUALITY_DECREASE_COEFFICIENT = 1;
    const SELL_IN_DECREASE_COEFFICIENT = 1;

    protected $name;
    protected $sellIn;
    protected $quality;


    /**
     * @param string $name
     * @param int $sellIn
     * @param int $quality
     */
    public function __construct($name, $sellIn, $quality)
    {
        $this->name = $name;
        $this->sellIn = $sellIn;
        $this->quality = $quality;
    }

    public function __toString()
    {
        return "{$this->name}, {$this->sellIn}, {$this->quality}";
    }

    public function basicProperties()
    {
        return [
            'name' => $this->name,
            'sellIn' => $this->sellIn,
            'quality' => $this->quality
        ];
    }

    public function updateMarketValue()
    {
        $this->decreaseSellIn();
        $this->updateQuality();
    }

    protected function decreaseSellIn()
    {
        $this->sellIn = $this->sellIn - static::SELL_IN_DECREASE_COEFFICIENT;
    }

    protected function updateQuality()
    {
        $this->decreaseQuality();

        // Once the sell by date has passed, quality degrades twice as fast
        if ($this->sellIn < 0) {
            $this->decreaseQuality();
        }
    }

    protected function increaseQuality()
    {
        if ($this->quality < self::MAX_QUALITY) {
            $this->quality = $this->quality + static::QUALITY_INCREASE_COEFFICIENT;
        }
    }

    protected function decreaseQuality()
    {
        if ($this->quality > self::MIN_QUALITY) {
            $this->quality = $this->quality - static::QUALITY_DECREASE_COEFFICIENT;
        }
    }
}
