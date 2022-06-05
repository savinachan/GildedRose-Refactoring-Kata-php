# GildedRose-Refactoring-Kata-php

## Refactor
- Create class `DefaultItem`, which extends class `item`. Create class for each known items, which extend class `DefaultItem`.
    - Known items : `AgedBrie`, `BackStage`, `Sulfuras` and `Conjured`.
    - Each created item has it own function `updateQuality` and function `updateShellIn`, depends on its own spec.

- Refactor `the constructor` of `GildedRose`.
    - Change the items to the corresponding known items or default item.

- Refactor function `updateQuality` of `GildedRose`.
    - Function `updateShellIn` and function `updateQuality` of each item will be called.
    - Each item has its own function `updateShellIn` and function `updateQuality`.

## Test case
- Add test case in Gilded Rose for each known items and default item.
  - case `Normal` : sell_in and quality are in range.
  - case `PassShellIn` : when the sell_in is -1.
  - some Edge cases.

## ApprovalTest
- Update `ApprovalTest.testTestFixture.approved.txt`.

## References
- [題目](https://cobalt-seeker-7d5.notion.site/Refactoring-Gilded-Rose-266137ea787548878fb6b7d3c247d908)
- [出處](https://github.com/emilybache/GildedRose-Refactoring-Kata)