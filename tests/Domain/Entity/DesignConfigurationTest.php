<?php

declare(strict_types=1);

namespace RichId\DesignCustomizationBundle\Tests\Domain\Entity;

use Doctrine\DBAL\Exception\UniqueConstraintViolationException;
use RichCongress\TestFramework\TestConfiguration\Annotation\TestConfig;
use RichCongress\TestSuite\TestCase\TestCase;
use RichCongress\TestTools\Helper\ForceExecutionHelper;
use RichId\DesignCustomizationBundle\Domain\Entity\DesignConfiguration;

/**
 * @covers \RichId\DesignCustomizationBundle\Domain\Entity\DesignConfiguration
 * @TestConfig("fixtures")
 */
final class DesignConfigurationTest extends TestCase
{
    public function testSlugUnique(): void
    {
        $entity = $this->getReference(DesignConfiguration::class, 'color-primary');
        ForceExecutionHelper::update($entity, ['slug' => 'color-secondary']);

        $this->expectException(UniqueConstraintViolationException::class);

        $this->getManager()->persist($entity);
        $this->getManager()->flush();
    }

    public function testPositionUniqueForType(): void
    {
        $entity = $this->getReference(DesignConfiguration::class, 'color-primary');
        ForceExecutionHelper::update($entity, ['position' => 2]);

        $this->expectException(UniqueConstraintViolationException::class);

        $this->getManager()->persist($entity);
        $this->getManager()->flush();
    }

    public function testEntity(): void
    {
        $entity = $this->getReference(DesignConfiguration::class, 'color-primary');
        $entity->setValue('#aaaaaa');

        $this->assertSame(1, $entity->getId());
        $this->assertSame(1, $entity->getPosition());
        $this->assertSame('color-primary', $entity->getSlug());
        $this->assertSame('Primary color', $entity->getName());
        $this->assertSame('color', $entity->getType());
        $this->assertSame('#aaaaaa', $entity->getValue());
        $this->assertSame('#ffffff', $entity->getDefaultValue());
        $this->assertInstanceOf(\DateTime::class, $entity->getDateUpdate());
    }

    public function testGetValueToUser(): void
    {
        $entity = $this->getReference(DesignConfiguration::class, 'color-primary');
        $this->assertSame('#ffffff', $entity->getValueToUse());

        $entity->setValue('#aaaaaa');
        $this->assertSame('#aaaaaa', $entity->getValueToUse());
    }
}
