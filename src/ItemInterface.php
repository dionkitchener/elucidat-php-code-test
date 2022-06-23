<?php

namespace App;

/**
 * interface: ItemInterface
 * 
 * Defines the methods needed for all item types
 */
interface ItemInterface {
    public function updateItem() :void;
    public function reduceSellIn() :void;
    public function updateQuality() :void;
}