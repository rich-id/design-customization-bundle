<?php

declare(strict_types=1);

namespace RichId\DesignCustomizationBundle\UserInterface\RestController;

use RichId\DesignCustomizationBundle\Domain\Model\OutputCustomFont;
use RichId\DesignCustomizationBundle\Domain\Model\OutputDesignConfiguration;
use RichId\DesignCustomizationBundle\Infrastructure\Repository\CustomFontRepository;
use RichId\DesignCustomizationBundle\Infrastructure\Repository\DesignConfigurationRepository;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\JsonResponse;

class GetConfigurationsRoute extends AbstractController
{
    /** @var CustomFontRepository */
    protected $customFontRepository;

    /** @var DesignConfigurationRepository */
    protected $designConfigurationRepository;

    public function __construct(CustomFontRepository $customFontRepository, DesignConfigurationRepository $designConfigurationRepository)
    {
        $this->customFontRepository = $customFontRepository;
        $this->designConfigurationRepository = $designConfigurationRepository;
    }

    public function __invoke(): JsonResponse
    {
        return new JsonResponse(
            [
                'customFonts' => \array_map(
                    [OutputCustomFont::class, 'buildFromEntity'],
                    $this->customFontRepository->findAll()
                ),
                'designConfigurations' => \array_map(
                    [OutputDesignConfiguration::class, 'buildFromEntity'],
                    $this->designConfigurationRepository->findAll()
                ),
            ]
        );
    }
}
