<?php

namespace GildedRose\Items; 

class BackStage extends DefaultItem {

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

        if (0 === $this->sell_in) {
            $this->quality = 0;
            return;
        }

        if (5 >= $this->sell_in) {
            $this->quality = $this->quality + 3;
            return;
        }

        if (10 >= $this->sell_in) {
            $this->quality = $this->quality + 2;
            return;
        }

        $this->quality = $this->quality + 1;
    }

}
