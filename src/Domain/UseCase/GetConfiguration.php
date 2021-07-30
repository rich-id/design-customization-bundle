<?php

declare(strict_types=1);

namespace RichId\DesignCustomizationBundle\Domain\UseCase;

use RichId\DesignCustomizationBundle\Domain\Entity\DesignConfiguration;
use RichId\DesignCustomizationBundle\Domain\Exception\NotFoundDesignConfigurationException;
use RichId\DesignCustomizationBundle\Domain\Port\GetDesignConfigurationInterface;

class GetConfiguration
{
    /** @var GetDesignConfigurationInterface */
    protected $getEntity;

    public function __construct(GetDesignConfigurationInterface $getEntity)
    {
        $this->getEntity = $getEntity;
    }

    public function __invoke(string $configurationSlug): DesignConfiguration
    {
        $configuration = $this->getEntity->getDesignConfiguration($configurationSlug);

        if (!$configuration instanceof DesignConfiguration) {
            throw new NotFoundDesignConfigurationException($configurationSlug);
        }

        return $configuration;
    }
}
