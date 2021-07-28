<?php

declare(strict_types=1);

namespace RichId\DesignCustomizationBundle\Tests\Infrastructure\Adapter;

use RichCongress\TestFramework\TestConfiguration\Annotation\TestConfig;
use RichCongress\TestSuite\TestCase\TestCase;
use RichId\DesignCustomizationBundle\Infrastructure\Adapter\UrlGenerator;

/**
 * @covers \RichId\DesignCustomizationBundle\Infrastructure\Adapter\UrlGenerator
 * @TestConfig("fixtures")
 */
final class UrlGeneratorTest extends TestCase
{
    /** @var UrlGenerator */
    public $adapter;

    public function testGetAbsoluteUrlFromPath(): void
    {
        $url = $this->adapter->getAbsoluteUrlFromPath('my_path');
        $this->assertSame('http://localhost/my_path', $url);
    }
}
