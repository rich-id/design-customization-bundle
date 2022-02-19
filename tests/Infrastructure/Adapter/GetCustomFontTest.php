<?php

declare(strict_types=1);

namespace RichId\DesignCustomizationBundle\Tests\Infrastructure\Adapter;

use RichCongress\TestFramework\TestConfiguration\Annotation\TestConfig;
use RichCongress\TestSuite\TestCase\TestCase;
use RichId\DesignCustomizationBundle\Infrastructure\Adapter\GetCustomFont;

/**
 * @covers \RichId\DesignCustomizationBundle\Infrastructure\Adapter\GetCustomFont
 * @TestConfig("fixtures")
 */
final class GetCustomFontTest extends TestCase
{
    /** @var GetCustomFont */
    public $adapter;

    public function testGetCustomFontUrlForNotFound(): void
    {
        $customFontUrl = $this->adapter->getCustomFontUrlFor('my_slug');
        $this->assertNull($customFontUrl);
    }

    public function testGetCustomFontUrlFor(): void
    {
        $customFontUrl = $this->adapter->getCustomFontUrlFor('CustomFont');

        $this->assertSame('https://test.test', $customFontUrl);
    }

    public function testGetCustomFonts(): void
    {
        $customFonts = $this->adapter->getCustomFonts();

        $this->assertIsArray($customFonts);
        $this->assertCount(1, $customFonts);

        $this->assertArrayHasKey('CustomFont', $customFonts);
    }
}
