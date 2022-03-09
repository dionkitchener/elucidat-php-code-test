<?php

namespace App;

class ConjuredItem implements ItemInterface{

    public $item;

    const REDUCTION_RATE = 2;

    function __construct($item) {
        $this->item = $item;
    }

    public function updateItem() {
        $this->reduceSellIn();
        $this->updateQuality();
    }

    function reduceSellIn() {
        $this->item->sellIn = $this->item->sellIn - 1;
    }

    /**
     * function: updateQuality
     * 
     * Updates item quailty based on sell in days
     * quality reduces by 2 times the rate of a normal item
     */
    function updateQuality()
    {
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