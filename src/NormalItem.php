<?php

namespace App;
use App\Item;

class NormalItem implements ItemInterface{

    public Item $item;
    const REDUCTION_RATE = 1;

    function __construct(Item $item) {
        $this->item = $item;
    }

    public function updateItem() :void {
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
     * quality reduces by 1 a day and 2 a day after sell in
     */
    function updateQuality() :void {
        if($this->item->sellIn < 0) {
            $this->item->quality = $this->item->quality - (2 * self::REDUCTION_RATE);
        } else {
            $this->item->quality = $this->item->quality - (1 * self::REDUCTION_RATE);
        }

        if($this->item->quality < 0) {
            $this->item->quality = 0;
        }
    }
}