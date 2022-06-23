<?php

namespace App;

class Item
{
    public string $name;
    public int $sellIn;
    public int $quality;

    public function __construct(string $name, int $quality, int $sellIn)
    {
        $this->name = $name;
        $this->quality = $quality;
        $this->sellIn = $sellIn;
    }

    public function __toString() : string
    {
        return "{$this->name}, {$this->sellIn}, {$this->quality}";
    }
}
