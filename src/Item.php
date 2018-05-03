<?php

namespace GildedRose;

/**
 * All items have a SellIn value which denotes the number of days we have to sell the item;
 * all items have a Quality value which denotes how valuable the item is;
 * at the end of each day our system lowers both values for every item;
 * once the sell by date has passed, Quality degrades twice as fast
 * the quality of an item is never negative;
 * the Quality of an item is never more than 50.
 */
class Item
{
    const MIN_QUALITY = 0;
    const MAX_QUALITY = 50;

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

    public function updateQuality()
    {
        $this->decreaseQuality();

        if ($this->sellIn < 0) {
            $this->decreaseQuality();
        }
    }

    public function decreaseSellIn()
    {
        $this->sellIn = $this->sellIn - 1;
    }

    protected function increaseQuality()
    {
        if ($this->quality < self::MAX_QUALITY) {
            $this->quality = $this->quality + 1;
        }
    }

    protected function decreaseQuality()
    {
        if ($this->quality > self::MIN_QUALITY) {
            $this->quality = $this->quality - 1;
        }
    }
}
