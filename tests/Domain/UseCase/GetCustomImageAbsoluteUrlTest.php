<?php

declare(strict_types=1);

namespace RichId\DesignCustomizationBundle\Tests\Domain\UseCase;

use RichCongress\TestFramework\TestConfiguration\Annotation\TestConfig;
use RichCongress\TestSuite\TestCase\TestCase;
use RichId\DesignCustomizationBundle\Domain\UseCase\GetCustomImageAbsoluteUrl;

/**
 * @covers \RichId\DesignCustomizationBundle\Domain\UseCase\GetCustomImageAbsoluteUrl
 * @TestConfig("fixtures")
 */
final class GetCustomImageAbsoluteUrlTest extends TestCase
{
    /** @var GetCustomImageAbsoluteUrl */
    public $useCase;

    public function testUseCase(): void
    {
        $url = ($this->useCase)('test.svg');
        $this->assertStringContainsString('http://localhost/uploads/design/test.svg', $url);
    }
}
