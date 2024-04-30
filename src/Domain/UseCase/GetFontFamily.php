<?php

declare(strict_types=1);

namespace RichId\DesignCustomizationBundle\Domain\UseCase;

use RichId\DesignCustomizationBundle\Domain\Entity\Type\DesignConfigurationType;

class GetFontFamily
{
    /** @var GetConfiguration */
    protected $getConfiguration;

    public function __construct(GetConfiguration $getConfiguration)
    {
        $this->getConfiguration = $getConfiguration;
    }

    public function __invoke(string $configurationSlug): ?string
    {
        $configuration = ($this->getConfiguration)($configurationSlug);

        if ($configuration->getType() !== DesignConfigurationType::Font) {
            return null;
        }

        return $configuration->getValueToUse();
    }
}
