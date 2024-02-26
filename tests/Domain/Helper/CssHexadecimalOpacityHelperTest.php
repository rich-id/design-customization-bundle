<?php

declare(strict_types=1);

namespace RichId\DesignCustomizationBundle\Tests\Domain\Helper;

use RichCongress\TestSuite\TestCase\TestCase;
use RichId\DesignCustomizationBundle\Domain\Helper\CssHexadecimalOpacityHelper;

/** @covers \RichId\DesignCustomizationBundle\Domain\Helper\CssHexadecimalOpacityHelper */
final class CssHexadecimalOpacityHelperTest extends TestCase
{
    public function testHelper(): void
    {
        $this->assertSame('FF', CssHexadecimalOpacityHelper::getSuffixFor(100));
        $this->assertSame('FC', CssHexadecimalOpacityHelper::getSuffixFor(99));
        $this->assertSame('FA', CssHexadecimalOpacityHelper::getSuffixFor(98));
        $this->assertSame('F7', CssHexadecimalOpacityHelper::getSuffixFor(97));
        $this->assertSame('F5', CssHexadecimalOpacityHelper::getSuffixFor(96));
        $this->assertSame('F2', CssHexadecimalOpacityHelper::getSuffixFor(95));
        $this->assertSame('F0', CssHexadecimalOpacityHelper::getSuffixFor(94));
        $this->assertSame('ED', CssHexadecimalOpacityHelper::getSuffixFor(93));
        $this->assertSame('EB', CssHexadecimalOpacityHelper::getSuffixFor(92));
        $this->assertSame('E8', CssHexadecimalOpacityHelper::getSuffixFor(91));
        $this->assertSame('E6', CssHexadecimalOpacityHelper::getSuffixFor(90));
        $this->assertSame('E3', CssHexadecimalOpacityHelper::getSuffixFor(89));
        $this->assertSame('E0', CssHexadecimalOpacityHelper::getSuffixFor(88));
        $this->assertSame('DE', CssHexadecimalOpacityHelper::getSuffixFor(87));
        $this->assertSame('DB', CssHexadecimalOpacityHelper::getSuffixFor(86));
        $this->assertSame('D9', CssHexadecimalOpacityHelper::getSuffixFor(85));
        $this->assertSame('D6', CssHexadecimalOpacityHelper::getSuffixFor(84));
        $this->assertSame('D4', CssHexadecimalOpacityHelper::getSuffixFor(83));
        $this->assertSame('D1', CssHexadecimalOpacityHelper::getSuffixFor(82));
        $this->assertSame('CF', CssHexadecimalOpacityHelper::getSuffixFor(81));
        $this->assertSame('CC', CssHexadecimalOpacityHelper::getSuffixFor(80));
        $this->assertSame('C9', CssHexadecimalOpacityHelper::getSuffixFor(79));
        $this->assertSame('C7', CssHexadecimalOpacityHelper::getSuffixFor(78));
        $this->assertSame('C4', CssHexadecimalOpacityHelper::getSuffixFor(77));
        $this->assertSame('C2', CssHexadecimalOpacityHelper::getSuffixFor(76));
        $this->assertSame('BF', CssHexadecimalOpacityHelper::getSuffixFor(75));
        $this->assertSame('BD', CssHexadecimalOpacityHelper::getSuffixFor(74));
        $this->assertSame('BA', CssHexadecimalOpacityHelper::getSuffixFor(73));
        $this->assertSame('B8', CssHexadecimalOpacityHelper::getSuffixFor(72));
        $this->assertSame('B5', CssHexadecimalOpacityHelper::getSuffixFor(71));
        $this->assertSame('B3', CssHexadecimalOpacityHelper::getSuffixFor(70));
        $this->assertSame('B0', CssHexadecimalOpacityHelper::getSuffixFor(69));
        $this->assertSame('AD', CssHexadecimalOpacityHelper::getSuffixFor(68));
        $this->assertSame('AB', CssHexadecimalOpacityHelper::getSuffixFor(67));
        $this->assertSame('A8', CssHexadecimalOpacityHelper::getSuffixFor(66));
        $this->assertSame('A6', CssHexadecimalOpacityHelper::getSuffixFor(65));
        $this->assertSame('A3', CssHexadecimalOpacityHelper::getSuffixFor(64));
        $this->assertSame('A1', CssHexadecimalOpacityHelper::getSuffixFor(63));
        $this->assertSame('9E', CssHexadecimalOpacityHelper::getSuffixFor(62));
        $this->assertSame('9C', CssHexadecimalOpacityHelper::getSuffixFor(61));
        $this->assertSame('99', CssHexadecimalOpacityHelper::getSuffixFor(60));
        $this->assertSame('96', CssHexadecimalOpacityHelper::getSuffixFor(59));
        $this->assertSame('94', CssHexadecimalOpacityHelper::getSuffixFor(58));
        $this->assertSame('91', CssHexadecimalOpacityHelper::getSuffixFor(57));
        $this->assertSame('8F', CssHexadecimalOpacityHelper::getSuffixFor(56));
        $this->assertSame('8C', CssHexadecimalOpacityHelper::getSuffixFor(55));
        $this->assertSame('8A', CssHexadecimalOpacityHelper::getSuffixFor(54));
        $this->assertSame('87', CssHexadecimalOpacityHelper::getSuffixFor(53));
        $this->assertSame('85', CssHexadecimalOpacityHelper::getSuffixFor(52));
        $this->assertSame('82', CssHexadecimalOpacityHelper::getSuffixFor(51));
        $this->assertSame('80', CssHexadecimalOpacityHelper::getSuffixFor(50));
        $this->assertSame('7D', CssHexadecimalOpacityHelper::getSuffixFor(49));
        $this->assertSame('7A', CssHexadecimalOpacityHelper::getSuffixFor(48));
        $this->assertSame('78', CssHexadecimalOpacityHelper::getSuffixFor(47));
        $this->assertSame('75', CssHexadecimalOpacityHelper::getSuffixFor(46));
        $this->assertSame('73', CssHexadecimalOpacityHelper::getSuffixFor(45));
        $this->assertSame('70', CssHexadecimalOpacityHelper::getSuffixFor(44));
        $this->assertSame('6E', CssHexadecimalOpacityHelper::getSuffixFor(43));
        $this->assertSame('6B', CssHexadecimalOpacityHelper::getSuffixFor(42));
        $this->assertSame('69', CssHexadecimalOpacityHelper::getSuffixFor(41));
        $this->assertSame('66', CssHexadecimalOpacityHelper::getSuffixFor(40));
        $this->assertSame('63', CssHexadecimalOpacityHelper::getSuffixFor(39));
        $this->assertSame('61', CssHexadecimalOpacityHelper::getSuffixFor(38));
        $this->assertSame('5E', CssHexadecimalOpacityHelper::getSuffixFor(37));
        $this->assertSame('5C', CssHexadecimalOpacityHelper::getSuffixFor(36));
        $this->assertSame('59', CssHexadecimalOpacityHelper::getSuffixFor(35));
        $this->assertSame('57', CssHexadecimalOpacityHelper::getSuffixFor(34));
        $this->assertSame('54', CssHexadecimalOpacityHelper::getSuffixFor(33));
        $this->assertSame('52', CssHexadecimalOpacityHelper::getSuffixFor(32));
        $this->assertSame('4F', CssHexadecimalOpacityHelper::getSuffixFor(31));
        $this->assertSame('4D', CssHexadecimalOpacityHelper::getSuffixFor(30));
        $this->assertSame('4A', CssHexadecimalOpacityHelper::getSuffixFor(29));
        $this->assertSame('47', CssHexadecimalOpacityHelper::getSuffixFor(28));
        $this->assertSame('45', CssHexadecimalOpacityHelper::getSuffixFor(27));
        $this->assertSame('42', CssHexadecimalOpacityHelper::getSuffixFor(26));
        $this->assertSame('40', CssHexadecimalOpacityHelper::getSuffixFor(25));
        $this->assertSame('3D', CssHexadecimalOpacityHelper::getSuffixFor(24));
        $this->assertSame('3B', CssHexadecimalOpacityHelper::getSuffixFor(23));
        $this->assertSame('38', CssHexadecimalOpacityHelper::getSuffixFor(22));
        $this->assertSame('36', CssHexadecimalOpacityHelper::getSuffixFor(21));
        $this->assertSame('33', CssHexadecimalOpacityHelper::getSuffixFor(20));
        $this->assertSame('30', CssHexadecimalOpacityHelper::getSuffixFor(19));
        $this->assertSame('2E', CssHexadecimalOpacityHelper::getSuffixFor(18));
        $this->assertSame('2B', CssHexadecimalOpacityHelper::getSuffixFor(17));
        $this->assertSame('29', CssHexadecimalOpacityHelper::getSuffixFor(16));
        $this->assertSame('26', CssHexadecimalOpacityHelper::getSuffixFor(15));
        $this->assertSame('24', CssHexadecimalOpacityHelper::getSuffixFor(14));
        $this->assertSame('21', CssHexadecimalOpacityHelper::getSuffixFor(13));
        $this->assertSame('1F', CssHexadecimalOpacityHelper::getSuffixFor(12));
        $this->assertSame('1C', CssHexadecimalOpacityHelper::getSuffixFor(11));
        $this->assertSame('1A', CssHexadecimalOpacityHelper::getSuffixFor(10));
        $this->assertSame('17', CssHexadecimalOpacityHelper::getSuffixFor(9));
        $this->assertSame('14', CssHexadecimalOpacityHelper::getSuffixFor(8));
        $this->assertSame('12', CssHexadecimalOpacityHelper::getSuffixFor(7));
        $this->assertSame('0F', CssHexadecimalOpacityHelper::getSuffixFor(6));
        $this->assertSame('0D', CssHexadecimalOpacityHelper::getSuffixFor(5));
        $this->assertSame('0A', CssHexadecimalOpacityHelper::getSuffixFor(4));
        $this->assertSame('08', CssHexadecimalOpacityHelper::getSuffixFor(3));
        $this->assertSame('05', CssHexadecimalOpacityHelper::getSuffixFor(2));
        $this->assertSame('03', CssHexadecimalOpacityHelper::getSuffixFor(1));
        $this->assertSame('00', CssHexadecimalOpacityHelper::getSuffixFor(0));
    }

    public function testHelperOpacityLessThan0(): void
    {
        $this->expectException(\InvalidArgumentException::class);
        $this->expectExceptionMessage('Opacity must between 0 and 100.');

        CssHexadecimalOpacityHelper::getSuffixFor(-1);
    }

    public function testHelperOpacityMoreThan100(): void
    {
        $this->expectException(\InvalidArgumentException::class);
        $this->expectExceptionMessage('Opacity must between 0 and 100.');

        CssHexadecimalOpacityHelper::getSuffixFor(101);
    }
}
