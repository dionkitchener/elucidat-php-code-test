<?php

namespace App;

class GildedRose
{
    private $items;
    const MAX_QUALITY = 50;

    public function __construct(array $items)
    {
        $this->items = $items;
    }

    public function getItem($which = null)
    {
        return ($which === null
            ? $this->items
            : $this->items[$which]
        );
    }

    /**
     * function: reduceQuality
     * 
     * $sellIn - number of days to sell the item
     * $quality - the value of the item
     * $rate - the rate of quality reduction
     */
    public function reduceQuality($sellIn, $quality, $rate) {
        if($sellIn < 0) {
            $quality = $quality - (2 * $rate);
        } else {
            $quality = $quality - (1 * $rate);
        }

        if($quality < 0) {
            $quality = 0;
        }

        return $quality;
    }

    /**
     * function: increaseQuality
     * 
     * $sellIn - number of days to sell the item
     * $quality - the value of the item
     */
    public function increaseQuality($sellIn, $quality) {
        if($sellIn < 0) {
            $quality = $quality + 2;
        } else {
            $quality = $quality + 1;
        }

        if($quality > self::MAX_QUALITY) {
            $quality = self::MAX_QUALITY;
        }

        return $quality;
    }

    /**
     * function: reduceSellIn
     * 
     *  $sellIn - number of days to sell the item
     */
    public function reduceSellIn($sellIn) {
        return $sellIn = $sellIn - 1;
    }

    /**
     * function: increaseQuality
     * 
     * $sellIn - number of days to sell the item
     * $quality - the value of the item
     */
    public function getBackStageQuality($sellIn, $quality) {
        if($sellIn >= 10) {
            $quality = $quality + 1;
        }

        if($sellIn < 10 && $sellIn > 5) {
            $quality = $quality + 2;
        }

        if($sellIn <= 5) {
            $quality = $quality + 3;
        }

        if($quality > self::MAX_QUALITY) {
            $quality = self::MAX_QUALITY;
        }

        if($sellIn < 0) {
            $quality = 0;
        }

        return $quality;
    }

    /**
     * function: nextDay
     */
    public function nextDay() {
        foreach ($this->items as $item) {
            switch($item->name) {
                case 'normal' :
                    $item->sellIn = $this->reduceSellIn($item->sellIn);
                    $item->quality = $this->reduceQuality($item->sellIn, $item->quality, 1);
                    break;
                case 'Aged Brie' :
                    $item->sellIn = $this->reduceSellIn($item->sellIn);
                    $item->quality = $this->increaseQuality($item->sellIn, $item->quality);
                    break;
                case 'Sulfuras, Hand of Ragnaros' :
                    break;
                case 'Backstage passes to a TAFKAL80ETC concert' :
                    $item->sellIn = $this->reduceSellIn($item->sellIn);
                    $item->quality = $this->getBackStageQuality($item->sellIn, $item->quality);
                    break;
                case 'Conjured Mana Cake' :
                    $item->sellIn = $this->reduceSellIn($item->sellIn);
                    $item->quality = $this->reduceQuality($item->sellIn, $item->quality, 2);
                    break;
            }
        }
    }
}
