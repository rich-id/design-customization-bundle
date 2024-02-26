<?php

declare(strict_types=1);

namespace RichId\DesignCustomizationBundle\Domain\Entity;

use Doctrine\ORM\Mapping as ORM;
use RichId\DesignCustomizationBundle\Infrastructure\Repository\DesignConfigurationRepository;

#[ORM\Entity(repositoryClass: DesignConfigurationRepository::class)]
#[ORM\Table(name: 'module_design_customization_configuration')]
#[ORM\UniqueConstraint(name: 'design_configuration_type_position_UNIQUE', columns: ['type', 'position'])]
class DesignConfiguration
{
    #[ORM\Id]
    #[ORM\Column(name: 'id', type: 'integer', options: ['unsigned' => true])]
    #[ORM\GeneratedValue(strategy: 'AUTO')]
    protected int $id;

    #[ORM\Column(name: 'slug', type: 'string', length: 255, unique: true, nullable: false)]
    protected string $slug;

    #[ORM\Column(name: 'name', type: 'string', length: 255, unique: true, nullable: false)]
    protected string $name;

    #[ORM\Column(name: 'type', type: 'DesignConfigurationType', nullable: false)]
    protected string $type;

    #[ORM\Column(name: 'position', type: 'integer', nullable: false, options: ['unsigned' => true])]
    protected int $position = 0;

    #[ORM\Column(name: 'default_value', type: 'string', length: 600, nullable: false)]
    protected string $defaultValue;

    #[ORM\Column(name: 'value', type: 'string', length: 600, nullable: true)]
    protected ?string $value;

    #[ORM\Column(name: 'accessibility_default_value', type: 'string', length: 600, nullable: true)]
    protected ?string $accessibilityDefaultValue;

    #[ORM\Column(name: 'accessibility_value', type: 'string', length: 600, nullable: true)]
    protected ?string $accessibilityValue;

    #[ORM\Column(name: 'date_update', type: 'datetime', nullable: false)]
    protected \DateTime $dateUpdate;

    public function getId(): int
    {
        return $this->id;
    }

    public function getSlug(): string
    {
        return $this->slug;
    }

    public function getName(): string
    {
        return $this->name;
    }

    public function getType(): string
    {
        return $this->type;
    }

    public function getPosition(): int
    {
        return $this->position;
    }

    public function getDefaultValue(): string
    {
        return $this->defaultValue;
    }

    public function getValue(): ?string
    {
        return $this->value;
    }

    public function getAccessibilityDefaultValue(): ?string
    {
        return $this->accessibilityDefaultValue;
    }

    public function getAccessibilityValue(): ?string
    {
        return $this->accessibilityValue;
    }

    public function getDateUpdate(): \DateTime
    {
        return $this->dateUpdate;
    }

    public function getValueToUse(): string
    {
        if ($this->value !== null && $this->value !== '') {
            return $this->value;
        }

        return $this->defaultValue;
    }

    public function getAccessibilityValueToUse(): ?string
    {
        if ($this->accessibilityValue !== null && $this->accessibilityValue !== '') {
            return $this->accessibilityValue;
        }

        return $this->accessibilityDefaultValue;
    }
}
