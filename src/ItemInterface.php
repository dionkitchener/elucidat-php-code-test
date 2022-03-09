<?php

namespace App;

/**
 * interface: ItemInterface
 * 
 * Defines the methods needed for all item types
 */
interface ItemInterface {
    public function updateItem();
    public function reduceSellIn();
    public function updateQuality();
}