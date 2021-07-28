<?php

declare(strict_types=1);

namespace RichId\DesignCustomizationBundle\Tests\Domain\UseCase;

use RichCongress\TestFramework\TestConfiguration\Annotation\TestConfig;
use RichCongress\TestSuite\TestCase\TestCase;
use RichId\DesignCustomizationBundle\Domain\Exception\NotFoundDesignConfigurationException;
use RichId\DesignCustomizationBundle\Domain\UseCase\GetConfigurationValue;

/**
 * @covers \RichId\DesignCustomizationBundle\Domain\UseCase\GetConfigurationValue
 * @TestConfig("fixtures")
 */
final class GetConfigurationValueTest extends TestCase
{
    /** @var GetConfigurationValue */
    public $useCase;

    public function testUseCaseConfigurationNotFound(): void
    {
        $this->expectException(NotFoundDesignConfigurationException::class);
        $this->expectExceptionMessage('Not found configuration with slug my_slug.');

        ($this->useCase)('my_slug');
    }

    public function testUseCase(): void
    {
        $value = ($this->useCase)('color-primary');
        $this->assertSame('#ffffff', $value);
    }
}
