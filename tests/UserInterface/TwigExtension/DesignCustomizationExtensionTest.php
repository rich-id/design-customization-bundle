<?php

declare(strict_types=1);

namespace RichId\DesignCustomizationBundle\Tests\UserInterface\TwigExtension;

use RichCongress\TestFramework\TestConfiguration\Annotation\TestConfig;
use RichCongress\TestSuite\TestCase\TestCase;
use RichId\DesignCustomizationBundle\Domain\Entity\DesignConfiguration;
use RichId\DesignCustomizationBundle\UserInterface\TwigExtension\DesignCustomizationExtension;
use Twig\TwigFilter;
use Twig\TwigFunction;

/**
 * @covers \RichId\DesignCustomizationBundle\UserInterface\TwigExtension\DesignCustomizationExtension
 * @TestConfig("fixtures")
 */
final class DesignCustomizationExtensionTest extends TestCase
{
    /** @var DesignCustomizationExtension */
    public $extension;

    public function testExtensions(): void
    {
        $this->assertCount(6, $this->extension->getFunctions());

        $this->assertInstanceOf(TwigFunction::class, $this->extension->getFunctions()[0]);
        $this->assertInstanceOf(TwigFunction::class, $this->extension->getFunctions()[1]);
        $this->assertInstanceOf(TwigFunction::class, $this->extension->getFunctions()[2]);
        $this->assertInstanceOf(TwigFunction::class, $this->extension->getFunctions()[3]);
        $this->assertInstanceOf(TwigFunction::class, $this->extension->getFunctions()[4]);
        $this->assertInstanceOf(TwigFunction::class, $this->extension->getFunctions()[5]);

        $this->assertCount(3, $this->extension->getFilters());

        $this->assertInstanceOf(TwigFilter::class, $this->extension->getFilters()[0]);
        $this->assertInstanceOf(TwigFilter::class, $this->extension->getFilters()[1]);
        $this->assertInstanceOf(TwigFilter::class, $this->extension->getFilters()[2]);
    }

    public function testAbsoluteDesignImageConfigurationNotFound(): void
    {
        $url = $this->extension->absoluteDesignImage('my_slug');
        $this->assertSame('', $url);
    }

    public function testAbsoluteDesignImage(): void
    {
        $url = $this->extension->absoluteDesignImage('logo');
        $this->assertStringContainsString('http://localhost/uploads/design/default/logo.svg?cachekey=', $url);
    }

    public function testDesignFontFamilyConfigurationNotFound(): void
    {
        $fontFamily = $this->extension->designFontFamily('my_slug');
        $this->assertNull($fontFamily);
    }

    public function testDesignFontFamily(): void
    {
        $fontFamily = $this->extension->designFontFamily('font-primary');
        $this->assertSame('My Font', $fontFamily);
    }

    public function testGetDesignConfigurationConfigurationNotFound(): void
    {
        $configuration = $this->extension->getDesignConfiguration('my_slug');
        $this->assertNull($configuration);
    }

    public function testGetDesignConfiguration(): void
    {
        $configuration = $this->extension->getDesignConfiguration('color-primary');

        $this->assertInstanceOf(DesignConfiguration::class, $configuration);

        $slug = $configuration !== null ? $configuration->getSlug() : '';
        $this->assertSame('color-primary', $slug);
    }

    public function testUseCaseWithoutFilter(): void
    {
        $configurations = $this->extension->getDesignConfigurations();

        $this->assertIsArray($configurations);
        $this->assertCount(5, $configurations);

        $this->assertArrayHasKey('color-primary', $configurations);
        $this->assertArrayHasKey('color-secondary', $configurations);
        $this->assertArrayHasKey('font-primary', $configurations);
        $this->assertArrayHasKey('radius-items', $configurations);
        $this->assertArrayHasKey('logo', $configurations);
    }

    public function testUseCaseWithoutFilterFilterOnColor(): void
    {
        $configurations = $this->extension->getDesignConfigurations('color');

        $this->assertIsArray($configurations);
        $this->assertCount(2, $configurations);

        $this->assertArrayHasKey('color-primary', $configurations);
        $this->assertArrayHasKey('color-secondary', $configurations);
    }

    public function testGetDesignConfigurationValueConfigurationNotFound(): void
    {
        $value = $this->extension->getDesignConfigurationValue('my_slug');
        $this->assertNull($value);
    }

    public function testGetDesignConfigurationValue(): void
    {
        $value = $this->extension->getDesignConfigurationValue('color-primary');
        $this->assertSame('#ffffff', $value);
    }

    public function testGetDesignCustomizationPrefix(): void
    {
        $prefix = $this->extension->getDesignCustomizationPrefix();
        $this->assertSame('rich-id-customization', $prefix);
    }

    public function testPathDesignImageConfigurationNotFound(): void
    {
        $path = $this->extension->pathDesignImage('my_slug');
        $this->assertNull($path);
    }

    public function testPathDesignImage(): void
    {
        $path = $this->extension->pathDesignImage('logo');
        $this->assertStringContainsString('uploads/design/default/logo.svg?cachekey=', $path ?? '');
    }

    public function testGetOpacitySuffixForNotFound(): void
    {
        $this->expectException(\InvalidArgumentException::class);
        $this->expectDeprecationMessage('Opacity must between 0 and 100.');

        $this->extension->getOpacitySuffixFor(150);
    }

    public function testGetOpacitySuffixFor(): void
    {
        $suffix = $this->extension->getOpacitySuffixFor(62);

        $this->assertSame('9E', $suffix);
    }

    public function testHasConfigurationWithAccessibilityValue(): void
    {
        $result = $this->extension->hasConfigurationWithAccessibilityValue();
        $this->assertTrue($result);
    }

    public function testHasNotConfigurationWithAccessibilityValue(): void
    {
        $result = $this->extension->hasConfigurationWithAccessibilityValue(['font']);
        $this->assertFalse($result);
    }
}
