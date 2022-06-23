<?php

namespace App;
use App\Item;

class GildedRose
{
    private mixed $items;

    /**
     * @param array<int, Item> $items
     */
    public function __construct(array $items) {
        $this->items = $items;
    }

    public function getItem(int $which = null) : Item {
        return ($which === null
            ? $this->items
            : $this->items[$which]
        );
    }

    /**
     * function: nextDay
     * 
     * Selects the type of item before updating
     */
    public function nextDay() :void {
        foreach ($this->items as $item) {
            switch($item->name) {
                case 'normal' :
                    $item = new NormalItem($item);
                    break;
                case 'Aged Brie' :
                    $item = new AgedItem($item);
                    break;
                case 'Sulfuras, Hand of Ragnaros' :
                    $item = new  SulfurasItem($item);
                    break;
                case 'Backstage passes to a TAFKAL80ETC concert' :
                    $item = new BackstagePassItem($item);
                    break;
                case 'Conjured Mana Cake' :
                    $item = new ConjuredItem($item);
                    break;
            }
            $item->updateItem();
        }
    }
}
