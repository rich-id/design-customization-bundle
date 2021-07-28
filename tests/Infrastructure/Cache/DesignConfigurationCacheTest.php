<?php

declare(strict_types=1);

namespace RichId\DesignCustomizationBundle\Tests\Infrastructure\Cache;

use RichCongress\TestFramework\TestConfiguration\Annotation\TestConfig;
use RichCongress\TestSuite\TestCase\TestCase;
use RichId\DesignCustomizationBundle\Domain\Entity\DesignConfiguration;
use RichId\DesignCustomizationBundle\Infrastructure\Cache\DesignConfigurationCache;
use Symfony\Component\Cache\Adapter\ArrayAdapter;
use Symfony\Contracts\Cache\CacheInterface;

/**
 * @covers \RichId\DesignCustomizationBundle\Infrastructure\Cache\DesignConfigurationCache
 * @TestConfig("fixtures")
 */
final class DesignConfigurationCacheTest extends TestCase
{
    /** @var DesignConfigurationCache */
    public $designConfigurationCache;

    /** @var CacheInterface */
    public $cache;

    public function testGetDesignConfigurations(): void
    {
        /** @var ArrayAdapter $cache */
        $cache = $this->cache;

        $this->assertEmpty($cache->getValues());

        $configurations = $this->designConfigurationCache->getDesignConfigurations();

        $this->assertIsArray($configurations);
        $this->assertCount(5, $configurations);

        $this->assertArrayHasKey('color-primary', $configurations);
        $this->assertArrayHasKey('color-secondary', $configurations);
        $this->assertArrayHasKey('font-primary', $configurations);
        $this->assertArrayHasKey('radius-items', $configurations);
        $this->assertArrayHasKey('logo', $configurations);

        $this->assertArrayHasKey('design-configurations', $cache->getValues());
    }

    public function testGetDesignConfigurationNotFound(): void
    {
        /** @var ArrayAdapter $cache */
        $cache = $this->cache;

        $this->assertEmpty($cache->getValues());

        $configuration = $this->designConfigurationCache->getDesignConfiguration('my_slug');

        $this->assertNull($configuration);
    }

    public function testGetDesignConfiguration(): void
    {
        /** @var ArrayAdapter $cache */
        $cache = $this->cache;

        $this->assertEmpty($cache->getValues());

        $configuration = $this->designConfigurationCache->getDesignConfiguration('color-primary');

        $this->assertInstanceOf(DesignConfiguration::class, $configuration);

        $slug = $configuration !== null ? $configuration->getSlug() : '';
        $this->assertSame('color-primary', $slug);
        $this->assertArrayHasKey('design-configurations', $cache->getValues());
    }

    public function testClearCache(): void
    {
        /** @var ArrayAdapter $cache */
        $cache = $this->cache;

        $this->designConfigurationCache->getDesignConfigurations();
        $this->assertArrayHasKey('design-configurations', $cache->getValues());

        $this->designConfigurationCache->clearCache();
        $this->assertEmpty($cache->getValues());
    }
}
