<?php

namespace GildedRose\Items; 

class Sulfuras extends DefaultItem {

    /**
     * Decrease sell_in value
     * 
     * @return void
     */
    public function updateSellIn() {
        return;
    }

    /**
     * Update quality value, by default it decrease the quality
     * 
     * @return  void
     */
    public function updateQuality() {
        $this->quality = 80;
        return;
    }

}
