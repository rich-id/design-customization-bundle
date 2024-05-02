<?php

declare(strict_types=1);

namespace RichId\DesignCustomizationBundle\Domain\UseCase;

use RichId\DesignCustomizationBundle\Domain\Entity\DesignConfiguration;
use RichId\DesignCustomizationBundle\Domain\Entity\Type\DesignConfigurationType;
use RichId\DesignCustomizationBundle\Domain\Port\GetDesignConfigurationInterface;

class GetConfigurations
{
    /** @var GetDesignConfigurationInterface */
    protected $getEntity;

    public function __construct(GetDesignConfigurationInterface $getEntity)
    {
        $this->getEntity = $getEntity;
    }

    /**
     * @param DesignConfigurationType|DesignConfigurationType[] $types
     *
     * @return array<string, DesignConfiguration>
     */
    public function __invoke(DesignConfigurationType|array $types = []): array
    {
        if ($types instanceof DesignConfigurationType) {
            $types = [$types];
        }

        $configurations = $this->getEntity->getDesignConfigurations();

        if (empty($types)) {
            return $configurations;
        }

        return \array_filter(
            $configurations,
            static fn (DesignConfiguration $dc) => \in_array($dc->getType(), $types, true)
        );
    }
}
