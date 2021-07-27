<?php

declare(strict_types=1);

namespace RichId\DesignCustomizationBundle\Domain\Port;

use RichId\DesignCustomizationBundle\Domain\Entity\DesignConfiguration;

interface GetEntityInterface
{
    public function getDesignConfiguration(string $configurationSlug): ?DesignConfiguration;

    /** @return array<string, DesignConfiguration> */
    public function getDesignConfigurations(): array;
}
