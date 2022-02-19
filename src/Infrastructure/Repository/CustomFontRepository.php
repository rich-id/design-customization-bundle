<?php

declare(strict_types=1);

namespace RichId\DesignCustomizationBundle\Infrastructure\Repository;

use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\Persistence\ManagerRegistry;
use RichId\DesignCustomizationBundle\Domain\Entity\CustomFont;

/** @extends ServiceEntityRepository<CustomFont> */
class CustomFontRepository extends ServiceEntityRepository
{
    /** @codeCoverageIgnore  */
    public function __construct(ManagerRegistry $registry)
    {
        parent::__construct($registry, CustomFont::class);
    }
}
