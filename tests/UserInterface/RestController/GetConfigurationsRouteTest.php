<?php

declare(strict_types=1);

namespace RichId\DesignCustomizationBundle\Tests\UserInterface\RestController;

use RichCongress\TestFramework\TestConfiguration\Annotation\TestConfig;
use RichCongress\TestSuite\TestCase\ControllerTestCase;
use RichId\DesignCustomizationBundle\Domain\Entity\Type\DesignConfigurationType;
use Symfony\Component\HttpFoundation\Response;

/**
 * @covers \RichId\DesignCustomizationBundle\UserInterface\RestController\GetConfigurationsRoute
 * @TestConfig("fixtures")
 */
final class GetConfigurationsRouteTest extends ControllerTestCase
{
    public function testGetCustomImageAbsoluteUrl(): void
    {
        $response = $this->getClient()->get('/rest/design-bundle/configurations');

        self::assertStatusCode(Response::HTTP_OK, $response);
        self::assertSame(
            [
                'customFonts' => [
                    [
                        'fontFamily' => 'CustomFont',
                        'url'        => 'https://test.test',
                    ],
                ],
                'designConfigurations' => [
                    [
                        'slug'                      => 'color-primary',
                        'name'                      => 'Primary color',
                        'type'                      => DesignConfigurationType::COLOR,
                        'position'                  => 1,
                        'defaultValue'              => '#ffffff',
                        'value'                     => null,
                        'accessibilityDefaultValue' => '#ffffff',
                        'accessibilityValue'        => null,
                        'dateUpdate'                => '2023-01-01 12:00:00',
                    ],
                    [
                        'slug'                      => 'color-secondary',
                        'name'                      => 'Secondary color',
                        'type'                      => DesignConfigurationType::COLOR,
                        'position'                  => 2,
                        'defaultValue'              => '#000000',
                        'value'                     => null,
                        'accessibilityDefaultValue' => null,
                        'accessibilityValue'        => null,
                        'dateUpdate'                => '2023-01-01 12:00:00',
                    ],
                    [
                        'slug'                      => 'font-primary',
                        'name'                      => 'Primary font',
                        'type'                      => DesignConfigurationType::FONT,
                        'position'                  => 1,
                        'defaultValue'              => 'My Font',
                        'value'                     => null,
                        'accessibilityDefaultValue' => null,
                        'accessibilityValue'        => null,
                        'dateUpdate'                => '2023-01-01 12:00:00',
                    ],
                    [
                        'slug'                      => 'font-custom',
                        'name'                      => 'Custom font',
                        'type'                      => DesignConfigurationType::FONT,
                        'position'                  => 2,
                        'defaultValue'              => 'CustomFont',
                        'value'                     => null,
                        'accessibilityDefaultValue' => null,
                        'accessibilityValue'        => null,
                        'dateUpdate'                => '2023-01-01 12:00:00',
                    ],
                    [
                        'slug'                      => 'radius-items',
                        'name'                      => 'Radius items',
                        'type'                      => DesignConfigurationType::RADIUS,
                        'position'                  => 1,
                        'defaultValue'              => '0',
                        'value'                     => null,
                        'accessibilityDefaultValue' => null,
                        'accessibilityValue'        => null,
                        'dateUpdate'                => '2023-01-01 12:00:00',
                    ],
                    [
                        'slug'                      => 'logo',
                        'name'                      => 'Logo',
                        'type'                      => DesignConfigurationType::IMAGE,
                        'position'                  => 1,
                        'defaultValue'              => 'default/logo.svg',
                        'value'                     => null,
                        'accessibilityDefaultValue' => null,
                        'accessibilityValue'        => null,
                        'dateUpdate'                => '2023-01-01 12:00:00',
                    ],
                ],
            ],
            $response->getJsonContent()
        );
    }
}
