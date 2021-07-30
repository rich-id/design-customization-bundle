<?php

declare(strict_types=1);

namespace RichId\DesignCustomizationBundle\Tests\Infrastructure\Adapter;

use RichCongress\TestFramework\TestConfiguration\Annotation\TestConfig;
use RichCongress\TestSuite\TestCase\TestCase;
use RichId\DesignCustomizationBundle\Domain\Entity\DesignConfiguration;
use RichId\DesignCustomizationBundle\Infrastructure\Adapter\GetDesignConfiguration;

/**
 * @covers \RichId\DesignCustomizationBundle\Infrastructure\Adapter\GetDesignConfiguration
 * @TestConfig("fixtures")
 */
final class GetDesignConfigurationTest extends TestCase
{
    /** @var GetDesignConfiguration */
    public $adapter;

    public function testGetDesignConfigurationConfigurationNotFound(): void
    {
        $configuration = $this->adapter->getDesignConfiguration('my_slug');
        $this->assertNull($configuration);
    }

    public function testGetDesignConfiguration(): void
    {
        $configuration = $this->adapter->getDesignConfiguration('color-primary');

        $this->assertInstanceOf(DesignConfiguration::class, $configuration);

        $slug = $configuration !== null ? $configuration->getSlug() : '';
        $this->assertSame('color-primary', $slug);
    }

    public function testGetDesignConfigurations(): void
    {
        $configurations = $this->adapter->getDesignConfigurations();

        $this->assertIsArray($configurations);
        $this->assertCount(5, $configurations);

        $this->assertArrayHasKey('color-primary', $configurations);
        $this->assertArrayHasKey('color-secondary', $configurations);
        $this->assertArrayHasKey('font-primary', $configurations);
        $this->assertArrayHasKey('radius-items', $configurations);
        $this->assertArrayHasKey('logo', $configurations);
    }
}
