<?php

declare(strict_types=1);

namespace RichId\DesignCustomizationBundle\Tests\Domain\UseCase;

use RichCongress\TestFramework\TestConfiguration\Attribute\TestConfig;
use RichCongress\TestSuite\TestCase\TestCase;
use RichId\DesignCustomizationBundle\Domain\Exception\NotFoundDesignConfigurationException;
use RichId\DesignCustomizationBundle\Domain\UseCase\GetFontFamily;

/** @covers \RichId\DesignCustomizationBundle\Domain\UseCase\GetFontFamily */
#[TestConfig('fixtures')]
final class GetFontFamilyTest extends TestCase
{
    /** @var GetFontFamily */
    public $useCase;

    public function testUseCaseConfigurationNotFound(): void
    {
        $this->expectException(NotFoundDesignConfigurationException::class);
        $this->expectExceptionMessage('Not found configuration with slug my_slug.');

        ($this->useCase)('my_slug');
    }

    public function testUseCaseBadType(): void
    {
        $value = ($this->useCase)('color-primary');
        $this->assertNull($value);
    }

    public function testUseCase(): void
    {
        $value = ($this->useCase)('font-primary');
        $this->assertSame('My Font', $value);
    }
}
