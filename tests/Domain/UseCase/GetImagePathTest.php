<?php

declare(strict_types=1);

namespace RichId\DesignCustomizationBundle\Tests\Domain\UseCase;

use RichCongress\TestFramework\TestConfiguration\Annotation\TestConfig;
use RichCongress\TestSuite\TestCase\TestCase;
use RichId\DesignCustomizationBundle\Domain\Exception\NotFoundDesignConfigurationException;
use RichId\DesignCustomizationBundle\Domain\UseCase\GetImagePath;

/**
 * @covers \RichId\DesignCustomizationBundle\Domain\UseCase\GetImagePath
 * @TestConfig("fixtures")
 */
final class GetImagePathTest extends TestCase
{
    /** @var GetImagePath */
    public $useCase;

    public function testUseCaseConfigurationNotFound(): void
    {
        $this->expectException(NotFoundDesignConfigurationException::class);
        $this->expectExceptionMessage('Not found configuration with slug my_slug.');

        ($this->useCase)('my_slug');
    }

    public function testUseCaseBadType(): void
    {
        $path = ($this->useCase)('color-primary');
        $this->assertNull($path);
    }

    public function testUseCase(): void
    {
        $path = ($this->useCase)('logo');
        $this->assertStringContainsString('/uploads/design/default/logo.svg?cachekey=', $path ?? '');
    }
}
