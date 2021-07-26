<?php

declare(strict_types=1);

namespace RichId\DesignCustomizationBundle\Domain\UseCase;

use RichId\DesignCustomizationBundle\Domain\Entity\DesignConfiguration;
use RichId\DesignCustomizationBundle\Domain\Port\EntityGetterInterface;

class GetConfigurations
{
    /** @var EntityGetterInterface */
    protected $entityGetter;

    public function __construct(EntityGetterInterface $entityGetter)
    {
        $this->entityGetter = $entityGetter;
    }

    /**
     * @param string|array $types
     *
     * @return array<string, DesignConfiguration>
     */
    public function __invoke($types = []): array
    {
        $types = (array) $types;
        $configurations = $this->entityGetter->getDesignConfigurations();

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
