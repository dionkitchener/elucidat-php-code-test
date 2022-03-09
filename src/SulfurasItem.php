<?php

namespace App;

class SulfurasItem implements ItemInterface {

    public $item;
    const MAX_QUALITY = 80;

    function __construct($item) {
        $this->item = $item;
    }

    function updateItem() {
        // Item does not currently change
    }

    function reduceSellIn() {
        // sell in does not reduce
    }

    function updateQuality() {
        // quality does not change
    }
}