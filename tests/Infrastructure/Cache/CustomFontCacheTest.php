<?php

declare(strict_types=1);

namespace RichId\DesignCustomizationBundle\Tests\Infrastructure\Cache;

use RichCongress\TestFramework\TestConfiguration\Annotation\TestConfig;
use RichCongress\TestSuite\TestCase\TestCase;
use RichId\DesignCustomizationBundle\Infrastructure\Cache\CustomFontCache;
use Symfony\Component\Cache\Adapter\ArrayAdapter;
use Symfony\Contracts\Cache\CacheInterface;

/**
 * @covers \RichId\DesignCustomizationBundle\Infrastructure\Cache\CustomFontCache
 * @TestConfig("fixtures")
 */
final class CustomFontCacheTest extends TestCase
{
    /** @var CustomFontCache */
    public $customFontCache;

    /** @var CacheInterface */
    public $cache;

    public function testGetCustomFonts(): void
    {
        /** @var ArrayAdapter $cache */
        $cache = $this->cache;

        $this->assertEmpty($cache->getValues());

        $customFonts = $this->customFontCache->getCustomFonts();

        $this->assertIsArray($customFonts);
        $this->assertCount(1, $customFonts);

        $this->assertArrayHasKey('CustomFont', $customFonts);

        $this->assertArrayHasKey('custom-fonts', $cache->getValues());
    }

    public function testGetCustomFontsNotFound(): void
    {
        /** @var ArrayAdapter $cache */
        $cache = $this->cache;

        $this->assertEmpty($cache->getValues());

        $customFontUrl = $this->customFontCache->getCustomFontUrlFor('OtherCustomFont');

        $this->assertNull($customFontUrl);
    }

    public function testGetCustomFontUrlFor(): void
    {
        /** @var ArrayAdapter $cache */
        $cache = $this->cache;

        $this->assertEmpty($cache->getValues());

        $customFontUrl = $this->customFontCache->getCustomFontUrlFor('CustomFont');

        $this->assertSame('https://test.test', $customFontUrl);
    }

    public function testClearCache(): void
    {
        /** @var ArrayAdapter $cache */
        $cache = $this->cache;

        $this->customFontCache->getCustomFonts();
        $this->assertArrayHasKey('custom-fonts', $cache->getValues());

        $this->customFontCache->clearCache();
        $this->assertEmpty($cache->getValues());
    }
}
