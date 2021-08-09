<?php

declare(strict_types=1);

namespace RichId\DesignCustomizationBundle\Tests\Domain\Exception;

use RichCongress\TestFramework\TestConfiguration\Annotation\TestConfig;
use RichCongress\TestSuite\TestCase\TestCase;
use RichId\DesignCustomizationBundle\Domain\Exception\DesignCustomizationException;
use RichId\DesignCustomizationBundle\Domain\Exception\InvalidGoogleFontApiKeyException;

/**
 * @covers \RichId\DesignCustomizationBundle\Domain\Exception\InvalidGoogleFontApiKeyException
 * @TestConfig("kernel")
 */
final class InvalidGoogleFontApiKeyExceptionTest extends TestCase
{
    public function testException(): void
    {
        $exception = new InvalidGoogleFontApiKeyException();

        $this->assertInstanceOf(DesignCustomizationException::class, $exception);
        $this->assertSame('Invalid google font api key. Check your configuration.', $exception->getMessage());
    }
}
