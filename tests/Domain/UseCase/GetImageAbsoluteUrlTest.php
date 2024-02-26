<?php

declare(strict_types=1);

namespace RichId\DesignCustomizationBundle\Tests\Domain\UseCase;

use RichCongress\TestFramework\TestConfiguration\Attribute\TestConfig;
use RichCongress\TestSuite\TestCase\TestCase;
use RichId\DesignCustomizationBundle\Domain\Exception\NotFoundDesignConfigurationException;
use RichId\DesignCustomizationBundle\Domain\UseCase\GetImageAbsoluteUrl;

/** @covers \RichId\DesignCustomizationBundle\Domain\UseCase\GetImageAbsoluteUrl */
#[TestConfig('fixtures')]
final class GetImageAbsoluteUrlTest extends TestCase
{
    /** @var GetImageAbsoluteUrl */
    public $useCase;

    public function testUseCaseConfigurationNotFound(): void
    {
        $this->expectException(NotFoundDesignConfigurationException::class);
        $this->expectExceptionMessage('Not found configuration with slug my_slug.');

        ($this->useCase)('my_slug');
    }

    public function testUseCaseBadType(): void
    {
        $url = ($this->useCase)('color-primary');
        $this->assertSame('', $url);
    }

    public function testUseCase(): void
    {
        $url = ($this->useCase)('logo');
        $this->assertStringContainsString('http://localhost/uploads/design/default/logo.svg?cachekey=', $url);
    }
}
