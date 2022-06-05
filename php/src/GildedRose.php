<?php

declare(strict_types=1);

namespace GildedRose;

use GildedRose\Items\DefaultItem;

final class GildedRose
{
    public const TYPE_BACKSTAGE = 'Backstage passes to a TAFKAL80ETC concert';
    public const TYPE_AGED_BRIE = 'Aged Brie';
    public const TYPE_CONJURED  = 'Conjured Mana Cake';
    public const TYPE_SULFURAS  = 'Sulfuras, Hand of Ragnaros';

    /**
     * @var DefaultItem[]
     */
    private $items;

    public function __construct(array &$items)
    {
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

    public function updateQuality(): void
    {
        foreach ($this->items as $item) {
            $item->updateSellIn();
            $item->updateQuality();
        }
    }
}
