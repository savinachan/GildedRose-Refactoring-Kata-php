<?php

namespace GildedRose\Items; 

class Conjured extends DefaultItem {

    /**
     * Update quality value, by default it decrease the quality
     * 
     * @return  void
     */
    public function updateQuality() {
        if (0 >= $this->quality)
        {
            return;
        }

        if (50 <= $this->quality)
        {
            return;
        }

        if ($this->sell_in >= 0) {
            $this->quality = $this->quality - 2;
            return;
        }

        $this->quality = $this->quality - 2;
    }

}
