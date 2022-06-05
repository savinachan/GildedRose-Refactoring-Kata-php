<?php

namespace GildedRose\Items; 

use GildedRose\Item;

class DefaultItem extends Item {

    public const MAX_QUALITY = 50;
    public const MIN_QUALITY = 0;

    /**
     * Decrease sell_in value.
     * 
     * @return void
     */
    public function updateSellIn(): void
    {
        $this->sell_in = $this->sell_in - 1;
    }

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

        $this->quality = $this->quality - 1;

        if (0 > $this->sell_in) {
            $this->quality = $this->quality - 1;
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

        if (self::MAX_QUALITY <= $this->quality)
        {
            return false;
        }

        return true;
    }

    /**
     * Check max and min of quality value.
     * If exceeded, set the quality value to max/min.
     *
     * @return  void
     */
    public function checkOrSetQuality(): void
    {
        if (self::MIN_QUALITY > $this->quality)
        {
            $this->quality = self::MIN_QUALITY;
        }

        if (self::MAX_QUALITY < $this->quality)
        {
            $this->quality = self::MAX_QUALITY;
        }
    }
}
