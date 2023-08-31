<?php

declare(strict_types=1);

namespace RichId\DesignCustomizationBundle\Domain\UseCase;

use RichId\DesignCustomizationBundle\Domain\Entity\Type\DesignConfigurationType;

class GetImageAlt
{
    /** @var GetConfiguration */
    protected $getConfiguration;

    public function __construct(GetConfiguration $getConfiguration)
    {
        $this->getConfiguration = $getConfiguration;
    }

    public function __invoke(string $configurationSlug): string
    {
        $configuration = ($this->getConfiguration)($configurationSlug);

        return $configuration->getType() === DesignConfigurationType::IMAGE
            ? ($configuration->getAccessibilityValueToUse() ?? '')
            : '';
    }
}
