<?php

declare(strict_types=1);

namespace RichId\DesignCustomizationBundle\Tests\Domain\UseCase;

use RichCongress\TestFramework\TestConfiguration\Attribute\TestConfig;
use RichCongress\TestSuite\TestCase\TestCase;
use RichId\DesignCustomizationBundle\Domain\Entity\Type\DesignConfigurationType;
use RichId\DesignCustomizationBundle\Domain\UseCase\GetConfigurations;

/** @covers \RichId\DesignCustomizationBundle\Domain\UseCase\GetConfigurations */
#[TestConfig('fixtures')]
final class GetConfigurationsTest extends TestCase
{
    /** @var GetConfigurations */
    public $useCase;

    public function testUseCaseWithoutFilter(): void
    {
        $configurations = ($this->useCase)();

        $this->assertIsArray($configurations);
        $this->assertCount(6, $configurations);

        $this->assertArrayHasKey('color-primary', $configurations);
        $this->assertArrayHasKey('color-secondary', $configurations);
        $this->assertArrayHasKey('font-primary', $configurations);
        $this->assertArrayHasKey('font-custom', $configurations);
        $this->assertArrayHasKey('radius-items', $configurations);
        $this->assertArrayHasKey('logo', $configurations);
    }

    public function testUseCaseFilterAllTypes(): void
    {
        $configurations = ($this->useCase)(
            [
                DesignConfigurationType::Color,
                DesignConfigurationType::Font,
                DesignConfigurationType::Image,
                DesignConfigurationType::Radius,
            ]
        );

        $this->assertIsArray($configurations);
        $this->assertCount(6, $configurations);

        $this->assertArrayHasKey('color-primary', $configurations);
        $this->assertArrayHasKey('color-secondary', $configurations);
        $this->assertArrayHasKey('font-primary', $configurations);
        $this->assertArrayHasKey('font-custom', $configurations);
        $this->assertArrayHasKey('radius-items', $configurations);
        $this->assertArrayHasKey('logo', $configurations);
    }

    public function testUseCaseFilterOnColor(): void
    {
        $configurations = ($this->useCase)(DesignConfigurationType::Color);

        $this->assertIsArray($configurations);
        $this->assertCount(2, $configurations);

        $this->assertArrayHasKey('color-primary', $configurations);
        $this->assertArrayHasKey('color-secondary', $configurations);
    }

    public function testUseCaseFilterOnFont(): void
    {
        $configurations = ($this->useCase)(DesignConfigurationType::Font);

        $this->assertIsArray($configurations);
        $this->assertCount(2, $configurations);

        $this->assertArrayHasKey('font-primary', $configurations);
        $this->assertArrayHasKey('font-custom', $configurations);
    }

    public function testUseCaseFilterOnImage(): void
    {
        $configurations = ($this->useCase)(DesignConfigurationType::Image);

        $this->assertIsArray($configurations);
        $this->assertCount(1, $configurations);

        $this->assertArrayHasKey('logo', $configurations);
    }

    public function testUseCaseFilterOnRadius(): void
    {
        $configurations = ($this->useCase)(DesignConfigurationType::Radius);

        $this->assertIsArray($configurations);
        $this->assertCount(1, $configurations);

        $this->assertArrayHasKey('radius-items', $configurations);
    }
}
