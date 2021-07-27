<?php

declare(strict_types=1);

namespace RichId\DesignCustomizationBundle\Domain\UseCase;

use RichId\DesignCustomizationBundle\Domain\Entity\DesignConfiguration;
use RichId\DesignCustomizationBundle\Domain\Port\GetEntityInterface;

class GetConfigurations
{
    /** @var GetEntityInterface */
    protected $getEntity;

    public function __construct(GetEntityInterface $getEntity)
    {
        $this->getEntity = $getEntity;
    }

    /**
     * @param string|string[] $types
     *
     * @return array<string, DesignConfiguration>
     */
    public function __invoke($types = []): array
    {
        $types = (array) $types;
        $configurations = $this->getEntity->getDesignConfigurations();

        if (empty($types)) {
            return $configurations;
        }

        return \array_filter(
            $configurations,
            static function (DesignConfiguration $designConfiguration) use ($types) {
                return \in_array($designConfiguration->getType(), $types, true);
            }
        );
    }
}
