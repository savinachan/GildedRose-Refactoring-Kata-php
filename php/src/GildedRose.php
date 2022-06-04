<?php

declare(strict_types=1);

namespace GildedRose;

final class GildedRose
{

    const TYPE_BACKSTAGE = 'Backstage passes to a TAFKAL80ETC concert';
    const TYPE_AGED_BRIE = 'Aged Brie';
    const TYPE_CONJURED  = 'Conjured Mana Cake';
    const TYPE_SULFURAS  = 'Sulfuras, Hand of Ragnaros';

    /**
     * @var Item[]
     */
    private $items;

    public function __construct(array &$items)
    {
        //$this->initItems($items);
        $this->items = &$items;

        foreach ($this->items as $key => $item)
        {
            switch($item->name)
            {
                case self::TYPE_BACKSTAGE:
                    $this->items[$key] = new Items\BackStage($item->name, $item->sell_in, $item->quality);
                    break;
                case self::TYPE_AGED_BRIE:
                    $this->items[$key] = new Items\AgedBrie($item->name, $item->sell_in, $item->quality);
                    break;
                case self::TYPE_SULFURAS:
                    $this->items[$key] = new Items\Sulfuras($item->name, $item->sell_in, $item->quality);
                    break;
                case self::TYPE_CONJURED:
                    $this->items[$key] = new Items\Conjured($item->name, $item->sell_in, $item->quality);
                    break;
                default:
                    $this->items[$key] = new Items\DefaultItem($item->name, $item->sell_in, $item->quality);
                    break;
            }            
        }
    }

    private function initItems(array $inputItems)
    {
    }

    public function updateQuality(): void
    {
        foreach ($this->items as $item) {

            $item->updateSellIn();
            $item->updateQuality();
/*
            if ($item->name != 'Aged Brie' and $item->name != 'Backstage passes to a TAFKAL80ETC concert') {
                if ($item->quality > 0) {
                    if ($item->name != 'Sulfuras, Hand of Ragnaros') {
                        $item->quality = $item->quality - 1;
                    }
                }
            } else {
                if ($item->quality < 50) {
                    $item->quality = $item->quality + 1;
                    if ($item->name == 'Backstage passes to a TAFKAL80ETC concert') {
                        if ($item->sell_in < 11) {
                            if ($item->quality < 50) {
                                $item->quality = $item->quality + 1;
                            }
                        }
                        if ($item->sell_in < 6) {
                            if ($item->quality < 50) {
                                $item->quality = $item->quality + 1;
                            }
                        }
                    }
                }
            }

            if ($item->name != 'Sulfuras, Hand of Ragnaros') {
                $item->sell_in = $item->sell_in - 1;
            }

            if ($item->sell_in < 0) {
                if ($item->name != 'Aged Brie') {
                    if ($item->name != 'Backstage passes to a TAFKAL80ETC concert') {
                        if ($item->quality > 0) {
                            if ($item->name != 'Sulfuras, Hand of Ragnaros') {
                                $item->quality = $item->quality - 1;
                            }
                        }
                    } else {
                        $item->quality = $item->quality - $item->quality;
                    }
                } else {
                    if ($item->quality < 50) {
                        $item->quality = $item->quality + 1;
                    }
                }
            }
*/

        }
    }
}
