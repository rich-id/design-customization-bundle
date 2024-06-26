<?php

declare(strict_types=1);

namespace RichId\DesignCustomizationBundle\Tests\Resources\Fixtures;

use RichCongress\RecurrentFixturesTestBundle\DataFixture\AbstractFixture;
use RichId\DesignCustomizationBundle\Domain\Entity\DesignConfiguration;
use RichId\DesignCustomizationBundle\Domain\Entity\Type\DesignConfigurationType;

final class DesignConfigurationFixtures extends AbstractFixture
{
    protected function loadFixtures(): void
    {
        $this->createObject(
            DesignConfiguration::class,
            'color-primary',
            [
                'slug'                      => 'color-primary',
                'name'                      => 'Primary color',
                'type'                      => DesignConfigurationType::Color,
                'position'                  => 1,
                'defaultValue'              => '#ffffff',
                'accessibilityDefaultValue' => '#ffffff',
                'dateUpdate'                => new \DateTime('2023-01-01 12:00:00'),
            ]
        );

        $this->createObject(
            DesignConfiguration::class,
            'color-secondary',
            [
                'slug'         => 'color-secondary',
                'name'         => 'Secondary color',
                'type'         => DesignConfigurationType::Color,
                'position'     => 2,
                'defaultValue' => '#000000',
                'dateUpdate'   => new \DateTime('2023-01-01 12:00:00'),
            ]
        );

        $this->createObject(
            DesignConfiguration::class,
            'font-primary',
            [
                'slug'         => 'font-primary',
                'name'         => 'Primary font',
                'type'         => DesignConfigurationType::Font,
                'position'     => 1,
                'defaultValue' => 'My Font',
                'dateUpdate'   => new \DateTime('2023-01-01 12:00:00'),
            ]
        );

        $this->createObject(
            DesignConfiguration::class,
            'font-primary',
            [
                'slug'         => 'font-custom',
                'name'         => 'Custom font',
                'type'         => DesignConfigurationType::Font,
                'position'     => 2,
                'defaultValue' => 'CustomFont',
                'dateUpdate'   => new \DateTime('2023-01-01 12:00:00'),
            ]
        );

        $this->createObject(
            DesignConfiguration::class,
            'radius-items',
            [
                'slug'         => 'radius-items',
                'name'         => 'Radius items',
                'type'         => DesignConfigurationType::Radius,
                'position'     => 1,
                'defaultValue' => '0',
                'dateUpdate'   => new \DateTime('2023-01-01 12:00:00'),
            ]
        );

        $this->createObject(
            DesignConfiguration::class,
            'logo',
            [
                'slug'         => 'logo',
                'name'         => 'Logo',
                'type'         => DesignConfigurationType::Image,
                'position'     => 1,
                'defaultValue' => 'default/logo.svg',
                'dateUpdate'   => new \DateTime('2023-01-01 12:00:00'),
            ]
        );
    }
}
