<?php

declare(strict_types=1);

namespace RichId\DesignCustomizationBundle\Tests\Infrastructure\Adapter;

use RichCongress\TestFramework\TestConfiguration\Annotation\TestConfig;
use RichCongress\TestSuite\TestCase\TestCase;
use RichId\DesignCustomizationBundle\Infrastructure\Adapter\GetParameter;

/**
 * @covers \RichId\DesignCustomizationBundle\Infrastructure\Adapter\GetParameter
 * @TestConfig("fixtures")
 */
final class GetParameterTest extends TestCase
{
    /** @var GetParameter */
    public $adapter;

    public function testGetAdminRoles(): void
    {
        $roles = $this->adapter->getAdminRoles();
        $this->assertSame(['ROLE_ADMIN'], $roles);
    }

    public function testGetDesignCustomizationPrefix(): void
    {
        $prefix = $this->adapter->getDesignCustomizationPrefix();
        $this->assertSame('rich-id-customization', $prefix);
    }

    public function testGetImageUploadsDir(): void
    {
        $dir = $this->adapter->getImageUploadsDir();
        $this->assertSame('/uploads/design', $dir);
    }
}
