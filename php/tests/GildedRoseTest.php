<?php

declare(strict_types=1);

namespace Tests;

use GildedRose\GildedRose;
use GildedRose\Items;
use PHPUnit\Framework\TestCase;

class GildedRoseTest extends TestCase
{
    public function testDefaultItem(): void
    {
        $item = [new Items\DefaultItem('default_item', 5, 6)];
        $GR = new GildedRose($item);
        $GR->updateQuality();
        $this->assertSame(4, $item[0]->sell_in);
        $this->assertSame(5, $item[0]->quality);
    }

    public function testDefaultItemSellInZero(): void
    {
        $item = [new Items\DefaultItem('default_item', 0, 6)];
        $GR = new GildedRose($item);
        $GR->updateQuality();
        $this->assertSame(-1, $item[0]->sell_in);
        $this->assertSame(4, $item[0]->quality);
    }

    public function testSulfuras(): void
    {
        $item = [new Items\Sulfuras('sulfuras_item', 5, 6)];
        $GR = new GildedRose($item);
        $GR->updateQuality();
        $this->assertSame(5, $item[0]->sell_in);
        $this->assertSame(80, $item[0]->quality);
    }

    public function testAgedBrie(): void
    {
        $item = [new Items\AgedBrie('aged_brie_item', 5, 6)];
        $GR = new GildedRose($item);
        $GR->updateQuality();
        $this->assertSame(4, $item[0]->sell_in);
        $this->assertSame(7, $item[0]->quality);
    }

    public function testBackStageSellInZero(): void
    {
        $item = [new Items\BackStage('back_stage_item', 1, 6)];
        $GR = new GildedRose($item);
        $GR->updateQuality();
        $this->assertSame(0, $item[0]->sell_in);
        $this->assertSame(0, $item[0]->quality);
    }

    public function testBackStageSellInLTTen(): void
    {
        $item = [new Items\BackStage('back_stage_item', 9, 6)];
        $GR = new GildedRose($item);
        $GR->updateQuality();
        $this->assertSame(8, $item[0]->sell_in);
        $this->assertSame(8, $item[0]->quality);
    }

    public function testBackStageSellInLTFive(): void
    {
        $item = [new Items\BackStage('back_stage_item', 3, 6)];
        $GR = new GildedRose($item);
        $GR->updateQuality();
        $this->assertSame(2, $item[0]->sell_in);
        $this->assertSame(9, $item[0]->quality);
    }

    public function testConjured(): void
    {
        $item = [new Items\Conjured('conjured_item', 5, 6)];
        $GR = new GildedRose($item);
        $GR->updateQuality();
        $this->assertSame(4, $item[0]->sell_in);
        $this->assertSame(4, $item[0]->quality);
    }

    /*/
    function testItems() {
        $items = array(
            new Item('+5 Dexterity Vest', 10, 20),
            new Item('Aged Brie', 2, 0),
            new Item('Elixir of the Mongoose', 5, 7),
            new Item('Sulfuras, Hand of Ragnaros', 0, 80),
            new Item('Sulfuras, Hand of Ragnaros', -1, 80),
            new Item('Backstage passes to a TAFKAL80ETC concert', 15, 20),
            new Item('Backstage passes to a TAFKAL80ETC concert', 10, 49),
            new Item('Backstage passes to a TAFKAL80ETC concert', 5, 49),
            // this conjured item does not work properly yet
            new Item('Conjured Mana Cake', 3, 6)
        );
        $days = 1;
        for($i=0; $i<$days; $i++) {
            $gildedRose = new GildedRose($items);
            $gildedRose->update_quality();
            foreach($gildedRose as $kItem => $item) {
                $this->assertEquals("fixme", $items[0]->name);
            }
        }
    }
    /**/

}
