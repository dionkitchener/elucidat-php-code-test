<?php

namespace App;
use App\Item;

class BackstagePassItem implements ItemInterface {

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
     * quality increases by 1 a day, 2 within 10 days, 
     * and 3 within 5 days of sellin
     * when sell in is passed the item quality is 0 
     */
    function updateQuality() :void {

        if($this->item->sellIn >= 10) {
            $this->item->quality = $this->item->quality + 1;
        }

        if($this->item->sellIn < 10 && $this->item->sellIn > 5) {
            $this->item->quality = $this->item->quality + 2;
        }

        if($this->item->sellIn <= 5) {
            $this->item->quality = $this->item->quality + 3;
        }

        if($this->item->quality > self::MAX_QUALITY) {
            $this->item->quality = self::MAX_QUALITY;
        }

        if($this->item->sellIn < 0) {
            $this->item->quality = 0;
        }

    }
}