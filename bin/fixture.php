<?php

require __DIR__ . '/../vendor/autoload.php';

use GildedRose\GildedRose;
use GildedRose\Item\Item;
use GildedRose\Item\BackstagePass;
use GildedRose\Item\AgedItem;
use GildedRose\Item\LegendaryItem;
use GildedRose\Item\ConjuredItem;
use GildedRose\Quality\Quality;

echo "OMGHAI!\n";

$items = array(
    new Item('+5 Dexterity Vest', 10, new Quality(20)),
    new AgedItem('Aged Brie', 2, new Quality(0)),
    new Item('Elixir of the Mongoose', 5, new Quality(7)),
    new LegendaryItem('Sulfuras, Hand of Ragnaros', 0, new Quality(80)),
    new LegendaryItem('Sulfuras, Hand of Ragnaros', -1, new Quality(80)),
    new BackstagePass('Backstage passes to a TAFKAL80ETC concert', 15, new Quality(20)),
    new BackstagePass('Backstage passes to a TAFKAL80ETC concert', 10, new Quality(49)),
    new BackstagePass('Backstage passes to a TAFKAL80ETC concert', 5, new Quality(49)),
    new ConjuredItem('Conjured Mana Cake', 5, new Quality(20))
);

$app = new GildedRose($items);

$days = 2;
if (count($argv) > 1) {
    $days = (int) $argv[1];
}

for ($i = 0; $i < $days; $i++) {
    echo("-------- day $i --------\n");
    echo("name, sellIn, quality\n");
    foreach ($items as $item) {
        echo $item . PHP_EOL;
    }
    echo PHP_EOL;
    $app->updateItemsMarketValue();
}
