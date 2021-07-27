<?php

declare(strict_types=1);

namespace RichId\DesignCustomizationBundle\Domain\Entity\Type;

use Fresh\DoctrineEnumBundle\DBAL\Types\AbstractEnumType;

/** @extends AbstractEnumType<string> */
class DesignConfigurationType extends AbstractEnumType
{
    public const FONT = 'font';
    public const RADIUS = 'radius';
    public const COLOR = 'color';
    public const IMAGE = 'image';

    /** @var array<string, string> */
    protected static $choices = [
        self::FONT   => 'font',
        self::RADIUS => 'radius',
        self::COLOR  => 'color',
        self::IMAGE  => 'image',
    ];
}
