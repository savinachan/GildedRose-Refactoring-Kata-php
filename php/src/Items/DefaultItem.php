<?php

namespace GildedRose\Items; 

use GildedRose\Item;

class DefaultItem extends Item {

    /**
     * Decrease sell_in value
     * 
     * @return void
     */
    public function updateSellIn() {
        $this->sell_in = $this->sell_in - 1;
    }

    /**
     * Update quality value, by default it decrease the quality
     * 
     * @return  void
     */
    public function updateQuality() {
        if ($this->quality <= 0)
        {
            return;
        }
        if ($this->quality >= 50)
        {
            return;
        }

        $this->quality  --;

        if ($this->sell_in < 0) {
            $this->quality  --;
            return;
        }

    }

}
