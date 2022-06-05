<?php

namespace GildedRose\Items; 

class Sulfuras extends DefaultItem {

    public const QUALITY = 80;

    /**
     * Never update sell_in value.
     */
    public function updateSellIn(): void
    {
        return;
    }

    /**
     * Never update quality value, quality always set to 80.
     * 
     * @return  void
     */
    public function updateQuality(): void
    {
        $this->quality = self::QUALITY;
    }
}
