<?php

declare(strict_types=1);

namespace RichId\DesignCustomizationBundle\Infrastructure\Adapter;

use RichId\DesignCustomizationBundle\Domain\Entity\DesignConfiguration;
use RichId\DesignCustomizationBundle\Domain\Port\EntityGetterInterface;
use RichId\DesignCustomizationBundle\Infrastructure\Cache\DesignConfigurationCache;

class EntityGetter implements EntityGetterInterface
{
    /** @var DesignConfigurationCache */
    protected $designConfigurationCache;

    public function __construct(DesignConfigurationCache $designConfigurationCache)
    {
        $this->designConfigurationCache = $designConfigurationCache;
    }

    public function getDesignConfiguration(string $configurationSlug): ?DesignConfiguration
    {
        return $this->designConfigurationCache->getDesignConfiguration($configurationSlug);
    }

    /** @return array<string, DesignConfiguration> */
    public function getDesignConfigurations(): array
    {
        return $this->designConfigurationCache->getDesignConfigurations();
    }
}
