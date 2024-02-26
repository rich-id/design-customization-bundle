<?php

declare(strict_types=1);

namespace RichId\DesignCustomizationBundle\Tests\Domain\Exception;

use RichCongress\TestFramework\TestConfiguration\Attribute\TestConfig;
use RichCongress\TestSuite\TestCase\TestCase;
use RichId\DesignCustomizationBundle\Domain\Exception\DesignCustomizationException;
use RichId\DesignCustomizationBundle\Domain\Exception\NotFoundDesignConfigurationException;

/** @covers \RichId\DesignCustomizationBundle\Domain\Exception\NotFoundDesignConfigurationException */
#[TestConfig('kernel')]
final class NotFoundDesignConfigurationExceptionTest extends TestCase
{
    public function testException(): void
    {
        $exception = new NotFoundDesignConfigurationException('slug');

        $this->assertInstanceOf(DesignCustomizationException::class, $exception);
        $this->assertSame('slug', $exception->getConfigurationSlug());
        $this->assertSame('Not found configuration with slug slug.', $exception->getMessage());
    }
}
