<?php

namespace GildedRose\Items; 

class AgedBrie extends DefaultItem {

    /**
     * Update quality value, by default it decrease the quality
     * 
     * @return  void
     */
    public function updateQuality() {
        if ($this->quality >= 50)
        {
            return;
        }

        $this->quality = $this->quality + 1;

        if ($this->sell_in < 0) {
            $this->quality = $this->quality + 1;
        }

    }

}
