<?php

declare(strict_types=1);

namespace RichId\DesignCustomizationBundle\Tests\Domain\Entity;

use Doctrine\DBAL\Exception\UniqueConstraintViolationException;
use RichCongress\TestFramework\TestConfiguration\Attribute\TestConfig;
use RichCongress\TestSuite\TestCase\TestCase;
use RichId\DesignCustomizationBundle\Domain\Entity\CustomFont;

/** @covers \RichId\DesignCustomizationBundle\Domain\Entity\CustomFont */
#[TestConfig('fixtures')]
final class CustomFontTest extends TestCase
{
    public function testFontFamilyUnique(): void
    {
        $entity = $this->getReference(CustomFont::class, 'font-custom');
        $newEntity = clone $entity;

        $this->expectException(UniqueConstraintViolationException::class);

        $this->getManager()->persist($newEntity);
        $this->getManager()->flush();
    }

    public function testEntity(): void
    {
        $entity = $this->getReference(CustomFont::class, 'font-custom');

        $this->assertSame(1, $entity->getId());
        $this->assertSame('CustomFont', $entity->getFontFamily());
        $this->assertSame('https://test.test', $entity->getUrl());
    }
}
