<?php

namespace App;

class GildedRose
{
    private $items;

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

    public function reduceQuality($sellIn, $quality) {
        if($sellIn < 0) {
            $quality = $quality - 2;
        } else {
            $quality = $quality - 1;
        }

        if($quality < 0) {
            $quality = 0;
        }

        return $quality;
    }

    public function increaseQuality($sellIn, $quality) {
        if($sellIn < 0) {
            $quality = $quality + 2;
        } else {
            $quality = $quality + 1;
        }

        if($quality > 50) {
            $quality = 50;
        }

        return $quality;
    }

    public function reduceConjuredQuality($sellIn, $quality) {
        if($sellIn < 0) {
            $quality = $quality - 4;
        } else {
            $quality = $quality - 2;
        }

        if($quality < 0) {
            $quality = 0;
        }

        return $quality;
    }

    public function reduceSellIn($sellIn) {
        return $sellIn = $sellIn - 1;
    }

    public function getBackStageQuaility($sellIn, $quality) {
        if($sellIn >= 10) {
            $quality = $quality + 1;
        }

        if($sellIn < 10 && $sellIn > 5) {
            $quality = $quality + 2;
        }

        if($sellIn <= 5) {
            $quality = $quality + 3;
        }

        if($quality > 50) {
            $quality = 50;
        }

        if($sellIn < 0) {
            $quality = 0;
        }

        return $quality;
    }
    

    public function nextDay() {
        foreach ($this->items as $item) {

            switch($item->name) {
                case 'normal' :
                    $item->sellIn = $this->reduceSellIn($item->sellIn);
                    $item->quality = $this->reduceQuality($item->sellIn, $item->quality);
                    break;
                case 'Aged Brie' :
                    $item->sellIn = $this->reduceSellIn($item->sellIn);
                    $item->quality = $this->increaseQuality($item->sellIn, $item->quality);
                    break;
                case 'Sulfuras, Hand of Ragnaros' :
                    break;
                case 'Backstage passes to a TAFKAL80ETC concert' :
                    $item->sellIn = $this->reduceSellIn($item->sellIn);
                    $item->quality = $this->getBackStageQuaility($item->sellIn, $item->quality);
                    break;
                case 'Conjured Mana Cake' :
                    $item->sellIn = $this->reduceSellIn($item->sellIn);
                    $item->quality = $this->reduceConjuredQuality($item->sellIn, $item->quality);
                    break;
            }
        }
    }
}
