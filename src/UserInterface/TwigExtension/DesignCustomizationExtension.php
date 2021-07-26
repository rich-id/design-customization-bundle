<?php

declare(strict_types=1);

namespace RichId\DesignCustomizationBundle\UserInterface\TwigExtension;

use RichId\DesignCustomizationBundle\Domain\Entity\DesignConfiguration;
use RichId\DesignCustomizationBundle\Domain\Entity\Type\DesignConfigurationType;
use RichId\DesignCustomizationBundle\Domain\Exception\NotFoundDesignConfigurationException;
use RichId\DesignCustomizationBundle\Domain\UseCase\GetConfiguration;
use RichId\DesignCustomizationBundle\Domain\UseCase\GetConfigurations;
use Symfony\Component\DependencyInjection\ParameterBag\ParameterBagInterface;
use Twig\Extension\AbstractExtension;
use Twig\TwigFunction;

class DesignCustomizationExtension extends AbstractExtension
{
    /** @var GetConfiguration */
    protected $getConfiguration;

    /** @var GetConfigurations */
    protected $getConfigurations;

    /** @var ParameterBagInterface */
    protected $parameterBag;

    public function __construct(
        GetConfiguration $getConfiguration,
        GetConfigurations $getConfigurations,
        ParameterBagInterface $parameterBag
    ) {
        $this->getConfiguration = $getConfiguration;
        $this->getConfigurations = $getConfigurations;
        $this->parameterBag = $parameterBag;
    }

    public function getFunctions(): array
    {
        return [
            new TwigFunction('getDesignConfiguration', [$this, 'getDesignConfiguration']),
            new TwigFunction('getDesignConfigurations', [$this, 'getDesignConfigurations']),
            new TwigFunction('getDesignConfigurationValue', [$this, 'getDesignConfigurationValue']),
            new TwigFunction('getDesignCustomizationPrefix', [$this, 'getDesignCustomizationPrefix']),
            new TwigFunction('getFontFamilyFor', [$this, 'getFontFamilyFor']),
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
            $configuration = ($this->getConfiguration)($configurationSlug);

            return $configuration->getValueToUse();
        } catch (NotFoundDesignConfigurationException $e) {
            return null;
        }
    }

    public function getDesignCustomizationPrefix(): string
    {
        return (string) $this->parameterBag->get('rich_id_design_customization.css_customization_prefix');
    }

    public function getFontFamilyFor(string $configurationSlug): ?string
    {
        try {
            $configuration = ($this->getConfiguration)($configurationSlug);

            if ($configuration->getType() !== DesignConfigurationType::FONT) {
                return null;
            }

            return $configuration->getValueToUse();
        } catch (NotFoundDesignConfigurationException $e) {
            return null;
        }
    }
}
