<?php

declare(strict_types=1);

namespace RichId\DesignCustomizationBundle\Infrastructure\Adapter;

use RichId\DesignCustomizationBundle\Domain\Port\GetParameterInterface;
use Symfony\Component\DependencyInjection\ParameterBag\ParameterBagInterface;

class GetParameter implements GetParameterInterface
{
    /** @var ParameterBagInterface */
    protected $parameterBag;

    public function __construct(ParameterBagInterface $parameterBag)
    {
        $this->parameterBag = $parameterBag;
    }

    /** @return string[] */
    public function getAdminRoles(): array
    {
        /* @phpstan-ignore-next-line */
        return $this->parameterBag->get('rich_id_design_customization.admin_roles');
    }

    /** @return array<string, string> */
    public function getCustomFonts(): array
    {
        /* @phpstan-ignore-next-line */
        return $this->parameterBag->get('rich_id_design_customization.custom_fonts');
    }

    public function getDesignCustomizationPrefix(): string
    {
        /* @phpstan-ignore-next-line */
        return (string) $this->parameterBag->get('rich_id_design_customization.css_customization_prefix');
    }

    public function getGoogleFontsApiKey(): string
    {
        /* @phpstan-ignore-next-line */
        return $this->parameterBag->get('rich_id_design_customization.google_fonts_api_key');
    }

    public function getImageUploadsDir(): string
    {
        /* @phpstan-ignore-next-line */
        return $this->parameterBag->get('rich_id_design_customization.image_uploads_dir');
    }
}
