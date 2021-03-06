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

    public function getDesignCustomizationPrefix(): string
    {
        return (string) $this->parameterBag->get('rich_id_design_customization.css_customization_prefix');
    }

    public function getImageUploadsDir(): string
    {
        /* @phpstan-ignore-next-line */
        return $this->parameterBag->get('rich_id_design_customization.image_uploads_dir');
    }
}
