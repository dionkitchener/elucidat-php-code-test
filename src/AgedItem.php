<?php

namespace App;
use App\Item;

class AgedItem implements ItemInterface {

    public Item $item;
    const MAX_QUALITY = 50;

    function __construct(Item $item) {
        $this->item = $item;
    }

    function updateItem() :void {
        $this->reduceSellIn();
        $this->updateQuality();
    }

    function reduceSellIn() :void {
        $this->item->sellIn = $this->item->sellIn - 1;
    }

    /**
     * function: updateQuality
     * 
     * Updates item quailty based on sell in days
     * quality increases by 1 a day and 2 after sell in
     */
    function updateQuality() :void {
        if($this->item->sellIn < 0) {
            $this->item->quality = $this->item->quality + 2;
        } else {
            $this->item->quality = $this->item->quality + 1;
        }

        if($this->item->quality > self::MAX_QUALITY) {
            $this->item->quality = self::MAX_QUALITY;
        }
    }
}