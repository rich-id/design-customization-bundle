<?php

declare(strict_types=1);

namespace RichId\DesignCustomizationBundle\Tests\Domain\UseCase;

use RichCongress\TestFramework\TestConfiguration\Attribute\TestConfig;
use RichCongress\TestSuite\TestCase\TestCase;
use RichId\DesignCustomizationBundle\Domain\Exception\NotFoundDesignConfigurationException;
use RichId\DesignCustomizationBundle\Domain\UseCase\GetFontUrl;

/** @covers \RichId\DesignCustomizationBundle\Domain\UseCase\GetFontUrl */
#[TestConfig('fixtures')]
final class GetFontUrlTest extends TestCase
{
    /** @var GetFontUrl */
    public $useCase;

    public function testUseCaseConfigurationNotFound(): void
    {
        $this->expectException(NotFoundDesignConfigurationException::class);
        $this->expectExceptionMessage('Not found configuration with slug my_slug.');

        ($this->useCase)('my_slug');
    }

    public function testUseCaseBadType(): void
    {
        $fontUrl = ($this->useCase)('color-primary');
        $this->assertNull($fontUrl);
    }

    public function testUseCaseCustomFont(): void
    {
        $fontUrl = ($this->useCase)('font-custom');
        $this->assertSame('https://test.test', $fontUrl);
    }

    public function testUseCaseGoogleFont(): void
    {
        $fontUrl = ($this->useCase)('font-primary');
        $this->assertSame('https://fonts.googleapis.com/css2?family=My+Font:ital,wght@0,100;0,200;0,300;0,400;0,500;0,600;0,700;0,800;0,900;1,100;1,200;1,300;1,400;1,500;1,600;1,700;1,800;1,900', $fontUrl);
    }
}
