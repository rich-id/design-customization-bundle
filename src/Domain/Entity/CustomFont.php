<?php

declare(strict_types=1);

namespace RichId\DesignCustomizationBundle\Domain\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass="RichId\DesignCustomizationBundle\Infrastructure\Repository\DesignConfigurationRepository")
 * @ORM\Table("module_design_customization_custom_front")
 */
class CustomFont
{
    /**
     * @var int
     *
     * @ORM\Id
     * @ORM\Column(type="integer", name="id", options={"unsigned":true})
     * @ORM\GeneratedValue(strategy="AUTO")
     */
    protected $id;

    /**
     * @var string
     *
     * @ORM\Column(type="string", nullable=false, length=255, unique=true, name="font_family")
     */
    protected $fontFamily;

    /**
     * @var string
     *
     * @ORM\Column(type="string", nullable=false, length=255, name="url")
     */
    protected $url;

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
