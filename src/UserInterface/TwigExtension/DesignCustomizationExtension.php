<?php

declare(strict_types=1);

namespace RichId\DesignCustomizationBundle\UserInterface\TwigExtension;

use RichId\DesignCustomizationBundle\Domain\Entity\DesignConfiguration;
use RichId\DesignCustomizationBundle\Domain\Exception\NotFoundDesignConfigurationException;
use RichId\DesignCustomizationBundle\Domain\Helper\CssHexadecimalOpacityHelper;
use RichId\DesignCustomizationBundle\Domain\UseCase\GetConfiguration;
use RichId\DesignCustomizationBundle\Domain\UseCase\GetConfigurations;
use RichId\DesignCustomizationBundle\Domain\UseCase\GetConfigurationValue;
use RichId\DesignCustomizationBundle\Domain\UseCase\GetFontFamily;
use RichId\DesignCustomizationBundle\Domain\UseCase\GetImageAbsoluteUrl;
use RichId\DesignCustomizationBundle\Domain\UseCase\GetImagePath;
use RichId\DesignCustomizationBundle\Infrastructure\Adapter\GetParameter;
use Twig\Extension\AbstractExtension;
use Twig\TwigFilter;
use Twig\TwigFunction;

class DesignCustomizationExtension extends AbstractExtension
{
    /** @var GetConfiguration */
    protected $getConfiguration;

    /** @var GetConfigurations */
    protected $getConfigurations;

    /** @var GetConfigurationValue */
    protected $getConfigurationValue;

    /** @var GetFontFamily */
    protected $getFontFamily;

    /** @var GetImageAbsoluteUrl */
    protected $getImageAbsoluteUrl;

    /** @var GetImagePath */
    protected $getImagePath;

    /** @var GetParameter */
    protected $getParameter;

    public function __construct(
        GetConfiguration $getConfiguration,
        GetConfigurations $getConfigurations,
        GetConfigurationValue $getConfigurationValue,
        GetFontFamily $getFontFamily,
        GetImageAbsoluteUrl $getImageAbsoluteUrl,
        GetImagePath $getImagePath,
        GetParameter $getParameter
    ) {
        $this->getConfiguration = $getConfiguration;
        $this->getConfigurations = $getConfigurations;
        $this->getConfigurationValue = $getConfigurationValue;
        $this->getFontFamily = $getFontFamily;
        $this->getImageAbsoluteUrl = $getImageAbsoluteUrl;
        $this->getImagePath = $getImagePath;
        $this->getParameter = $getParameter;
    }

    public function getFunctions(): array
    {
        return [
            new TwigFunction('getDesignConfiguration', [$this, 'getDesignConfiguration']),
            new TwigFunction('getDesignConfigurations', [$this, 'getDesignConfigurations']),
            new TwigFunction('getDesignConfigurationValue', [$this, 'getDesignConfigurationValue']),
            new TwigFunction('getDesignCustomizationPrefix', [$this, 'getDesignCustomizationPrefix']),
            new TwigFunction('getOpacitySuffixFor', [$this, 'getOpacitySuffixFor']),
            new TwigFunction('hasConfigurationWithAccessibilityValue', [$this, 'hasConfigurationWithAccessibilityValue']),
        ];
    }

    public function getFilters(): array
    {
        return [
            new TwigFilter('absoluteDesignImage', [$this, 'absoluteDesignImage']),
            new TwigFilter('designFontFamily', [$this, 'designFontFamily']),
            new TwigFilter('pathDesignImage', [$this, 'pathDesignImage']),
        ];
    }

    public function absoluteDesignImage(string $configurationSlug): string
    {
        try {
            return ($this->getImageAbsoluteUrl)($configurationSlug);
        } catch (NotFoundDesignConfigurationException $e) {
            return '';
        }
    }

    public function designFontFamily(string $configurationSlug): ?string
    {
        try {
            return ($this->getFontFamily)($configurationSlug);
        } catch (NotFoundDesignConfigurationException $e) {
            return null;
        }
    }

    public function getDesignConfiguration(string $configurationSlug): ?DesignConfiguration
    {
        try {
            return ($this->getConfiguration)($configurationSlug);
        } catch (NotFoundDesignConfigurationException $e) {
            return null;
        }
    }

    /**
     * @param string|string[] $types
     *
     * @return array<string, DesignConfiguration>
     */
    public function getDesignConfigurations($types = []): array
    {
        return ($this->getConfigurations)($types);
    }

    public function getDesignConfigurationValue(string $configurationSlug): ?string
    {
        try {
            return ($this->getConfigurationValue)($configurationSlug);
        } catch (NotFoundDesignConfigurationException $e) {
            return null;
        }
    }

    public function getDesignCustomizationPrefix(): string
    {
        return $this->getParameter->getDesignCustomizationPrefix();
    }

    public function pathDesignImage(string $configurationSlug): ?string
    {
        try {
            return ($this->getImagePath)($configurationSlug);
        } catch (NotFoundDesignConfigurationException $e) {
            return null;
        }
    }

    public function getOpacitySuffixFor(int $opacity): string
    {
        return CssHexadecimalOpacityHelper::getSuffixFor($opacity);
    }

    public function hasConfigurationWithAccessibilityValue($types = []): bool
    {
        return !empty(
            \array_filter(
                ($this->getConfigurations)($types),
                static function (DesignConfiguration $configuration) {
                    return $configuration->getAccessibilityValueToUse() !== null && $configuration->getAccessibilityValueToUse() !== '';
                }
            )
        );
    }
}
