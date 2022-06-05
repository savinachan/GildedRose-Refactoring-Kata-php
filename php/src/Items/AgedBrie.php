<?php

namespace GildedRose\Items; 

class AgedBrie extends DefaultItem {

    /**
     * Update quality value.
     * 
     * @return  void
     */
    public function updateQuality(): void
    {
        if (false === $this->checkQuality())
        {
            return;
        }

        $this->quality = $this->quality + 1;

        if (0 > $this->sell_in) {
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
