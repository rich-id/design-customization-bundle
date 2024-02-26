<?php

declare(strict_types=1);

namespace RichId\DesignCustomizationBundle\Domain\Entity;

use Doctrine\ORM\Mapping as ORM;
use RichId\DesignCustomizationBundle\Infrastructure\Repository\DesignConfigurationRepository;

#[ORM\Entity(repositoryClass: DesignConfigurationRepository::class)]
#[ORM\Table('module_design_customization_custom_front')]
class CustomFont
{
    #[ORM\Id]
    #[ORM\Column(name: 'id', type: 'integer', options: ['unsigned' => true])]
    #[ORM\GeneratedValue(strategy: 'AUTO')]
    protected int $id;

    #[ORM\Column(name: 'font_family', type: 'string', length: 255, unique: true, nullable: false)]
    protected string $fontFamily;

    #[ORM\Column(name: 'url', type: 'string', length: 255, nullable: false)]
    protected string $url;

    public function getId(): int
    {
        return $this->id;
    }

    public function getFontFamily(): string
    {
        return $this->fontFamily;
    }

    public function getUrl(): string
    {
        return $this->url;
    }
}
