<?php

declare(strict_types=1);

namespace RichId\DesignCustomizationBundle\UserInterface\TwigExtension;

use RichId\DesignCustomizationBundle\Domain\Entity\DesignConfiguration;
use RichId\DesignCustomizationBundle\Domain\Exception\NotFoundDesignConfigurationException;
use RichId\DesignCustomizationBundle\Domain\UseCase\GetConfiguration;
use RichId\DesignCustomizationBundle\Domain\UseCase\GetConfigurations;
use RichId\DesignCustomizationBundle\Domain\UseCase\GetConfigurationValue;
use RichId\DesignCustomizationBundle\Domain\UseCase\GetFontFamily;
use RichId\DesignCustomizationBundle\Domain\UseCase\GetImagePath;
use RichId\DesignCustomizationBundle\Domain\UseCase\GetImageUrl;
use RichId\DesignCustomizationBundle\Infrastructure\Adapter\GetParameter;
use Twig\Extension\AbstractExtension;
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

    /** @var GetImagePath */
    protected $getImagePath;

    /** @var GetParameter */
    protected $getParameter;

    /** @var GetImageUrl */
    protected $getImageUrl;

    public function __construct(
        GetConfiguration $getConfiguration,
        GetConfigurations $getConfigurations,
        GetConfigurationValue $getConfigurationValue,
        GetFontFamily $getFontFamily,
        GetImagePath $getImagePath,
        GetParameter $getParameter,
        GetImageUrl $getImageUrl
    ) {
        $this->getConfiguration = $getConfiguration;
        $this->getConfigurations = $getConfigurations;
        $this->getConfigurationValue = $getConfigurationValue;
        $this->getFontFamily = $getFontFamily;
        $this->getImagePath = $getImagePath;
        $this->getParameter = $getParameter;
        $this->getImageUrl = $getImageUrl;
    }

    public function getFunctions(): array
    {
        return [
            new TwigFunction('getDesignConfiguration', [$this, 'getDesignConfiguration']),
            new TwigFunction('getDesignConfigurations', [$this, 'getDesignConfigurations']),
            new TwigFunction('getDesignConfigurationValue', [$this, 'getDesignConfigurationValue']),
            new TwigFunction('getDesignCustomizationPrefix', [$this, 'getDesignCustomizationPrefix']),
            new TwigFunction('getFontFamily', [$this, 'getFontFamily']),
            new TwigFunction('getImagePath', [$this, 'getImagePath']),
            new TwigFunction('getImageUrl', [$this, 'getImageUrl']),
        ];
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

    public function getFontFamily(string $configurationSlug): ?string
    {
        try {
            return ($this->getFontFamily)($configurationSlug);
        } catch (NotFoundDesignConfigurationException $e) {
            return null;
        }
    }

    public function getImagePath(string $configurationSlug): ?string
    {
        try {
            return ($this->getImagePath)($configurationSlug);
        } catch (NotFoundDesignConfigurationException $e) {
            return null;
        }
    }

    public function getImageUrl(string $configurationSlug): string
    {
        try {
            return ($this->getImageUrl)($configurationSlug);
        } catch (NotFoundDesignConfigurationException $e) {
            return '';
        }
    }
}
