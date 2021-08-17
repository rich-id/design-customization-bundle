<?php

declare(strict_types=1);

namespace RichId\DesignCustomizationBundle\Tests\Domain\Exception;

use RichCongress\TestFramework\TestConfiguration\Annotation\TestConfig;
use RichCongress\TestSuite\TestCase\TestCase;
use RichId\DesignCustomizationBundle\Domain\Exception\DesignCustomizationException;
use RichId\DesignCustomizationBundle\Domain\Exception\InvalidGoogleFontApiResponseException;

/**
 * @covers \RichId\DesignCustomizationBundle\Domain\Exception\InvalidGoogleFontApiResponseException
 * @TestConfig("kernel")
 */
final class InvalidGoogleFontApiResponseExceptionTest extends TestCase
{
    public function testException(): void
    {
        $exception = new InvalidGoogleFontApiResponseException();

        $this->assertInstanceOf(DesignCustomizationException::class, $exception);
        $this->assertSame('Invalid google font api response.', $exception->getMessage());
    }
}
