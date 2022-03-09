<?php

namespace App;

class AgedItem implements ItemInterface {

    public $item;
    const MAX_QUALITY = 50;

    function __construct($item) {
        $this->item = $item;
    }

    function updateItem() {
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
     * quality increases by 1 a day and 2 after sell in
     */
    function updateQuality() {
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