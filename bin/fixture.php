<?php

require __DIR__ . '/../vendor/autoload.php';

use GildedRose\GildedRose;
use GildedRose\Item;
use GildedRose\BackstagePass;
use GildedRose\AgedItem;
use GildedRose\LegendaryItem;
use GildedRose\ConjuredItem;

echo "OMGHAI!\n";

$items = array(
    new Item('+5 Dexterity Vest', 10, 20),
    new AgedItem('Aged Brie', 2, 0),
    new Item('Elixir of the Mongoose', 5, 7),
    new LegendaryItem('Sulfuras, Hand of Ragnaros', 0, 80),
    new LegendaryItem('Sulfuras, Hand of Ragnaros', -1, 80),
    new BackstagePass('Backstage passes to a TAFKAL80ETC concert', 15, 20),
    new BackstagePass('Backstage passes to a TAFKAL80ETC concert', 10, 49),
    new BackstagePass('Backstage passes to a TAFKAL80ETC concert', 5, 49),
    new ConjuredItem('Conjured Mana Cake', 5, 20)
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
