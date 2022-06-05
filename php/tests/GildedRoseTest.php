<?php

declare(strict_types=1);

namespace Tests;

use GildedRose\GildedRose;
use GildedRose\Item;
use PHPUnit\Framework\TestCase;

class GildedRoseTest extends TestCase
{
    public function testDefaultItem(): void
    {
        $item = [new Item('default_item', 5, 6)];
        $GR = new GildedRose($item);
        $GR->updateQuality();
        $this->assertSame(4, $item[0]->sell_in);
        $this->assertSame(5, $item[0]->quality);
    }

    public function testDefaultItemPassSellIn(): void
    {
        $item = [new Item('default_item', 0, 6)];
        $GR = new GildedRose($item);
        $GR->updateQuality();
        $this->assertSame(-1, $item[0]->sell_in);
        $this->assertSame(4, $item[0]->quality);
    }

    public function testSulfurasFixedShellInAndQuality(): void
    {
        $item = [new Item('Sulfuras, Hand of Ragnaros', 5, 6)];
        $GR = new GildedRose($item);
        $GR->updateQuality();
        $this->assertSame(5, $item[0]->sell_in);
        $this->assertSame(80, $item[0]->quality);
    }

    public function testAgedBrie(): void
    {
        $item = [new Item('Aged Brie', 5, 6)];
        $GR = new GildedRose($item);
        $GR->updateQuality();
        $this->assertSame(4, $item[0]->sell_in);
        $this->assertSame(7, $item[0]->quality);
    }

    public function testAgedBriePassShellIn(): void
    {
        $item = [new Item('Aged Brie', 0, 6)];
        $GR = new GildedRose($item);
        $GR->updateQuality();
        $this->assertSame(-1, $item[0]->sell_in);
        $this->assertSame(8, $item[0]->quality);
    }

    public function testBackStage(): void
    {
        $item = [new Item('Backstage passes to a TAFKAL80ETC concert', 11, 6)];
        $GR = new GildedRose($item);
        $GR->updateQuality();
        $this->assertSame(10, $item[0]->sell_in);
        $this->assertSame(7, $item[0]->quality);
    }

    public function testBackStageSellInLTTen(): void
    {
        $item = [new Item('Backstage passes to a TAFKAL80ETC concert', 9, 6)];
        $GR = new GildedRose($item);
        $GR->updateQuality();
        $this->assertSame(8, $item[0]->sell_in);
        $this->assertSame(8, $item[0]->quality);
    }

    public function testBackStageSellInLTFive(): void
    {
        $item = [new Item('Backstage passes to a TAFKAL80ETC concert', 3, 6)];
        $GR = new GildedRose($item);
        $GR->updateQuality();
        $this->assertSame(2, $item[0]->sell_in);
        $this->assertSame(9, $item[0]->quality);
    }

    public function testBackStagePassSellIn(): void
    {
        $item = [new Item('Backstage passes to a TAFKAL80ETC concert', 0, 6)];
        $GR = new GildedRose($item);
        $GR->updateQuality();
        $this->assertSame(-1, $item[0]->sell_in);
        $this->assertSame(0, $item[0]->quality);
    }

    public function testConjured(): void
    {
        $item = [new Item('Conjured Mana Cake', 5, 6)];
        $GR = new GildedRose($item);
        $GR->updateQuality();
        $this->assertSame(4, $item[0]->sell_in);
        $this->assertSame(4, $item[0]->quality);
    }

    public function testConjuredPassShellIn(): void
    {
        $item = [new Item('Conjured Mana Cake', 0, 6)];
        $GR = new GildedRose($item);
        $GR->updateQuality();
        $this->assertSame(-1, $item[0]->sell_in);
        $this->assertSame(2, $item[0]->quality);
    }
}
