<?php

declare(strict_types=1);

namespace RichId\DesignCustomizationBundle\Domain\Model;

use RichId\DesignCustomizationBundle\Domain\Entity\DesignConfiguration;
use RichId\DesignCustomizationBundle\Domain\Entity\Type\DesignConfigurationType;

final class OutputDesignConfiguration
{
    /** @var string */
    public $slug;

    /** @var string */
    public $name;

    /** @var DesignConfigurationType */
    public $type;

    /** @var int */
    public $position;

    /** @var string */
    public $defaultValue;

    /** @var string|null */
    public $value;

    /** @var string|null */
    public $accessibilityDefaultValue;

    /** @var string|null */
    public $accessibilityValue;

    /** @var string */
    public $dateUpdate;

    private function __construct()
    {
        // Avoid instantiation
    }

    public static function buildFromEntity(DesignConfiguration $entity): self
    {
        $model = new self();

        $model->slug = $entity->getSlug();
        $model->name = $entity->getName();
        $model->type = $entity->getType();
        $model->position = $entity->getPosition();
        $model->defaultValue = $entity->getDefaultValue();
        $model->value = $entity->getValue();
        $model->accessibilityDefaultValue = $entity->getAccessibilityDefaultValue();
        $model->accessibilityValue = $entity->getAccessibilityValue();
        $model->dateUpdate = $entity->getDateUpdate()->format('Y-m-d H:i:s');

        return $model;
    }
}
