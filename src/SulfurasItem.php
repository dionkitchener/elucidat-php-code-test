<?php

namespace App;
use App\Item;

class SulfurasItem implements ItemInterface {

    public Item $item;
    const MAX_QUALITY = 80;

    function __construct(Item $item) {
        $this->item = $item;
    }

    function updateItem() :void {
        // Item does not currently change
    }

    function reduceSellIn() :void {
        // sell in does not reduce
    }

    function updateQuality() :void {
        // quality does not change
    }
}