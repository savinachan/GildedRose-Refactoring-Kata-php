<?php

namespace GildedRose\Items; 

class BackStage extends DefaultItem {

    /**
     * Update quality value.
     * 
     * @return  void
     */
    public function updateQuality(): void
    {
        if (0 > $this->sell_in) {
            $this->quality = 0;
            return;
        }

        if (false === $this->checkQuality())
        {
            return;
        }

        if (5 > $this->sell_in) {
            $this->quality = $this->quality + 3;
        } else if (10 > $this->sell_in) {
            $this->quality = $this->quality + 2;
        } else {
            $this->quality = $this->quality + 1;
        }

        $this->checkOrSetQuality();
    }

    /**
     * Check max and min of quality value.
     *
     * @return  bool
     */
    public function checkQuality(): bool
    {
        if (self::MAX_QUALITY <= $this->quality)
        {
            return false;
        }
        return true;
    }
}
