<?php

namespace GildedRose\Items; 

class Conjured extends DefaultItem {

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

        $this->quality = $this->quality - 2;

        if ($this->sell_in < 0) {
            $this->quality = $this->quality - 2;
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
        if (self::MIN_QUALITY >= $this->quality)
        {
            return false;
        }
        return true;
    }
}
