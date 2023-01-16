<?php

declare(strict_types=1);

namespace RichId\DesignCustomizationBundle\Domain\Model;

use RichId\DesignCustomizationBundle\Domain\Entity\CustomFont;

final class OutputCustomFont
{
    /** @var string */
    public $fontFamily;

    /** @var string */
    public $url;

    private function __construct()
    {
        // Avoid instantiation
    }

    public static function buildFromEntity(CustomFont $entity): self
    {
        $model = new self();

        $model->fontFamily = $entity->getFontFamily();
        $model->url = $entity->getUrl();

        return $model;
    }
}
