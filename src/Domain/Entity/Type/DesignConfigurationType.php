<?php

declare(strict_types=1);

namespace RichId\DesignCustomizationBundle\Domain\Entity\Type;

use Fresh\DoctrineEnumBundle\DBAL\Types\AbstractEnumType;

class DesignConfigurationType extends AbstractEnumType
{
    public const EMAIL = 'email';
    public const FONT = 'font';
    public const RADIUS = 'radius';
    public const COLOR = 'color';
    public const IMAGE = 'image';

    protected static $choices = [
        self::EMAIL  => 'email',
        self::FONT   => 'font',
        self::RADIUS => 'radius',
        self::COLOR  => 'color',
        self::IMAGE  => 'image',
    ];
}
