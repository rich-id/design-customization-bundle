<?php

declare(strict_types=1);

namespace RichId\DesignCustomizationBundle\Tests\Infrastructure\GoogleApi;

use RichCongress\TestFramework\TestConfiguration\Annotation\TestConfig;
use RichCongress\TestSuite\TestCase\TestCase;
use RichId\DesignCustomizationBundle\Domain\Exception\InvalidGoogleFontApiKeyException;
use RichId\DesignCustomizationBundle\Domain\Exception\InvalidGoogleFontApiResponseException;
use RichId\DesignCustomizationBundle\Domain\Model\GoogleFont;
use RichId\DesignCustomizationBundle\Infrastructure\GoogleApi\GetGoogleFonts;
use RichId\DesignCustomizationBundle\Tests\Resources\Stub\HttpClientStub;

/**
 * @covers \RichId\DesignCustomizationBundle\Infrastructure\GoogleApi\GetGoogleFonts
 * @TestConfig("kernel")
 */
final class GetGoogleFontsTest extends TestCase
{
    /** @var GetGoogleFonts */
    public $getGoogleFonts;

    /** @var HttpClientStub */
    public $httpClientStub;

    public function testGetGoogleFontsInvalidToken(): void
    {
        $this->expectException(InvalidGoogleFontApiKeyException::class);
        $this->expectExceptionMessage('Invalid google font api key. Check your configuration.');

        ($this->getGoogleFonts)();
    }

    public function testGetGoogleFontsInvalidResponse(): void
    {
        $this->httpClientStub->setRequest(
            'GET https://www.googleapis.com/webfonts/v1/webfonts?key=',
            'googleApiInvalidResponse'
        );

        $this->expectException(InvalidGoogleFontApiResponseException::class);
        $this->expectExceptionMessage('Invalid google font api response.');

        ($this->getGoogleFonts)();
    }

    public function testGetGoogleFonts(): void
    {
        $this->httpClientStub->setRequest(
            'GET https://www.googleapis.com/webfonts/v1/webfonts?key=',
            'googleApi'
        );

        $fonts = ($this->getGoogleFonts)();

        $this->assertCount(3, $fonts);

        $this->assertInstanceOf(GoogleFont::class, $fonts[0]);
        $this->assertSame('My font 1', $fonts[0]->getFamily());

        $this->assertInstanceOf(GoogleFont::class, $fonts[1]);
        $this->assertSame('My font 2', $fonts[1]->getFamily());

        $this->assertInstanceOf(GoogleFont::class, $fonts[2]);
        $this->assertSame('My font 3', $fonts[2]->getFamily());
    }
}
