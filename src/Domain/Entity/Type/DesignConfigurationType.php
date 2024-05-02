<?php

declare(strict_types=1);

namespace RichId\DesignCustomizationBundle\Domain\Entity\Type;

enum DesignConfigurationType: string
{
    case Font = 'font';
    case Radius = 'radius';
    case Color = 'color';
    case Image = 'image';
}
