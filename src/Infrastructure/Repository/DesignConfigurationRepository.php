<?php

declare(strict_types=1);

namespace RichId\DesignCustomizationBundle\Infrastructure\Repository;

use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\Persistence\ManagerRegistry;
use RichId\DesignCustomizationBundle\Domain\Entity\DesignConfiguration;

/**
 * @extends ServiceEntityRepository<DesignConfiguration>
 *
 * @method DesignConfiguration findOneBySlug(string $slug)
 */
class DesignConfigurationRepository extends ServiceEntityRepository
{
    /** @codeCoverageIgnore */
    public function __construct(ManagerRegistry $registry)
    {
        parent::__construct($registry, DesignConfiguration::class);
    }
}
