<?php

declare(strict_types=1);

namespace RichId\DesignCustomizationBundle\Domain\UseCase;

use RichId\DesignCustomizationBundle\Domain\Entity\Type\DesignConfigurationType;
use RichId\DesignCustomizationBundle\Domain\Port\GetParameterInterface;

class GetImagePath
{
    /** @var GetConfiguration */
    protected $getConfiguration;

    /** @var GetParameterInterface */
    protected $getParameter;

    public function __construct(GetConfiguration $getConfiguration, GetParameterInterface $getParameter)
    {
        $this->getConfiguration = $getConfiguration;
        $this->getParameter = $getParameter;
    }

    public function __invoke(string $configurationSlug): ?string
    {
        $imageUploadsDir = $this->getParameter->getImageUploadsDir();
        $configuration = ($this->getConfiguration)($configurationSlug);

        if ($configuration->getType() !== DesignConfigurationType::IMAGE || $configuration->getValueToUse() === '') {
            return null;
        }

        return \sprintf(
            '%s/%s?cachekey=%s',
            $imageUploadsDir,
            $configuration->getValueToUse(),
            $configuration->getDateUpdate()
                ->getTimestamp()
        );
    }
}
