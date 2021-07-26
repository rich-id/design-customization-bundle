<?php

declare(strict_types=1);

namespace RichId\DesignCustomizationBundle\Domain\UseCase;

use RichId\DesignCustomizationBundle\Domain\Entity\DesignConfiguration;
use RichId\DesignCustomizationBundle\Domain\Port\EntityGetterInterface;

class GetConfigurationValue
{
    /** @var EntityGetterInterface */
    protected $entityGetter;

    public function __construct(EntityGetterInterface $entityGetter)
    {
        $this->entityGetter = $entityGetter;
    }

    public function __invoke(string $configurationSlug): ?string
    {
        $configuration = $this->entityGetter->getDesignConfiguration($configurationSlug);

        if (!$configuration instanceof DesignConfiguration) {
            return null;
        }

        return $configuration->getValueToUse();
    }
}
