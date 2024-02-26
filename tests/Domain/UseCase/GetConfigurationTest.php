<?php

declare(strict_types=1);

namespace RichId\DesignCustomizationBundle\Tests\Domain\UseCase;

use RichCongress\TestFramework\TestConfiguration\Attribute\TestConfig;
use RichCongress\TestSuite\TestCase\TestCase;
use RichId\DesignCustomizationBundle\Domain\Entity\DesignConfiguration;
use RichId\DesignCustomizationBundle\Domain\Exception\NotFoundDesignConfigurationException;
use RichId\DesignCustomizationBundle\Domain\UseCase\GetConfiguration;

/**
 * @covers \RichId\DesignCustomizationBundle\Domain\UseCase\GetConfiguration
 */
#[TestConfig('fixtures')]
final class GetConfigurationTest extends TestCase
{
    /** @var GetConfiguration */
    public $useCase;

    public function testUseCaseConfigurationNotFound(): void
    {
        $this->expectException(NotFoundDesignConfigurationException::class);
        $this->expectExceptionMessage('Not found configuration with slug my_slug.');

        ($this->useCase)('my_slug');
    }

    public function testUseCase(): void
    {
        $configuration = ($this->useCase)('color-primary');

        $this->assertInstanceOf(DesignConfiguration::class, $configuration);
        $this->assertSame('color-primary', $configuration->getSlug());
    }
}
